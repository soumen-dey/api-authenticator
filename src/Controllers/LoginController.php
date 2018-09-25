<?php

namespace Soumen\Authenticator\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Soumen\Authenticator\Traits\Token\GeneratesTokens;
use Soumen\Authenticator\Traits\Response\HasJsonResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use GeneratesTokens, HasJsonResponse, AuthenticatesUsers {
        attemptLogin as protected authLogin;   
    }
    
    /**
     * Login user and create token
     *
     * @return JSON
     * @author Soumen Dey
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $user = $this->attemptLogin($request);

        if (!$user) {
            return $this->sendErrorResponse();
        }

        return $this->sendResponseWithToken($user);
    }
    
    /**
     * Send the response with the token after successful login.
     *
     * @return Response
     * @author Soumen Dey
     */
    public function sendResponseWithToken($user = null)
    {
        $user = $this->getUser($user);
        
        $token = $this->generateToken($user);
        
        return $this->sendResponse(
            $this->getSuccessMessage($token)
        );
    }
     
    /**
     * Attempt to log the user in.
     *
     * @author Soumen Dey
     */
    public function attemptLogin($request)
    {
        if (auth()->attempt($this->credentials($request))) {
            return auth()->user();
        }
        
        return false;
    }

    /**
     * Get the success message after successful login.
     *
     * @return Array
     * @author Soumen Dey
     */
    public function getSuccessMessage($token)
    {
        return [
            'access_token' => $token->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => $token->token->expires_at,
        ];
    }
    
    /**
     * Get the currently authenticated user.
     *
     * @return App\User
     * @author Soumen Dey
     */
    public function getUser($user = null)
    {
        return ($user) ? $user : auth()->user();
    }
}
