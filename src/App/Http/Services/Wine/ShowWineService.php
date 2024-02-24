<?php

namespace App\Http\Services\Wine;

use App\Http\Repositories\WineRepository;

class ShowWineService extends WineRepository
{
    public function execute(int $id)
    {
        $wine = $this->find($id);
        if ($wine === false) {
            return null;
        }

        return $wine;
    }
}
