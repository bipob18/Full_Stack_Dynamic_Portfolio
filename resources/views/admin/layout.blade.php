<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio Admin')</title>
    <style>
        body { font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Arial, "Apple Color Emoji", "Segoe UI Emoji"; background: #f6f7fb; color: #111827; margin: 0; }
        header { background: #111827; color: white; padding: 14px 18px; display: flex; justify-content: space-between; align-items: center; }
        header a { color: white; text-decoration: none; font-weight: 600; }
        main { max-width: 980px; margin: 24px auto; padding: 0 16px; }
        .card { background: white; border: 1px solid #e5e7eb; border-radius: 12px; padding: 16px; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 14px; }
        .btn { display: inline-block; padding: 10px 12px; border-radius: 10px; border: 1px solid #e5e7eb; background: #111827; color: white; text-decoration: none; }
        .btn.secondary { background: white; color: #111827; }
        .btn.danger { background: #b91c1c; border-color: #b91c1c; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px 8px; border-bottom: 1px solid #f0f2f6; vertical-align: top; }
        th { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.06em; }
        .muted { color: #6b7280; font-size: 14px; }
        .flash { margin: 0 0 12px; padding: 10px 12px; border-radius: 10px; background: #ecfeff; border: 1px solid #a5f3fc; color: #155e75; }
        .grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
        .field label { display: block; font-size: 13px; color: #374151; margin-bottom: 6px; }
        .field input, .field textarea { width: 100%; padding: 10px 10px; border-radius: 10px; border: 1px solid #e5e7eb; background: white; }
        .field textarea { min-height: 120px; }
        .errors { margin: 0 0 12px; padding: 10px 12px; border-radius: 10px; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 14px; }
        form.inline { display: inline; }
        @media (max-width: 720px) { .grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <header>
        <a href="{{ url('/admin/educations') }}">Portfolio Admin</a>
        <a href="{{ url('/') }}">View site</a>
    </header>

    <main>
        @if (session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <strong>Please fix the errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>

