<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
 */
interface TaskDaoInterface
{
    /**
     * Get task list
     * @return object
     */
    public function getTasks(): object;

    /**
     * Store task list
     * @return void
     */
    public function storeTask(): void;

    /**
     * Delete task by id
     * @param int $id
     * @return void
     */
    public function deleteTaskById(int $id): void;
}