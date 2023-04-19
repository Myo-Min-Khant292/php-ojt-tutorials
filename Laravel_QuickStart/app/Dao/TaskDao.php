<?php

namespace App\Dao;

use App\Contracts\Dao\TaskDaoInterface;
use App\Models\Task;

class TaskDao implements TaskDaoInterface
{
    /**
     * Get task
     * @return object
     */
    public function getTasks(): object
    {
        return Task::all();
    }

    /**
     * Store task
     * @return void
     */
    public function storeTask(): void
    {
        $task = new Task();
        $task->name = request('name');
        $task->save();
    }

    /**
     * Delete task by id
     * @param int $id
     * @return void
     */
    public function deleteTaskById($id): void
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}