<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioEducation;
use Illuminate\Http\Request;

class PortfolioEducationController extends Controller
{
    public function index()
    {
        $educations = PortfolioEducation::query()
            ->orderBy('sort_order')
            ->orderByDesc('end_year')
            ->orderByDesc('start_year')
            ->get();

        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        $education = new PortfolioEducation();

        return view('admin.educations.create', compact('education'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        PortfolioEducation::query()->create($data);

        return redirect()
            ->route('admin.educations.index')
            ->with('status', 'Education added.');
    }

    public function edit(PortfolioEducation $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, PortfolioEducation $education)
    {
        $data = $this->validated($request);

        $education->update($data);

        return redirect()
            ->route('admin.educations.index')
            ->with('status', 'Education updated.');
    }

    public function destroy(PortfolioEducation $education)
    {
        $education->delete();

        return redirect()
            ->route('admin.educations.index')
            ->with('status', 'Education deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'degree' => ['required', 'string', 'max:120'],
            'institute' => ['required', 'string', 'max:255'],
            'start_year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'end_year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'grade' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:1000000'],
        ]) + [
            'sort_order' => (int) $request->input('sort_order', 0),
        ];
    }
}

