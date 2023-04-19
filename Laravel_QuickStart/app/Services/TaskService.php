<?php

namespace App\Services;

use App\Contracts\Dao\TaskDaoInterface;
use App\Contracts\Services\TaskServiceInterface;

/**
 * task Service class
*/
class TaskService implements TaskServiceInterface
{
    /**
     * Task Dao
     */
    private $taskDao;

    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return void
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * Get task list
     * @return object
     */
    public function getTasks(): object
    {
        return $this->taskDao->getTasks();
    }

    /**
     * Store task list
     * @return void
     */
    public function storeTask(): void
    {
        $this->taskDao->storeTask();
    }

    /**
     * Delete task by id
     * @param int $id
     * @return void
     */
    public function deleteTaskById(int $id): void
    {
        $this->taskDao->deleteTaskById($id);
    }
}