<?php


namespace App\Repositories;

use App\Interfaces\FireAccidentReasonInterface;
use App\Models\FireAccidentReason;


class FireAccidentReasonRepository extends BaseRepository implements FireAccidentReasonInterface
{
    public function __construct(FireAccidentReason $model)
    {
        $this->model = $model;
    }
}
