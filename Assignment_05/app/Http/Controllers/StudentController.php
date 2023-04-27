<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Services\StudentServiceInterface;
use App\Contracts\Services\MajorServiceInterface;
use App\Http\Requests\StudentCreateRequest;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\SendMail;
use App\Models\Student;

class StudentController extends Controller
{
    private $majorService;
    private $studentService;
    
    /**
     * Export csv file.
     * @return void
    */
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    /**
     * Import csv file.
     * @param Request $request
     * @return void
    */
    public function import(Request $request)
    {
        Excel::import(new StudentsImport, $request->file(key:'import_file'));
        return redirect('/');
    }

    /**
     * Create a new controller instance.
     * @param MajorServiceInterface $majorServiceInterface
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
        $student = Student::where('email', $request->input('email'))->first();
        Mail::to($student->email)->send(new SendMail());
        return redirect('/');
    }

    /**
     * Search Student list
     * @return object
    */
    public function search(Request $request)
    {
        $students = $this->studentService->searchStudent();
        return view('student.index' , ['students' => $students]);
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
