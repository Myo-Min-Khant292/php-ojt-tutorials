<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
interface MajorServiceInterface 
{
    /**
     * Return Major
     * @return object 
    */
    public function getMajor(): object;

    /**
     * store Major List
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