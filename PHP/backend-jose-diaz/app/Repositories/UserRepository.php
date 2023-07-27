<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Retired;
use App\Models\Transacction;
use App\Models\User;

class UserRepository implements UserRepositoryInterface{

   /**
    * The function "getUser" fetches user details by ID and returns the user as a JSON response.
    *
    * @param id The "id" parameter is the unique identifier of the user whose details you want to
    * fetch.
    *
    * @return a JSON response containing the details of the user with the specified ID.
    */
    // Fetch user details by ID
    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    //Create transaction
  /**
   * The createTransaction function in PHP validates and creates a transaction with the given request
   * data, and returns a JSON response with the created transaction.
   *
   * @param request The  parameter is an instance of the Illuminate\Http\Request class. It
   * represents the HTTP request made to the server and contains all the information about the request,
   * such as the request method, headers, and input data.
   *
   * @return a JSON response with the created transaction data and a status code of 201 (indicating
   * that the request was successful and a new resource was created).
   */
    public function createTransaction($request)
    {
        $data = $request->validate([
            'amount_of_money' => 'required|integer',
            'remitent' => 'required|exists:users,id',
            'destinatary' => 'required|exists:users,id',
        ]);

        $transaction = Transacction::create($data);
        return response()->json($transaction, 201);
    }

    //Create withdrawal
   /**
    * The createWithdrawal function creates a new withdrawal record, updates the user's money balance,
    * and returns the created withdrawal as a JSON response.
    *
    * @param request The  parameter is an instance of the Illuminate\Http\Request class. It
    * represents the HTTP request made to the server and contains all the data and information related
    * to the request, such as the request method, headers, and request payload.
    *
    * @return a JSON response with the created withdrawal data and a status code of 201 (Created).
    */
    public function createWithdrawal($request)
    {
        $data = $request->validate([
            'money_balance' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'date_retired' => 'required|date',
        ]);

        $withdrawal = Retired::create($data);

        // Update user's money balance after the withdrawal
        $user = User::findOrFail($data['user_id']);
        $user->update(['money_balance' => $user->money_balance - $data['money_balance']]);

        return response()->json($withdrawal, 201);
    }

}
