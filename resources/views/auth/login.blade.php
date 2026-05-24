<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            margin: 0;
        }
        .login-wrapper { width: 100%; max-width: 420px; padding: 20px; }
        .card { 
            border: none; 
            border-radius: 1rem; 
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01); 
        }
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border-color: #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.2s;
        }
        .form-control:focus {
            background-color: #fff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        .btn-primary {
            background-color: #2563eb;
            border-color: #2563eb;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }
        .form-label { font-weight: 500; color: #475569; font-size: 0.875rem; }
        .text-brand { color: #2563eb; font-weight: 700; letter-spacing: -0.025em; }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="text-center mb-4">
            <h2 class="text-brand mb-0">{{ config('app.name') }}</h2>
            <p class="text-muted small">Sistem Informasi Manajemen Masjid</p>
        </div>
        <div class="card">
            <div class="card-body p-4 p-sm-5">
                <h5 class="fw-bold mb-4 text-center text-dark">Selamat Datang</h5>

                <form action="{{ route('login.post') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@simasmas.com" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label d-flex justify-content-between">
                            <span>Password</span>
                            <a href="#" class="text-decoration-none text-muted small">Lupa password?</a>
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label text-muted small" for="remember">Ingat Saya</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Masuk ke Sistem</button>
                </form>

                <p class="mt-4 mb-0 text-center text-muted small">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
