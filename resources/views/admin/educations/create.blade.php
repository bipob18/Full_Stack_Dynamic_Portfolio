@extends('admin.layout')

@section('title', 'Add education')

@section('content')
    <div class="card">
        <div class="topbar">
            <div>
                <h1 style="margin:0;">Add education</h1>
                <div class="muted">Example: SSC, Diploma, BSc</div>
            </div>
            <a class="btn secondary" href="{{ route('admin.educations.index') }}">Back</a>
        </div>

        <form method="POST" action="{{ route('admin.educations.store') }}">
            @csrf
            @include('admin.educations._form')
            <div class="actions">
                <button class="btn" type="submit">Save</button>
                <a class="btn secondary" href="{{ route('admin.educations.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

