<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Tampilkan form registrasi.
     * Hanya Super Admin yang boleh membuat akun baru.
     * Jika ingin register terbuka, hapus middleware di constructor.
     */
    public function __construct()
    {
        // Aktifkan baris ini agar hanya super_admin yang bisa membuat user baru:
        // $this->middleware(['auth', 'role:super_admin']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role'     => ['required', 'string', 'in:super_admin,admin,kasir'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'role.required'     => 'Pilih role untuk akun ini.',
            'role.in'           => 'Role tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
            'password.min'      => 'Password minimal 8 karakter.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role via Spatie
        $user->assignRole($request->role);

        event(new Registered($user));

        // Jika registrasi oleh super_admin, jangan auto-login user baru
        if (Auth::check() && Auth::user()->hasRole('super_admin')) {
            return redirect()->route('super_admin.dashboard')
                ->with('success', "Akun {$user->name} berhasil dibuat dengan role {$request->role}.");
        }

        // Registrasi publik: auto-login
        Auth::login($user);

        return redirect()->route('kasir.dashboard');
    }
}
