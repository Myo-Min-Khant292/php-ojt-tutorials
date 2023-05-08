<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
interface AuthServiceInterface 
{
    
    /**
     * register User List
     * @return object
    */
    public function registerUser(array $userData): object;
}