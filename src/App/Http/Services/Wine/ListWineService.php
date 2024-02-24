<?php

namespace App\Http\Services\Wine;

use App\Http\Repositories\WineRepository;

class ListWineService extends WineRepository
{
    public function execute()
    {
        $wines = $this->find();

        if ($wines === []) {
            $wines = null;
        }

        return $wines;
    }
}
