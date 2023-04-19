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



    public function index() {
        $tasks = $this->taskService->getTasks();
        return view('welcome' , ['tasks' => $tasks]);
    }

        
    public function store(TaskCreateRequest $request) {
        $this->taskService->storeTask($request->only([
            'name',
        ]));
        return redirect('/');
    }
    
    public function destroy($id) {
        $this->taskService->deleteTaskById($id);
        return redirect('/');
    }
}
