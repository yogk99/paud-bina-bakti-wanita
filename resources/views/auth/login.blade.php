@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #f9f9ff, #ffe3f1);
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
    }

    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-card {
        background: #fff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .login-card img.logo {
        width: 80px;
        margin-bottom: 20px;
    }

    .login-card h2 {
        margin-bottom: 10px;
        font-size: 24px;
        color: #333;
    }

    .login-card p {
        font-size: 14px;
        color: #777;
        margin-bottom: 30px;
    }

    .form-group {
        text-align: left;
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-size: 14px;
        color: #444;
        margin-bottom: 6px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px 14px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
    }

    .btn-login {
        width: 100%;
        background-color: #4f46e5;
        color: white;
        border: none;
        padding: 12px;
        font-size: 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-login:hover {
        background-color: #3730a3;
    }

    .error-message {
        background-color: #ffe5e5;
        border: 1px solid #ffb3b3;
        color: #cc0000;
        padding: 10px;
        border-radius: 8px;
        font-size: 14px;
        margin-bottom: 20px;
        text-align: left;
    }

    .footer-link {
        margin-top: 20px;
        font-size: 13px;
        color: #666;
    }

    .footer-link a {
        color: #4f46e5;
        text-decoration: none;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <img src="{{ asset('images/logo_paud.png') }}" alt="Logo PAUD" class="logo">
        <h2>Selamat Datang</h2>
        <p>Silakan masuk untuk mengakses dashboard Anda</p>

        @if($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input id="password" type="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="footer-link">
            Belum punya akun? <a href="#">Hubungi admin</a>
        </div>
    </div>
</div>
@endsection
