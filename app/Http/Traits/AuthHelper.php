<?php

namespace App\Http\Traits;

use JwtAuth;
use App\Models \{
    User,
        Token
};

trait AuthHelper
{
    /**
     * Create or update the token
     */
    public static function updateToken(User $user, string $token) : Token
    {
        return Token::updateOrCreate(['user_id' => $user->id], ['token' => $token]);
    }
}