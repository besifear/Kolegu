<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Social;
use App\User;
use App\Role;

class SocialController extends Controller
{

	public function test(){
		echo 'test';
	}

    public function getSocialRedirect( $provider )
    {

        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {

            return view('pages.status')
                ->with('error','No such provider');

        }

        return Socialite::driver( $provider )->redirect();

    }

    public function getSocialHandle( $provider )
    {

        if (Input::get('denied') != '') {

            return redirect()->to('/login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');

        }

        $user = Socialite::driver( $provider )->user();
        $socialUser = null;

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->orWhere('username', '=', $user->name)->first();

        $email = $user->email;

        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }

        if (!empty($userCheck)) {

            $socialUser = $userCheck;

            $sameSocialId = Social::where([
            	['social_id', '=', $user->id],
            	['provider', '=', $provider ]
        	])->first();

        	if (empty($sameSocialId)) {
        		$socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $socialUser->social()->save($socialData);
        	}


        }
        else {

            $sameSocialId = Social::where([
            	['social_id', '=', $user->id],
            	['provider', '=', $provider ]
        	])->first();


            if (empty($sameSocialId)) {

                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email              = $email;
				$newSocialUser->username = $user->name;
				$newSocialUser->nickname = $user->name;
                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->token = str_random(64);
               	$newSocialUser->rank = 'amater';
               	$newSocialUser->role = 'user';
               	$newSocialUser->reputation = 0;
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                $socialUser = $newSocialUser;

            }
            else {

                //Load this existing social user
                $socialUser = $sameSocialId->user;

            }

        }

        auth()->login($socialUser, true);
		return redirect()->route('questions.index');
    }
}
