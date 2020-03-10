<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/peserta';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthdate' => ['required'],
            'gender' => ['required', 'in:putera,puteri'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $latest_participant_no = User::where('is_admin', 0)->where('gender', $data['gender'])->latest()->first();

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->birthdate = $data['birthdate'];
        $user->gender = $data['gender'];
        $user->is_admin = false;
        $user->participant_no = $latest_participant_no == null ? ($data['gender'] == 'putera' ? 1 : 2) : ($latest_participant_no->only('participant_no')['participant_no'] + 2);
        $user->contest()->associate($data['golongan-lomba']);
        $user->save();

        return $user;
    }
}
