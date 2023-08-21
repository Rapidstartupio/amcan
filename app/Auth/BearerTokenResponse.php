<?php

namespace App\Auth;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use App\Models\User;

class BearerTokenResponse extends \League\OAuth2\Server\ResponseTypes\BearerTokenResponse
{
    /**
     * Add custom fields to your Bearer Token response here, then override
     * AuthorizationServer::getResponseType() to pull in your version of
     * this class rather than the default.
     *
     * @param AccessTokenEntityInterface $accessToken
     *
     * @return array
     */
    protected function getExtraParams(AccessTokenEntityInterface $accessToken): array
    {
        $uid = $this->accessToken->getUserIdentifier();
        $user = User::find($uid);
        return [
            'report_id' => $user->equifax_report_id,
        ];
    }
}
