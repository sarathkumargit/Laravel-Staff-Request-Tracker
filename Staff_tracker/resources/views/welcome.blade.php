<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Staff Requests') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #dbeafe; /* light blue */
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 48px 40px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }

        .card h1 {
            font-size: 26px;
            font-weight: 600;
            color: #1e3a5f;
            margin-bottom: 8px;
        }

        .card p {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 32px;
        }

        .btn-login {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 10px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            margin: 6px;
            transition: background 0.2s;
        }

        .btn-login:hover {
            background-color: #1d4ed8;
        }

        .btn-register {
            display: inline-block;
            background-color: white;
            color: #2563eb;
            border: 2px solid #2563eb;
            padding: 10px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            margin: 6px;
            transition: all 0.2s;
        }

        .btn-register:hover {
            background-color: #eff6ff;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1> TEAM UP </h1>
        <h1>Welcome to Staff Requests</h1>
        <p>Submit and track your internal requests easily.<br>Please log in or create an account to get started.</p>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-login">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-login">Log In</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">Register</a>
                @endif
            @endauth
        @endif
    </div>

</body>
</html>