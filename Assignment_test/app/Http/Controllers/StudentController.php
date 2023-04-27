<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\StudentServiceInterface;
use App\Contracts\Services\MajorServiceInterface;
use App\Http\Requests\StudentCreateRequest;
use App\Models\Student;

class StudentController extends Controller
{
    private $majorService;
    private $studentService;

    /**
     * Create a new controller instance.
     * @param StudnetServiceInterface $taskServiceInterface
     * @return void
     */
    public function __construct(MajorServiceInterface $majorServiceInterface , StudentServiceInterface $studentServiceInterface) 
    {
        $this->majorService = $majorServiceInterface;
        $this->studentService = $studentServiceInterface;
    }

    /**
     * Store Student.
     * @return object
    */
    public function index() 
    {
        $students = $this->studentService->getStudent();
        return view('student.index' , ['students' => $students]);
    }

    public function ex() {
        return view('student.ex');
    }

    /**
     * Go to Create Page.
     * @return object
    */
    public function create() 
    {
        $majors = $this->majorService->getMajor();
        return view('student.create' , ['majors' => $majors]);
    }

    /**
     * Create student.
     * @return void
    */
    public function store(StudentCreateRequest $request) 
    {
        $this->studentService->storeStudent($request->only([
            'name',
            'major',
            'phone',
            'email',
            'address',
        ]));
        return redirect('/');
    }

    /**
     * Show edit Page.
     * @return object
    */
    public function edit($id) 
    {
        $majors = $this->majorService->getMajor();
        $student = $this->studentService->showStudent($id);
        return view('student.edit' , ['student' => $student , 'majors' => $majors]);
    }

    /**
     * Update Studnet.
     * @param StudnetCreateRequest $request
     * @return object
    */
    public function update(StudentCreateRequest $request , $id) 
    {
        $this->studentService->updateStudent($id , $request->only([
            'name',
            'major',
            'phone',
            'email',
            'address',
        ]));
        return redirect('/');
    }

    /**
     * Delete Student.
     * @return void
    */
    public function destroy($id) 
    {
        $student = $this->studentService->destroyStudent($id);
        return redirect('/');
    }
}
