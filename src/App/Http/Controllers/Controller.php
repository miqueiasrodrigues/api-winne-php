<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $listService;
    protected $showService;
    protected $createService;
    protected $updateService;
    protected $deleteService;

    abstract public function index();
    abstract public function show(int $id);
    abstract public function store(array $data);
    abstract protected function update(int $id, array $data);
    abstract protected function destroy(int $id);
}
