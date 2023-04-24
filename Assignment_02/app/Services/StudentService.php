<?php

namespace App\Services;

use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;

class StudentService implements StudentServiceInterface
{
    /**
     * student Dao
     */
    private $studentDao;

    /**
     * Class Constructor
     * @param studentDaoInterface
     * @return void
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * Show Student List
     * @return object 
    */
    public function getStudent() : object {
        return $this->studentDao->getStudent();
    }

    /**
     * Store Student List
     * @return void 
    */
    public function storeStudent() : void
    {
        $this->studentDao->storeStudent();
    }

    /**
     * Show Specific Student
     * @return object 
    */
    public function showStudent($id) : object
    {
        return $this->studentDao->showStudent($id);
    }

    /**
     * Update Specific Student
     * @return void 
    */
    public function updateStudent($id) : void
    {
        $this->studentDao->updateStudent($id);
    }

    /**
     * Destroy Specific Student
     * @return void 
    */
    public function destroyStudent($id) : void
    {
        $this->studentDao->destroyStudent($id);
    }
}