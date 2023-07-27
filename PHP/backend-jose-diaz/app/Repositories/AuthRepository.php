<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthRepository implements AuthRepositoryInterface
{
   /**
    * The register function in PHP validates user input, creates a new user with the provided
    * information, and returns the user object along with an access token.
    *
    * @param request The  parameter is an instance of the Illuminate\Http\Request class. It
    * represents the HTTP request made to the server and contains information such as the request
    * method, headers, and input data.
    *
    * @return a response containing the user object and an access token.
    */
    public function register($request)
    {
        //Validate users
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        //Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response(['user' => $user, 'access_token' => $token]);
    }

   /**
    * The login function checks the user's credentials and returns a response with the user's
    * information and access token if the credentials are valid, otherwise it returns an error
    * response.
    *
    * @param request The `` parameter is an instance of the `Illuminate\Http\Request` class. It
    * represents the HTTP request made to the server and contains information such as the request
    * method, headers, and input data.
    *
    * @return The login function returns a response containing the user object and an access token if
    * the authentication attempt is successful. If the credentials are invalid, it returns a response
    * with an error message and a status code of 401 (Unauthorized).
    */
    public function login($request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response(['user' => $user, 'access_token' => $token]);
        }

        return response(['error' => 'Invalid credentials'], 401);
    }


   /**
    * The above function logs out the user by deleting their current access token and returns a
    * response message.
    *
    * @param request The `` parameter is an instance of the `Illuminate\Http\Request` class. It
    * represents the current HTTP request being handled by the application. It contains information
    * about the request such as the request method, headers, query parameters, and request body. In
    * this case, it is used to access the
    *
    * @return a response with a message indicating that the user has been logged out.
    */
    public function logout($request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'Logged out']);
    }
}
