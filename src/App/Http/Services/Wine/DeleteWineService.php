<?php

namespace App\Http\Services\Wine;

use App\Http\Repositories\WineRepository;

class DeleteWineService extends WineRepository
{
    public function execute(int $id)
    {
        if ($this->find($id) === false) {
            return null;
        }

        $this->delete($id);

        return [];
    }
}
