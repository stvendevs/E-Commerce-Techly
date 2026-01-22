@props(['title' => '']) <!-- mendefinisikan prop title -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Figtree', sans-serif;
        }

        .split {
            display: flex;
            height: 100vh;
        }

        .left {
            flex: 0 0 40%;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem 2.5rem;
        }

        .right {
            flex: 0 0 60%;
            background-color: #0667d0;
            background-image: url('{{ asset('img/login-gadget.svg') }}');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 75%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }

        .logo-container {
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 2.5rem;
            border-radius: 1.25rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .form-title {
            text-align: center;
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: #1f2937;
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.025em;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            border-radius: 0.625rem;
            border: 1.5px solid #d1d5db;
            padding: 0.875rem 1.125rem;
            width: 100%;
            margin-bottom: 1rem;
            font-size: 15px;
            transition: all 0.2s ease;
        }

        .form-container input[type="text"]:focus,
        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            outline: none;
            border-color: #0667d0;
            box-shadow: 0 0 0 3px rgba(6, 103, 208, 0.1);
        }

        .form-container button {
            background-color: #0667d0;
            color: white;
            padding: 0.875rem;
            width: 100%;
            border-radius: 0.625rem;
            font-weight: 600;
            font-size: 15px;
            margin-top: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .form-container button:hover {
            background-color: #0554a3;
            box-shadow: 0 4px 6px rgba(6, 103, 208, 0.2);
            transform: translateY(-1px);
        }

        .form-container button:active {
            transform: translateY(0);
        }

        #remember_me {
            width: 16px !important;
            height: 16px !important;
            margin: 0;
        }

        label[for="remember_me"] {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        label[for="remember_me"] span {
            line-height: 1;
            margin-top: 1px;
        }

        .form-container a {
            color: #0667d0;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .form-container a:hover {
            color: #0554a3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="split">
        <!-- Kiri: Form + Logo -->
        <div class="left">
            <!-- Logo di atas form -->
            <div class="logo-container">
                <x-application-logo style="width:200px; height:auto;" />
            </div>

            <div class="form-container">
                <!-- Judul halaman (Login / Register) -->
                @if ($title)
                    <div class="form-title">{{ $title }}</div>
                @endif

                {{ $slot }}
            </div>
        </div>

        <!-- Kanan: Placeholder Gambar / Ilustrasi -->
        <div class="right">
        </div>
    </div>
</body>
</html>
