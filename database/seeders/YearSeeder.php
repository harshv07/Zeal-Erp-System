<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::create([
            'value' => 2021,
        ]);
        Year::create([
            'value' => 2022,
        ]);
        Year::create([
            'value' => 2023,
        ]);
        Year::create([
            'value' => 2024,
        ]);
    }
}
