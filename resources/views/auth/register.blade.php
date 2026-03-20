<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — Kasir App</title>
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

        .brand { position: relative; z-index: 1; }

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
        }

        .roles-showcase {
            position: relative;
            z-index: 1;
        }

        .roles-eyebrow {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .roles-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 3.5vw, 3rem);
            font-weight: 800;
            letter-spacing: -1.5px;
            line-height: 1.1;
            margin-bottom: 2rem;
        }

        .role-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: border-color 0.2s;
        }

        .role-card:hover { border-color: var(--accent); }

        .role-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .role-dot.superadmin { background: #f5c842; }
        .role-dot.admin      { background: #5be0a8; }
        .role-dot.kasir      { background: #7eb3f7; }

        .role-name {
            font-family: 'Syne', sans-serif;
            font-weight: 600;
            font-size: 14px;
            text-transform: capitalize;
        }

        .role-desc {
            font-size: 12px;
            color: var(--muted);
        }

        .panel-right {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            overflow-y: auto;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 1rem 0;
        }

        .form-header {
            margin-bottom: 2rem;
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

        .field { margin-bottom: 1.1rem; }

        label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.45rem;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"],
        select {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.8rem 1rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s, background 0.2s;
            appearance: none;
            -webkit-appearance: none;
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        select option {
            background: #1a1a1a;
            color: var(--text);
        }

        input:focus, select:focus {
            border-color: var(--accent);
            background: var(--accent-dim);
        }

        input.is-invalid, select.is-invalid {
            border-color: var(--error);
        }

        .invalid-feedback {
            font-size: 12px;
            color: var(--error);
            margin-top: 0.3rem;
            display: block;
        }

        .btn-primary {
            width: 100%;
            padding: 0.9rem;
            background: var(--accent);
            color: #0d0d0d;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: opacity 0.2s, transform 0.1s;
        }

        .btn-primary:hover { opacity: 0.9; }
        .btn-primary:active { transform: scale(0.99); }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 1.5rem 0;
        }

        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .panel-left { display: none; }
        }
    </style>
</head>
<body>

<div class="panel-left">
    <div class="grid-bg"></div>

    <div class="brand">
        <div class="brand-mark">
            <div class="brand-icon">K</div>
            <span class="brand-name">KasirApp</span>
        </div>
    </div>

    <div class="roles-showcase">
        <p class="roles-eyebrow">Manajemen Akses</p>
        <h2 class="roles-title">Tiga Level<br>Hak Akses</h2>

        <div class="role-card">
            <span class="role-dot superadmin"></span>
            <div>
                <div class="role-name">Super Admin</div>
                <div class="role-desc">Akses penuh semua fitur & manajemen user</div>
            </div>
        </div>

        <div class="role-card">
            <span class="role-dot admin"></span>
            <div>
                <div class="role-name">Admin</div>
                <div class="role-desc">Kelola produk, laporan & pengaturan toko</div>
            </div>
        </div>

        <div class="role-card">
            <span class="role-dot kasir"></span>
            <div>
                <div class="role-name">Kasir</div>
                <div class="role-desc">Proses transaksi & riwayat penjualan</div>
            </div>
        </div>
    </div>

    <div></div>
</div>

<div class="panel-right">
    <div class="form-container">
        <div class="form-header">
            <h2 class="form-title">Buat Akun</h2>
            <p class="form-subtitle">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="name">Nama Lengkap</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Budi Santoso"
                    autocomplete="name"
                    class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    required autofocus
                >
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

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
                    required
                >
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="role">Role / Jabatan</label>
                <select
                    id="role"
                    name="role"
                    class="{{ $errors->has('role') ? 'is-invalid' : '' }}"
                    required
                >
                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>— Pilih role —</option>
                    <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin"       {{ old('role') == 'admin'       ? 'selected' : '' }}>Admin</option>
                    <option value="kasir"       {{ old('role') == 'kasir'       ? 'selected' : '' }}>Kasir</option>
                </select>
                @error('role')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <hr class="divider">

            <div class="field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Min. 8 karakter"
                    autocomplete="new-password"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    required
                >
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                    required
                >
                @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Buat Akun</button>
        </form>
    </div>
</div>

</body>
</html>
