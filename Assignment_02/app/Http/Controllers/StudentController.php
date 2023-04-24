<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\StudentServiceInterface;
use App\Contracts\Services\MajorServiceInterface;
use App\Http\Requests\StudentCreateRequest;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;

class StudentController extends Controller
{
    private $majorService;
    private $studentService;
    
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new StudentsImport, $request->file(key:'import_file'));
        return redirect('/');
    }

    public function __construct(MajorServiceInterface $majorServiceInterface , StudentServiceInterface $studentServiceInterface) {
        $this->majorService = $majorServiceInterface;
        $this->studentService = $studentServiceInterface;
    }

    public function index() {
        $students = $this->studentService->getStudent();
        return view('student.index' , ['students' => $students]);
    }

    public function create() {
        $majors = $this->majorService->getMajor();
        return view('student.create' , ['majors' => $majors]);
    }

    public function store(StudentCreateRequest $request) {
        $this->studentService->storeStudent($request->only([
            'name',
            'major',
            'phone',
            'email',
            'address',
        ]));
        return redirect('/');
    }

    public function edit($id) {
        $majors = $this->majorService->getMajor();
        $student = $this->studentService->showStudent($id);
        return view('student.edit' , ['student' => $student , 'majors' => $majors]);
    }

    public function update(StudentCreateRequest $request , $id) {
        $this->studentService->updateStudent($id , $request->only([
            'name',
            'major',
            'phone',
            'email',
            'address',
        ]));
        return redirect('/');
    }

    public function destroy($id) {
        $student = $this->studentService->destroyStudent($id);
        return redirect('/');
    }
}
