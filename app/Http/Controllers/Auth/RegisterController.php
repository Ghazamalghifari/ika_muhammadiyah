<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Keterangan_ika;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'name' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'id_angkatan' => 'required|exists:angkatans,id',
            'kontak' => 'required|max:255',
            'kategori_kontak' => 'required|max:255',
            'pemilik_kontak' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $jumlah_anggota = Keterangan_ika::find(1);   
        $jumlah_anggota->jumlah_anggota  +=1;
        $jumlah_anggota->save();   

        $user = User::create([
            'name' => $data['name'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'id_angkatan' => $data['id_angkatan'],
            'kontak' => $data['kontak'],
            'kategori_kontak' => $data['kategori_kontak'],
            'pemilik_kontak' => $data['pemilik_kontak'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'status' => 'member',
            'password' => bcrypt($data['password']),
        ]);
        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);

        return $user;

    }
}
