<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;

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

    protected $redirectTo = '/';

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
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
           
        ],[
           'required' => ':attribute-i është i domosdoshëm',
            'min' => ':attribute-i duhet të ketë së paku :min karaktera',
            'max' => ':attribute-i mund të ketë më së shumti :max karaktera',
            'confirmed' => ':attribute-i nuk është i njëjtë në të dy fushat'
        ]);
        $validate = Validator::make(Input::all(), [
        'g-recaptcha-response' => 'required|captcha'
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
        return User::create([
            'username' => $data['username'],
            'nickname' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'reputation' => 0,
            'role' => 'user'
        ]);
    }

      public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
        Mail::to($user->email)->send(new ConfirmationEmail($user));

        return back()->with('status','Please confirm your email address.');
       
    }
    public function confirmEmail($token)
    {
        User::whereToken($token)->firstOrFail()->hasVerified();
        return redirect('login')->with('status', 'Jeni konfirmuar,tani mund te kyqeni');
    }

}
