<?php

namespace App\Http\Controllers;

use App\Models\Surat_keluar;
use App\Models\Surat_masuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticateUser(Request $request){
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Pengguna berhasil diotentikasi
            return redirect(route('dashboard'));
        } else {
            // Pengguna tidak berhasil diotentikasi
            return back()->with('loginError', 'Login failed!');
        }
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }
    public function showDashboard() {
        $suratMasukCount = Surat_masuk::count();
        $suratKeluarCount = Surat_keluar::count();
        $user = User::get();
    
        return view('dashboard', compact('suratMasukCount', 'suratKeluarCount','user'));
    }
}
