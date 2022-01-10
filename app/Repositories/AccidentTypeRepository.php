<?php


namespace App\Repositories;

use App\Interfaces\AccidentTypeInterface;
use App\Models\AccidentType;


class AccidentTypeRepository extends BaseRepository implements AccidentTypeInterface
{
    public function __construct(AccidentType $model)
    {
        $this->model = $model;
    }
}
