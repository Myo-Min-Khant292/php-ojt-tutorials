<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\TaskServiceInterface;
use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;


/**
 * This is Task Controller.
 * This will handle task CRUD processing.
*/
class TaskController extends Controller
{
    private $taskService;
    
    /**
     * Create a new controller instance.
     * @param TaskServiceInterface $taskServiceInterface
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskService = $taskServiceInterface;
    }

    /**
     * Get task
     * @return object
    */
    public function index() 
    {
        $tasks = $this->taskService->getTasks();
        return view('welcome' , ['tasks' => $tasks]);
    }

    /**
     * Store task
     * @return void
    */   
    public function store(TaskCreateRequest $request) 
    {
        $this->taskService->storeTask($request->only([
            'name',
        ]));
        return redirect('/');
    }
    
    /**
     * Delete task
     * @return void
    */
    public function destroy($id) 
    {
        $this->taskService->deleteTaskById($id);
        return redirect('/');
    }
}
