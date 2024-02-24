<?php

namespace App\Http\Services\Wine;

use App\Http\Repositories\WineRepository;

class CreateWineService extends WineRepository
{
    public function execute(array $data)
    {
        $id = $this->save($data);

        return  $this->find($id);
    }
}
