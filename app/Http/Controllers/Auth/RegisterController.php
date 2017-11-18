<?php

namespace SchoolDays\Http\Controllers\Auth;

use SchoolDays\Jobs\SendVerificationMail;
use SchoolDays\Models\UserVerification;
use SchoolDays\User;
use SchoolDays\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Ramsey\Uuid\Uuid;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \SchoolDays\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'status'=>'unverified',
            'password' => bcrypt($data['password']),
        ]);

        $verification = UserVerification::create([
           'user_id'=>$user->id,
           'code'=>Uuid::uuid1()->toString()
        ]);

        dispatch(new SendVerificationMail($user,$verification->code));
        return $user;
    }

    public function verify($code)
    {
        $users = UserVerification::whereCode($code)->get();
        if ($users && $users->count() > 0)
        {
            UserVerification::find($users->user_id)->delete();
            return redirect()->with('success','YaY ! Your account verified successfully!');
        }
        else{
            return redirect('login')->with('error','Oh! You are not verified !');
        }
    }
}
