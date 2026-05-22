<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Hapus alert lama supaya tidak muncul saat back
        session()->forget(['success', 'error']);
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Alert berhasil login
            Alert::toast('Login berhasil!', 'success');

            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        // Alert gagal login
        Alert::toast('Username atau password salah!', 'error');

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        Auth::logout();

        // Hapus session alert supaya tidak muncul saat back
        session()->forget(['success', 'error']);

        Alert::toast('Logout berhasil!', 'success');
        return redirect()->route('login');
    }
}
