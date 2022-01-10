<?php


namespace App\Repositories;

use App\Interfaces\SubDepartmentInterface;
use App\Models\SubDepartment;


class SubDepartmentRepository extends BaseRepository implements SubDepartmentInterface
{
    public function __construct(SubDepartment $subDepartment)
    {
        $this->model = $subDepartment;
    }
}
