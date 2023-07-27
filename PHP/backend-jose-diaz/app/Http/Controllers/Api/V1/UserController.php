<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(Request $request)
    {
        try {
            $user = $this->userRepository->getUser($request);
            return response([$user], 200);
        } catch (\Exception $ex) {
            return  response([ "Algo salio mal al listar el usuario", "error" => $ex->getMessage(), "line" => $ex->getCode()
            ]);
        }
    }

    public function createTransaction(Request $request)
    {
        try {
            $user = $this->userRepository->createTransaction($request);
            return response([$user], 200);
        } catch (\Exception $ex) {
            return  response([ "Algo salio mal al Crear la transaccion", "error" => $ex->getMessage(), "line" => $ex->getCode()
            ]);
        }
    }

    public function createWithdrawal(Request $request)
    {
        try {
            $user = $this->userRepository->createWithdrawal($request);
            return response([$user], 200);
        } catch (\Exception $ex) {
            return  response([ "Algo salio mal al Crear el retiro", "error" => $ex->getMessage(), "line" => $ex->getCode()
            ]);
        }
    }
}
