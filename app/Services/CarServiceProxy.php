<?php

namespace App\Services;

use App\Services\Interfaces\CarServiceInterface;
use App\Traits\DatabaseChecker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;


class CarServiceProxy implements CarServiceInterface
{
    use DatabaseChecker;

    /**
     * @var CarServiceInterface|CarService
     */
    private CarServiceInterface $carService;

    public function __construct()
    {
        $this->carService = new CarService();
        $this->connections = array_keys(Config::get('database.connections'));
    }

    /**
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function getCars(): JsonResponse|AnonymousResourceCollection
    {
        if ($this->checkAccessDB())
            return $this->carService->getCars();
        else
            return response()->json(["error" => "Databases are not available"], 500);
    }
}
