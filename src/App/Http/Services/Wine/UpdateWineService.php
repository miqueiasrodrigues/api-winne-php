<?php

namespace App\Http\Services\Wine;

use App\Http\Repositories\WineRepository;

class UpdateWineService extends WineRepository
{
    public function execute(int $id, array $data)
    {
        if ($this->find($id) === false) {
            return null;
        }

        $this->update($id, $data);

        return $this->find($id);
    }
}
