<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider) -> user();
        /*
         * $user->getId();
         *$user->getNickname();
         *$user->getName();
         *$user->getEmail();
         *$user->getAvatar();
         */
        //لو اول مره اليوزر يدخل هسجله فى الداتابيز ولو مش اول مره هدخله على طول
        $selectProvider = Provider::where('provider_id', $user->getId())->first();
        if (!$selectProvider){
            //new user
            //قبل ما اسجله هتأكد ان الايميل ده مش متسجل قبل كدا فى جدول اليوزرز
            $userGetReal = User::where('email', $user->getEmail())->first();
            if (!$userGetReal) {
                $userGetReal = new User();
                $userGetReal->name = $user->getName();
                $userGetReal->email = $user->getEmail();
                $userGetReal->save();
            }
            // انت كدا سجلت اليوزر فى جدول اليوزرز سجله بقى فى جدول البروفيدرز
            $newProvider = new Provider();
            $newProvider->provider_id = $user->getId();
            $newProvider->provider = $provider;
            $newProvider->user_id = $userGetReal->id;
            $newProvider->save();
        } else {
            //login user
            $userGetReal = User::find($selectProvider->user_id);
        }
        auth()->login($userGetReal);
        return redirect()->route('home');
    }
}
