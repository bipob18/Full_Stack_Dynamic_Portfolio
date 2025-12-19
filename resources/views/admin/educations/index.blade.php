@extends('admin.layout')

@section('title', 'Educations')

@section('content')
    <div class="card">
        <div class="topbar">
            <div>
                <h1 style="margin:0;">Education (SSC / Diploma / BSc)</h1>
                <div class="muted">Add/edit your academic info here.</div>
            </div>
            <a class="btn" href="{{ route('admin.educations.create') }}">+ Add education</a>
        </div>

        @if ($educations->isEmpty())
            <p class="muted">No education added yet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Degree</th>
                        <th>Institute</th>
                        <th>Years</th>
                        <th>Grade</th>
                        <th>Order</th>
                        <th style="width: 170px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($educations as $education)
                        <tr>
                            <td>
                                <strong>{{ $education->degree }}</strong>
                                @if ($education->description)
                                    <div class="muted">{{ \Illuminate\Support\Str::limit($education->description, 90) }}</div>
                                @endif
                            </td>
                            <td>{{ $education->institute }}</td>
                            <td class="muted">
                                {{ $education->start_year ?: '—' }} - {{ $education->end_year ?: '—' }}
                            </td>
                            <td class="muted">{{ $education->grade ?: '—' }}</td>
                            <td class="muted">{{ $education->sort_order }}</td>
                            <td>
                                <a class="btn secondary" href="{{ route('admin.educations.edit', $education) }}">Edit</a>
                                <form class="inline" method="POST" action="{{ route('admin.educations.destroy', $education) }}" onsubmit="return confirm('Delete this education?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

