<?php

namespace Soumen\Authenticator\Traits\Token;

trait GeneratesTokens
{
    /**
     * Generates token for the user.
     *
     * @author Soumen Dey
     */
    public function generateToken($user)
    {   
        $token = $user->createToken($this->getTokenName());
        $token->token->save();
        
        return $token;
    }

    /**
     * Get the string to be used for token name.
     *
     * @return String
     * @author Soumen Dey
     */
    public function getTokenName()
    {
        return 'Access Token';
    }
}