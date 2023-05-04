<?php

namespace App\Dao;

use App\Contracts\Dao\MajorDaoInterface;
use App\Models\Major;

class MajorDao implements MajorDaoInterface
{
    /**
     * Return all Major
     * @return object 
    */

    public function getMajor() : object
    {
        return Major::paginate(5);
    }

    /**
     * Store Major
     * @return void
     */
    public function storeMajor() : void
    {
        $major = new Major();
        $major->major = request('name');
        $major->save();
    }

    /**
     * Return Specific Major
     * @return object
    */
    public function showMajor($id): object
    {
        return Major::findOrFail($id);
    }

    /**
     * Update Major
     * @return void
    */
    public function updateMajor($id) : void
    {
        $major = Major::findOrFail($id);
        $major->major = request('name');
        $major->save();
    }

    /**
     * Delete Major
     * @return void 
    */
    public function destroyMajor($id) : void
    {
        $major = Major::findOrFail($id);
        $major->delete();
    }

}