<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use App\Contest;
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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'district' => ['string', 'max:255'],
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
        $user->username = $data['username'];
        $user->district = $data['district'];
        $user->password = Hash::make($data['password']);
        $user->birthdate = $data['birthdate'];
        $user->gender = $data['gender'];
        $user->is_admin = false;
        $user->participant_no = $latest_participant_no == null ? ($data['gender'] == 'putera' ? 1 : 2) : ($latest_participant_no->only('participant_no')['participant_no'] + 2);

        $contest = Contest::find($data['golongan-lomba']);
        if($contest->name == 'Cabang Fahm Al Qur\'an Umur maksimal 18 tahun 11 bulan 29 hari' || $contest->name == 'Cabang Syarh Al Qur\'an Umur maksimal 18 tahun 11 bulan 29 hari'){
            if (array_key_exists('group-name',$data)) {
            $group = new Group;
            $group->name = $data['group-name'];
            $group->description = $data['group-description'];
            $group->types = $data['gender'];
            $group->contest()->associate($data['golongan-lomba']);
            $group->save();
            $user->group()->associate($group);
            }else {
                $user->group()->associate($data['join-group']);
            }

        }else {
            $user->contest()->associate($data['golongan-lomba']);
        }

        $user->save();

        return $user;
    }
}
