<?php

namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use App\Models\Student;

class StudentDao implements StudentDaoInterface
{
    /**
     * Show Student List
     * @return object 
    */
    public function getStudent(): object 
    {
        return Student::all();  
    }

    /**
     * Store Student List
     * @return void 
    */
    public function storeStudent(): void 
    {
        $student = new Student();
        $student->name = request('name');
        $student->major_id = request('major');
        $student->phone = request('phone');
        $student->email = request('email');
        $student->address = request('address');
        $student->save();
    }

    /**
     * Show Specific Student
     * @return object 
    */
    public function showStudent($id): object
    {
        return Student::findOrFail($id);
    }

    /**
     * Update Specific Student
     * @return void
    */
    public function updateStudent($id): void
    {
        $student = Student::findOrFail($id);
        $student->name = request('name');
        $student->major_id = request('major');
        $student->phone = request('phone');
        $student->email = request('email');
        $student->address = request('address');
        $student->save();
    }

    /**
     * Destroy Specific Student
     * @return void 
    */
    public function destroyStudent($id): void
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }
}