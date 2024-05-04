<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
  //fungsi menampilkan halaman login
  public function login(Request $request) {
    return view('auth.login');
  }
  //fungsi untuk autentikasi
  public function authenticate(Request $request) {
    $validatedData = $request->validate([
      'username' => ['required', 'string'],
      'password' => ['required', 'string']
    ]);

    if (Auth::attempt($validatedData)) {
      $request->session()->regenerate();

      return redirect()->intended('/pengunjungs');
    }

    return back()->with('alert', [
      'type' => 'danger',
      'message' => 'Username atau password salah'
    ]);
  }

  //fungsi menampilkan halaman register
  public function register(Request $request) {
    return view('auth.register');
  }
  //fungsi untuk mendaftar
  public function store(Request $request) {
    $validatedData = $request->validate([
      'name' => ['required', 'string', 'min:3', 'max:255'],
      'username' => ['required', 'string', 'unique:users'],
      'password' => ['required', 'string'],
      'confirm_password' => ['required', 'string', 'same:password'],
    ]);

    $user = User::create($validatedData);

    return redirect('/login')->with('alert', [
      'type' => 'success',
      'message' => 'Akun anda telah terdaftar, Silahkan login untuk lanjut'
    ]);
  }

  //fungsi logout
  public function logout(Request $request) {

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
