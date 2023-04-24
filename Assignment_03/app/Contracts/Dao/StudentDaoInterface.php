<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
 */
interface StudentDaoInterface
{
    /**
     * Show Student List
     * @return object 
    */
    public function getStudent() : object;

    /**
     * Store Student List
     * @return void 
    */
    public function storeStudent() : void;

    /**
     * Show Specific Student
     * @return object 
    */
    public function showStudent($id) : object;

    /**
     * Update Specific Student
     * @return void 
    */
    public function updateStudent($id): void;

    /**
     * Destroy Specific Student
     * @return void 
    */
    public function destroyStudent($id): void;
}