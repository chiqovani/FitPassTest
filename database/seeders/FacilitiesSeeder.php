<?php

namespace Database\Seeders;

use App\Models\FacilitiesModel;
use Illuminate\Database\Seeder;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = FacilitiesModel::class;

    public function run()
    {
        FacilitiesModel::factory()->count(2)->create();
    }
}
