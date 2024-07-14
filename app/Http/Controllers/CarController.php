<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\CarServiceInterface;
use Illuminate\Routing\Controller;


class CarController extends Controller
{
    /**
     * @var CarServiceInterface
     */
    private CarServiceInterface $carService;

    /**
     * @param CarServiceInterface $service
     */
    public function __construct(CarServiceInterface $service)
    {
        $this->carService = $service;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->carService->getCars();
    }
}
