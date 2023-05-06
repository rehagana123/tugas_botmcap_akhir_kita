<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->role_id);
        $profile = Profile::where('users_id', Auth::user()->id)->first();

        return view('profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
            'nomor_telepon' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:16'],
        ], [
            'nama.required' => 'Nama Lengkap Harus diisi!',
            'nama.string' => 'Nama Lengkap harus berupa string bukan angka!',
            'nama.max' => 'Maksimum panjang karakter Nama Lengkap harus 255!',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus diisi!',
            'alamat.required' => 'Alamat Harus diisi!',
            'nomor_telepon.required' => 'Nomor Telepon Harus diisi!',
            'nomor_telepon.max' => 'Maksimum panjang karakter email harus 16!',
        ]);

        Profile::where('users_id', Auth::user()->id)->update([
            'nama' => $request['nama'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'alamat' => $request['alamat'],
            'nomor_telepon' => $request['nomor_telepon'],
        ]);

        return redirect('/profile');
    }
}
