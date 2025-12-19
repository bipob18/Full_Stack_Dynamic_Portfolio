<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioProfileController extends Controller
{
    public function edit()
    {
        $profile = PortfolioProfile::query()->latest('id')->first() ?? new PortfolioProfile();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = PortfolioProfile::query()->latest('id')->first() ?? new PortfolioProfile();

        $data = $request->validate([
            'brand_name' => ['nullable', 'string', 'max:60'],
            'full_name' => ['nullable', 'string', 'max:120'],
            'headline' => ['nullable', 'string', 'max:200'],
            'about' => ['nullable', 'string', 'max:5000'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:60'],
            'footer_text' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:4096'], // 4MB
            'remove_photo' => ['nullable', 'boolean'],
        ]);

        if ($request->boolean('remove_photo')) {
            if ($profile->photo_path) {
                Storage::disk('public')->delete($profile->photo_path);
            }
            $profile->photo_path = null;
        }

        if ($request->hasFile('photo')) {
            if ($profile->photo_path) {
                Storage::disk('public')->delete($profile->photo_path);
            }

            $path = $request->file('photo')->store('portfolio', 'public');
            $profile->photo_path = $path;
        }

        $profile->fill([
            'brand_name' => $data['brand_name'] ?? $profile->brand_name,
            'full_name' => $data['full_name'] ?? $profile->full_name,
            'headline' => $data['headline'] ?? $profile->headline,
            'about' => $data['about'] ?? $profile->about,
            'email' => $data['email'] ?? $profile->email,
            'phone' => $data['phone'] ?? $profile->phone,
            'footer_text' => $data['footer_text'] ?? $profile->footer_text,
        ]);

        $profile->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('status', 'Profile updated.');
    }
}

