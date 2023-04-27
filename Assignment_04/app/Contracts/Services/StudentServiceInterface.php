<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
interface StudentServiceInterface 
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
    public function storeStudent() : void ;

    /**
     * Show Specific Student
     * @return object 
    */
    public function showStudent($id) : object;

    /**
     * Update Specific Student
     * @return void
    */
    public function updateStudent($id) : void;

    /**
     * Destroy Specific Student
     * @return void 
    */
    public function destroyStudent($id): void;
}