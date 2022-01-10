<?php


namespace App\Repositories;

use App\Interfaces\DamagedPropertyInterface;
use App\Models\DamagedProperty;


class DamagedPropertyRepository extends BaseRepository implements DamagedPropertyInterface
{
    public function __construct(DamagedProperty $model)
    {
        $this->model = $model;
    }
}
