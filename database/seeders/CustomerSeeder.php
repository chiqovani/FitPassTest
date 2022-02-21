<?php

namespace Database\Seeders;

use App\Models\CustomerModel;
use Database\Factories\CustomerModelFactory;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = CustomerModel::class;

    public function run()
    {
        CustomerModel::factory('name')->count(2)->create();
    }
}
