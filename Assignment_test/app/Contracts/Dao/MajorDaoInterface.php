<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
 */
interface MajorDaoInterface
{
    /**
     * Return Major
     * @return object 
    */
    public function getMajor(): object;

    /**
     * Store major list
     * @return void
    */
    public function storeMajor(): void;

    /**
     * Show major
     * @return object
    */
    public function showMajor($id): object;

    /**
     * Update Major
     * @return void
    */
    public function updateMajor($id): void;
    
    /**
     * Delete Major
     * @return void 
    */
    public function destroyMajor($id): void;
}