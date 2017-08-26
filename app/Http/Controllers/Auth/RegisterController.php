<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;


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
        // $validate = Validator::make(Input::all(), [
        // 'g-recaptcha-response' => 'required|captcha'
        // ]);
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
            'role' => 'user',
            'email_token' => base64_encode($data['email'])
        ]);
    }
/**
* Handle a registration request for the application.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function register(Request $request)
{
$this->validator($request->all())->validate();
event(new Registered($user = $this->create($request->all())));
dispatch(new SendVerificationEmail($user));
return view('verification');
}
/**
* Handle a registration request for the application.
*
* @param $token
* @return \Illuminate\Http\Response
*/
public function verify($token)
{
$user = User::where('email_token',$token)->first();
$user->verified = 1;
if($user->save()){
return view('emailconfirm',['user'=>$user]);
    }

}



}
