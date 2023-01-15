<?php
namespace App\Services;

use App\Models\Rawafed\SocialAccount;
use App\Models\Rawafed\UserType;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function findOrCreate(ProviderUser $providerUser, $provider) {

        $account = SocialAccount::where('provider_id', $providerUser->getId())->where('provider_name', $provider)->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::where('email', $providerUser->getEmail())->first();
            $userType = UserType::select('id')->where('name_en', 'User')->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name_ar' => $providerUser->getName(),
                    'name_en' => $providerUser->getName(),
                    'image' => $providerUser->getAvatar(),
                    'image_flag' => 0,
                    'complete' => 0,
                    'user_type_id' => $userType->id,
                ]);
            }
            $user->account()->create([
                'provider_name' => $provider,
                'provider_id' => $providerUser->getId()
            ]);
            return $user;
        }
    }
}
