<?php


namespace App\Repositories;

use App\Interfaces\FireStationTypeInterface;
use App\Models\FireStationType;


class FireStationTypeRepository extends BaseRepository implements FireStationTypeInterface
{
    public function __construct(FireStationType $model)
    {
        $this->model = $model;
    }
}
