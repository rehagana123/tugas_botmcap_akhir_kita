<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'nama' => ['required', 'string', 'max:255'],
                'jenis_kelamin' => ['required'],
                'alamat' => ['required'],
                'nomor_telepon' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:16'],
            ],
            [
                'name.required' => 'Username Harus diisi!',
                'name.string' => 'Username harus berupa string bukan angka!',
                'name.max' => 'Maksimum panjang karakter username harus 255!',
                'email.required' => 'Email Harus diisi!',
                'email.string' => 'Email harus berupa string bukan angka!',
                'email.email' => 'Email tidak valid!',
                'email.max' => 'Maksimum panjang karakter email harus 255!',
                'email.unique' => 'Email tidak boleh sama!',
                'password.required' => 'Password Harus diisi!',
                'password.string' => 'Password harus berupa string bukan angka!',
                'password.min' => 'Password minimal 8 karakter!',
                'password.confirmed' => 'Password harus sama!',
                'nama.required' => 'Nama Lengkap Harus diisi!',
                'nama.string' => 'Nama Lengkap harus berupa string bukan angka!',
                'nama.max' => 'Maksimum panjang karakter Nama Lengkap harus 255!',
                'jenis_kelamin.required' => 'Jenis Kelamin Harus diisi!',
                'alamat.required' => 'Alamat Harus diisi!',
                'nomor_telepon.required' => 'Nomor Telepon Harus diisi!',
                'nomor_telepon.max' => 'Maksimum panjang karakter email harus 16!',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2
        ]);

        $profile = Profile::create([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat'],
            'nomor_telepon' => $data['nomor_telepon'],
            'users_id' => $user->id,
        ]);

        return $user;

        // biasakan dd buat ngecek datanya udah kebikin apa belom
        // dd($profile);
    }
}


    