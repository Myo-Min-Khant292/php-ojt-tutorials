<?php

namespace App\Services;

use App\Contracts\Dao\MajorDaoInterface;
use App\Contracts\Services\MajorServiceInterface;

class MajorService implements MajorServiceInterface
{
    /**
     * major Dao
     */
    private $majorDao;

    /**
     * Class Constructor
     * @param majorDaoInterface
     * @return void
     */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    /**
     * Return Major
     * @return object 
    */
    public function getMajor(): object
    {
        return $this->majorDao->getMajor();
    }

    /**
     * store Major List
     * @return void
    */

    public function storeMajor() : void
    {
        $this->majorDao->storeMajor();
    }

    /**
     * Show major
     * @return object
    */
    public function showMajor($id) : object
    {
        return $this->majorDao->showMajor($id);
    }

    /**
     * Update Major
     * @return void
    */
    public function updateMajor($id) : void
    {
        $this->majorDao->updateMajor($id);
    }

    /**
     * Delete Major
     * @return void 
    */
    public function destroyMajor($id) : void
    {
        $this->majorDao->destroyMajor($id);
    }
}