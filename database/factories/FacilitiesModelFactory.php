<?php

namespace Database\Factories;

use App\Models\FacilitiesModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\UUIDGenerator as uuid;

class FacilitiesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = FacilitiesModel::class;

    public function definition()
    {
        return [
            'id' => uuid::generate(),
            'name' => $this->faker->company()
        ];
    }
}
