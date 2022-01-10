<?php


namespace App\Repositories;

use App\Interfaces\TypeInterface;
use App\Models\Type;


class TypeRepository extends BaseRepository implements TypeInterface
{
    public function __construct(Type $model)
    {
        $this->model = $model;
    }
}
