<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected $providers = [
        'github', 'facebook', 'google', 'twitter'
    ];

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        if (!$this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {

        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty($user->email) ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }
    protected function sendSuccessResponse()
    {
        return redirect()->intended('home');
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();


        // if user already found
        if ($user) {

            $old_avatar = $user->avatar;
            if ($old_avatar != 'avatar.png' && ! Str::contains($old_avatar, 'http')) {
                $imagepath = public_path('/storage/users/') . '/' . $old_avatar;
                File::delete($imagepath);
            }

            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
                'slug' => Str::slug($providerUser->getName() . now()),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                'subscription_expiry' => now()->format('Y-m-d H:i:s'),
                'email_verified_at' => now(),
                // user can use reset password to create a password
                'password' => null
            ]);
            $user->slug = Str::slug($providerUser->getName() . now()) ;

        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }
}
