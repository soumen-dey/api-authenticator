<?php

namespace Soumen\Authenticator\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Soumen\Authenticator\Traits\Token\GeneratesTokens;
use Soumen\Authenticator\Traits\Response\HasJsonResponse;

class RegisterController extends Controller
{
    use GeneratesTokens, HasJsonResponse;

    /**
     * Registers a user.
     *
     * @return Response
     * @author Soumen Dey
     */
    public function register(Request $request)
    {
        $request->validate($this->getValidationRules());

        $user = $this->create($request->all());

        $token = $this->generateToken($user);

        return $this->sendResponse(
            $this->getSuccessMessage($token)
        );
    }

    /**
     * Creates a new user.
     *
     * @return App\User
     * @author Soumen Dey
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
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
     * Get the validation rules.
     *
     * @return Array
     * @author Soumen Dey
     */
    public function getValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
