<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
*/
interface AuthDaoInterface
{
    /**
     * register user list
     * @return object
    */
    public function registerUser(array $userData): object;
}