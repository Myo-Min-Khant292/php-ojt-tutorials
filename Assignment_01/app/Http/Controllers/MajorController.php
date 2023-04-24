<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\MajorServiceInterface;
use App\Http\Requests\MajorCreateRequest;
use App\Models\Major;


/**
 * This is Task Controller.
 * This will handle task CRUD processing.
*/
class MajorController extends Controller
{

    private $majorService;
    
    /**
     * Create a new controller instance.
     * @param MajorServiceInterface $taskServiceInterface
     * @return void
     */
    public function __construct(MajorServiceInterface $majorServiceInterface) {
        $this->majorService = $majorServiceInterface;
    }

    public function index() {
        $majors = $this->majorService->getMajor();
        return view('major.index' , ['majors' => $majors]);
    }

    public function create() {
        return view('major.create');
    }

    public function store(MajorCreateRequest $request) {
        $this->majorService->storeMajor($request->only([
            'name',
        ]));
        return redirect('/major');
    }

    public function edit($id) {
        $major = $this->majorService->showMajor($id);
        return view('major.edit' , ['major' => $major]);
    }

    public function update(MajorCreateRequest $request , $id) {
        $this->majorService->updateMajor($id ,$request->only([
            'name',
        ]));
        return redirect('/major');
    }

    public function destroy($id) {
        $this->majorService->destroyMajor($id);
        return redirect('/major');
    }
}
