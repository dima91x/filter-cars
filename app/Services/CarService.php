<?php

namespace App\Services;

use App\Http\Resources\CarResource;
use App\Repositories\CarRepository;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Services\Interfaces\CarServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarService implements CarServiceInterface
{
    private CarRepositoryInterface $carRepository;

    public function __construct()
    {
        $this->carRepository = new CarRepository();
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getCars(): AnonymousResourceCollection
    {
        $cars = $this->carRepository->all();

        return CarResource::collection($cars)
            ->additional([
                'meta' => [
                    'total_count' => $cars->count()
                ],
            ]);
    }
}
