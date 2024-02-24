<?php

namespace App\Http\Repositories;

use App\Http\Models\Wine;
use App\Http\Repositories\Repository;

class WineRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('wine', new Wine);
    }
}
