<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\Interfaces\CarRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CarRepository implements CarRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Car::all();
    }
}
