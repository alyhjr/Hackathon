<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Hackathon') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: #F5F8FF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .login-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid #E0EAFF;
            padding: 2.5rem 2.25rem;
            width: 100%;
            max-width: 400px;
        }
        .login-top {
            text-align: center;
            margin-bottom: 2rem;
        }
        .logo-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: #EBF2FF;
            border-radius: 14px;
            margin-bottom: 1rem;
        }
        .app-name {
            font-size: 18px;
            font-weight: 500;
            color: #1A2340;
            margin-bottom: 4px;
        }
        .app-sub {
            font-size: 13px;
            color: #8FA0C0;
        }
        .login-divider {
            height: 1px;
            background: #EDF1F9;
            margin: 0 0 1.5rem;
        }
        .login-field {
            margin-bottom: 1rem;
        }
        .login-field label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #6B7FA3;
            margin-bottom: 6px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        .login-field input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #E0EAFF;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            color: #1A2340;
            background: #FAFCFF;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }
        .login-field input:focus {
            border-color: #4E86F5;
            background: #fff;
        }
        .login-field input::placeholder {
            color: #C2CDE0;
        }
        .login-field input.input-error {
            border-color: #E24B4A;
            background: #FFFAFA;
        }
        .field-error-msg {
            font-size: 12px;
            color: #E24B4A;
            margin-top: 5px;
            display: none;
        }
        .field-error-msg.visible {
            display: block;
        }
        .login-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0.25rem 0 1.5rem;
        }
        .remember-label {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            color: #8FA0C0;
            cursor: pointer;
        }
        .remember-label input[type=checkbox] {
            accent-color: #4E86F5;
            width: 14px;
            height: 14px;
        }
        .forgot-link {
            font-size: 13px;
            color: #4E86F5;
            text-decoration: none;
        }
        .forgot-link:hover {
            text-decoration: underline;
        }
        .login-btn {
            width: 100%;
            padding: 11px;
            background: #3B78F4;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            letter-spacing: 0.01em;
            transition: background 0.18s;
        }
        .login-btn:hover {
            background: #2B63D9;
        }
        .login-footer {
            text-align: center;
            font-size: 12px;
            color: #B8C6DE;
            margin-top: 1.5rem;
        }
        .laravel-error {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            color: #E24B4A;
            margin-bottom: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        {{ $slot }}
    </div>
</body>
</html>