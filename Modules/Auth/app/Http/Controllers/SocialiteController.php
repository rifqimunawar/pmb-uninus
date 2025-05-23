<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
  public function redirect()
  {
    return Socialite::driver('google')
      ->scopes([
        'openid',
        'profile',
        'email',
        'https://www.googleapis.com/auth/spreadsheets.readonly'
      ])
      ->stateless()
      ->redirect();
  }


  public function callback()
  {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::where('google_id', $googleUser->getId())->first();

    if (!$user) {
      $user = new User();
      $user->name = $googleUser->getName();
      $user->email = $googleUser->getEmail();
      $user->google_id = $googleUser->getId();
    }

    $user->google_token = $googleUser->token;
    $user->google_refresh_token = $googleUser->refreshToken; // ⚠️ hanya diberikan saat login pertama + offline access
    $user->save();

    auth('web')->login($user);
    session()->regenerate();

    return redirect('/');
  }


}

