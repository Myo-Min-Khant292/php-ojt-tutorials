<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
interface TaskServiceInterface 
{
    /**
     * Get user list
     * @return object
    */
    public function getTasks(): object;

    /**
     * Get user list
     * @return void
    */
    public function storeTask(): void;

    /**
     * Delete user by id
     * @param int $id
     * @return void
    */
    public function deleteTaskById(int $id): void;
}