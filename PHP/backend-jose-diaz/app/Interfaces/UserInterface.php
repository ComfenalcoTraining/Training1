<?php

namespace App\Interfaces;

/* The code is defining an interface called `UserRepositoryInterface`. An interface in PHP is a
contract that defines a set of methods that a class implementing the interface must implement. */
interface UserRepositoryInterface
{
    public function getUser(array $data);
    public function createTransaction(array $data);
    public function createWithdrawal(array $data);
}
