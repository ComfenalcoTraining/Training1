<?php

namespace App\Http\Controllers;

use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * The function is a constructor that initializes the  property with an instance of
     * the AuthRepository class.
     *
     * @param AuthRepository authRepository The `` parameter is an instance of the
     * `AuthRepository` class. It is being injected into the constructor of the current class. This
     * means that the `AuthRepository` class is a dependency of the current class, and it is being
     * provided through constructor injection.
     */
    private $authRepository;

    function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

   /**
    * The function "register" attempts to register a user and returns a response with the user data if
    * successful, or an error message if an exception occurs.
    *
    * @param Request request The  parameter is an instance of the Request class, which is used
    * to retrieve and handle the incoming HTTP request data. It contains information such as the
    * request method, headers, query parameters, form data, and more. In this case, it is being passed
    * to the register() method to handle
    *
    * @return a response with the user data in an array if the registration is successful. If an
    * exception occurs, it returns a response with an error message, the exception message, and the
    * exception code.
    */
    public function register(Request $request)
    {
        try {
            $user = $this->authRepository->register($request);
            return response([$user], 200);
        } catch (\Exception $ex) {
            return  response([ "Algo salio mal al registrar el usuario", "error" => $ex->getMessage(), "line" => $ex->getCode()
            ]);
        }
    }

    /**
     * The login function attempts to log in a user and returns a response containing a token if
     * successful, or an error message if something goes wrong.
     *
     * @param Request request The  parameter is an instance of the Request class, which is used
     * to retrieve data from the HTTP request made to the login endpoint. It contains information such
     * as the user's credentials (username and password) that are needed for authentication.
     *
     * @return a response with a token if the login is successful. If there is an exception, it will
     * return a response with an error message and the exception details.
     */
    public function login(Request $request)
    {
        try {
            $sesion = $this->authRepository->login($request);
            return response(["token" => $sesion]);
        } catch (\Exception $ex) {
            return  response(["message" => "Algo salio mal al registrar el usuario"] . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }

   /**
    * The function logs out a user and returns a response message.
    *
    * @param Request request The  parameter is an instance of the Request class, which is used
    * to handle HTTP requests in Laravel. It contains information about the current request, such as
    * the request method, headers, and input data. In this case, it is used to pass the request data to
    * the logout method.
    *
    * @return a response with a message "Cierre de sesión" if the logout is successful. If there is an
    * exception, it will return a response with a message "Algo salio mal al registrar el usuario"
    * along with the exception message and code.
    */
    public function logout(Request $request)
    {
        try {
            $user = $this->authRepository->logout($request);
            return  response(["message" => "Cierre de sesión"]);
        } catch (\Exception $ex) {
            return  response(["message" => "Algo salio mal al registrar el usuario"]  . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
