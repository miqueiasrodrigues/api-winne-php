<?php

namespace App\Http\Controllers;

use App\Http\Services\Wine\CreateWineService;
use App\Http\Services\Wine\DeleteWineService;
use App\Http\Services\Wine\ListWineService;
use App\Http\Services\Wine\ShowWineService;
use App\Http\Services\Wine\UpdateWineService;
use App\Response;

class WineController extends Controller
{
    public function __construct()
    {
        $this->listService = new ListWineService();
        $this->showService = new ShowWineService();
        $this->createService = new CreateWineService();
        $this->updateService = new UpdateWineService();
        $this->deleteService = new DeleteWineService();
    }

    public function index()
    {
        $wines = $this->listService->execute();

        if ($wines === null) {
            return Response::json(404, 'Nenhum vinho encontrado.');
        }

        return Response::json(200, 'Lista de vinhos recuperada com sucesso.', $wines);
    }

    public function show(int $id)
    {
        $wine = $this->showService->execute($id);

        if ($wine === null) {
            return Response::json(404, 'Vinho não encontrado.');
        }

        return Response::json(200, 'Vinho recuperado com sucesso.', $wine);
    }

    public function store(array $wineData)
    {
        $wine = $this->createService->execute($wineData);

        return Response::json(201, 'Vinho inserido com sucesso.', $wine);
    }

    public function update(int $id, array $wineData)
    {
        $wine = $this->updateService->execute($id, $wineData);

         if ($wine === null) {
            return Response::json(404, 'Vinho não encontrado.');
        }

        return Response::json(200, 'Vinho atualizado com sucesso.', $wine);
    }

    public function destroy(int $id)
    {
        $wine = $this->deleteService->execute($id);

        if ($wine === null) {
            return Response::json(404, 'Vinho não encontrado.');
        }

        return Response::json(200, 'Vinho excluído com sucesso.');
    }
}
