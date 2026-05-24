<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - {{ config('app.name') }}</title>
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
            padding: 20px 0;
        }
        .register-wrapper { width: 100%; max-width: 480px; padding: 20px; }
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
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }
        .btn-success {
            background-color: #10b981;
            border-color: #10b981;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-success:hover {
            background-color: #059669;
            border-color: #059669;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);
        }
        .form-label { font-weight: 500; color: #475569; font-size: 0.875rem; }
        .text-brand { color: #10b981; font-weight: 700; letter-spacing: -0.025em; }
    </style>
</head>
<body>
    <div class="register-wrapper">
        <div class="text-center mb-4">
            <h2 class="text-brand mb-0">{{ config('app.name') }}</h2>
            <p class="text-muted small">Pendaftaran Pengurus Masjid</p>
        </div>
        <div class="card">
            <div class="card-body p-4 p-sm-5">
                <h5 class="fw-bold mb-4 text-center text-dark">Buat Akun Baru</h5>

                <form action="{{ route('register.post') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Fulan bin Fulan" required autofocus>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@contoh.com" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label class="form-label">Ulangi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-100 mb-3">Daftar Sekarang</button>
                </form>

                <p class="mt-4 mb-0 text-center text-muted small">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-semibold text-success">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
