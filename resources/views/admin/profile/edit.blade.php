@extends('admin.layout')

@section('title', 'Profile')

@section('content')
    <div class="card">
        <div class="topbar">
            <div>
                <h1 style="margin:0;">Profile</h1>
                <div class="muted">Upload your picture + update portfolio info.</div>
            </div>
            <a class="btn secondary" href="{{ route('admin.educations.index') }}">Education</a>
        </div>

        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid">
                <div class="field">
                    <label>Current photo</label>
                    @if ($profile->photo_path)
                        <div style="display:flex; align-items:center; gap: 14px;">
                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::url($profile->photo_path) }}"
                                alt="Profile photo"
                                style="width:96px; height:96px; border-radius: 999px; object-fit: cover; border: 1px solid #e5e7eb;"
                            >
                            <label class="muted" style="display:flex; align-items:center; gap: 8px;">
                                <input type="checkbox" name="remove_photo" value="1">
                                Remove photo
                            </label>
                        </div>
                    @else
                        <div class="muted">No photo uploaded yet.</div>
                    @endif
                </div>

                <div class="field">
                    <label for="photo">Upload new photo</label>
                    <input id="photo" name="photo" type="file" accept="image/*">
                    <div class="muted" style="margin-top: 6px;">JPG/PNG, max 4MB.</div>
                </div>
            </div>

            <hr style="border:0; border-top:1px solid #f0f2f6; margin: 16px 0;">

            <div class="grid">
                <div class="field">
                    <label for="brand_name">Brand name</label>
                    <input id="brand_name" name="brand_name" value="{{ old('brand_name', $profile->brand_name) }}" placeholder="BIPLOB">
                </div>

                <div class="field">
                    <label for="full_name">Full name</label>
                    <input id="full_name" name="full_name" value="{{ old('full_name', $profile->full_name) }}" placeholder="Your name">
                </div>

                <div class="field">
                    <label for="headline">Headline</label>
                    <input id="headline" name="headline" value="{{ old('headline', $profile->headline) }}" placeholder="Full-stack Web Developer">
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" value="{{ old('email', $profile->email) }}" placeholder="you@email.com">
                </div>

                <div class="field">
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" placeholder="+880...">
                </div>

                <div class="field">
                    <label for="footer_text">Footer text</label>
                    <input id="footer_text" name="footer_text" value="{{ old('footer_text', $profile->footer_text) }}" placeholder="© 2025 ...">
                </div>
            </div>

            <div class="field" style="margin-top: 12px;">
                <label for="about">About</label>
                <textarea id="about" name="about" placeholder="Write about yourself...">{{ old('about', $profile->about) }}</textarea>
            </div>

            <div class="actions">
                <button class="btn" type="submit">Save</button>
                <a class="btn secondary" href="{{ url('/') }}">View site</a>
            </div>
        </form>
    </div>
@endsection

