@extends('admin.layout')

@section('title', 'Edit education')

@section('content')
    <div class="card">
        <div class="topbar">
            <div>
                <h1 style="margin:0;">Edit education</h1>
                <div class="muted">{{ $education->degree }} — {{ $education->institute }}</div>
            </div>
            <a class="btn secondary" href="{{ route('admin.educations.index') }}">Back</a>
        </div>

        <form method="POST" action="{{ route('admin.educations.update', $education) }}">
            @csrf
            @method('PUT')
            @include('admin.educations._form')
            <div class="actions">
                <button class="btn" type="submit">Update</button>
                <a class="btn secondary" href="{{ route('admin.educations.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

