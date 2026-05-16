<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama_admin' => 'required',
        'username_admin' => 'required',
        'password_admin' => 'required',
        'email_admin' => 'required',
        'no_telp_admin' => 'required',
    ]);

    Admin::create($request->all());

    return redirect('/admin')->with('success', 'Data admin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nama_admin' => 'required',
        'username_admin' => 'required',
        'password_admin' => 'required',
        'email_admin' => 'required',
        'no_telp_admin' => 'required',
    ]);

    $admin = Admin::findOrFail($id);
    $admin->update($request->all());

    return redirect('/admin')->with('success', 'Data admin berhasil diupdate');
    }

    public function destroy($id)
    {
       Admin::findOrFail($id)->delete();

    return redirect('/admin')->with('success', 'Data admin berhasil dihapus');
    }
}