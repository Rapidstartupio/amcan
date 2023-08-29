<?php

namespace App\Claims;

use App\Models\User;
use CorBosman\Passport\AccessToken;

class CustomClaim
{
    public function handle(AccessToken $token, $next)
    {
        $user = User::find($token->getUserIdentifier());
        $token->addClaim('report_id', "abc");
        //$token->addClaim('openid', 'string');
        return $next($token);
    }
}
