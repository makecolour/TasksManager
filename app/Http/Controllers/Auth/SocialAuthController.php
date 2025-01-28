<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Faker\Factory as FakerFactory;

class SocialAuthController
{
    public function redirectToProvider(string $provider): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver($provider)->user();
        $faker = FakerFactory::create();

        $authUser = User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'name' => $user->getName() ?? $user->getNickname() ?? $faker->userName,
                'email' => $user->getEmail(),
                'password' => Hash::make(Str::random(24)),
                'email_verified_at' => now(),
            ]
        );

        $authUser->update([
            'email_verified_at' => now(),
        ]);

        Auth::login($authUser, true);

        return redirect()->route('dashboard');
    }
}
