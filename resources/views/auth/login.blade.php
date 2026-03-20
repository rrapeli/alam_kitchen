<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Kasir App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0d0d0d;
            --surface: #161616;
            --border: #2a2a2a;
            --accent: #f5c842;
            --accent-dim: rgba(245,200,66,0.12);
            --text: #f0ede8;
            --muted: #666;
            --error: #ff5f5f;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── Left panel ── */
        .panel-left {
            position: relative;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            border-right: 1px solid var(--border);
        }

        .panel-left::before {
            content: '';
            position: absolute;
            width: 480px; height: 480px;
            background: radial-gradient(circle, rgba(245,200,66,0.08) 0%, transparent 70%);
            top: -100px; left: -100px;
            pointer-events: none;
        }

        .grid-bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 60px 60px;
            opacity: 0.3;
        }

        .brand {
            position: relative;
            z-index: 1;
        }

        .brand-mark {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 40px; height: 40px;
            background: var(--accent);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 18px;
            color: #0d0d0d;
        }

        .brand-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 20px;
            letter-spacing: -0.3px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-eyebrow {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .hero-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -2px;
            margin-bottom: 1.5rem;
        }

        .hero-title span {
            color: var(--accent);
        }

        .hero-desc {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
            max-width: 360px;
        }

        .stats {
            position: relative;
            z-index: 1;
            display: flex;
            gap: 2rem;
        }

        .stat-item { }
        .stat-num {
            font-family: 'Syne', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent);
        }
        .stat-label {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
        }

        /* ── Right panel (form) ── */
        .panel-right {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            margin-bottom: 2.5rem;
        }

        .form-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: var(--muted);
            font-size: 14px;
        }

        .form-subtitle a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }

        .field {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.5rem;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.85rem 1rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        input:focus {
            border-color: var(--accent);
            background: var(--accent-dim);
        }

        input.is-invalid {
            border-color: var(--error);
        }

        .invalid-feedback {
            font-size: 12px;
            color: var(--error);
            margin-top: 0.35rem;
            display: block;
        }

        .row-opts {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.75rem;
        }

        .checkbox-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .checkbox-wrap input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--accent);
            cursor: pointer;
        }

        .checkbox-wrap span {
            font-size: 13px;
            color: var(--muted);
        }

        .forgot-link {
            font-size: 13px;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }

        .btn-primary {
            width: 100%;
            padding: 0.9rem;
            background: var(--accent);
            color: #0d0d0d;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 0.3px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
        }

        .btn-primary:hover { opacity: 0.9; }
        .btn-primary:active { transform: scale(0.99); }

        .alert-error {
            background: rgba(255,95,95,0.1);
            border: 1px solid rgba(255,95,95,0.3);
            border-radius: 10px;
            padding: 0.85rem 1rem;
            font-size: 13px;
            color: var(--error);
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .panel-left { display: none; }
        }
    </style>
</head>
<body>

<!-- Left branding panel -->
<div class="panel-left">
    <div class="grid-bg"></div>

    <div class="brand">
        <div class="brand-mark">
            <div class="brand-icon">K</div>
            <span class="brand-name">KasirApp</span>
        </div>
    </div>

    <div class="hero-content">
        <p class="hero-eyebrow">Point of Sale</p>
        <h1 class="hero-title">Kelola<br>Kasir <span>Lebih<br>Cerdas.</span></h1>
        <p class="hero-desc">Sistem kasir modern dengan manajemen role, laporan real-time, dan antarmuka yang mudah digunakan.</p>
    </div>

    <div class="stats">
        <div class="stat-item">
            <div class="stat-num">3</div>
            <div class="stat-label">Level Akses</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">∞</div>
            <div class="stat-label">Transaksi</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">24/7</div>
            <div class="stat-label">Monitoring</div>
        </div>
    </div>
</div>

<!-- Right form panel -->
<div class="panel-right">
    <div class="form-container">
        <div class="form-header">
            <h2 class="form-title">Selamat Datang</h2>
            <p class="form-subtitle">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
        </div>

        @if ($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    autocomplete="email"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    required autofocus
                >
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="current-password"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    required
                >
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="row-opts">
                <label class="checkbox-wrap">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn-primary">Masuk</button>
        </form>
    </div>
</div>

</body>
</html>
