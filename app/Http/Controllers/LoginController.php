<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_admin' => 'required',
            'password_admin' => 'required',
        ]);

        $admin = Admin::where('username_admin', $request->username_admin)
            ->where('password_admin', $request->password_admin)
            ->first();

        if ($admin) {
            session([
                'admin_id' => $admin->id_admin,
                'admin_nama' => $admin->nama_admin,
            ]);

            return redirect('/dashboard')->with('success', 'Login berhasil');
        }

        return redirect('/login')->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->forget(['admin_id', 'admin_nama']);

        return redirect('/login')->with('success', 'Logout berhasil');
    }
}