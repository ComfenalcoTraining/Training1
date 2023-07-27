<?php

namespace App\Interfaces;

/* The code is defining an interface called `AuthRepositoryInterface`. An interface in PHP is a
contract that defines a set of methods that a class implementing the interface must implement. */
interface AuthRepositoryInterface
{
    public function register(array $data);
    public function login(array $data);
    public function logout(array $data);
}
