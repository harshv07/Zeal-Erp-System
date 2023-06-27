<?php

namespace Database\Seeders;

use App\Models\branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        branch::create([
            'name' => 'Computer',
        ]);
        branch::create([
            'name' => 'Civil',
        ]);
        branch::create([
            'name' => 'E & TC',
        ]);
        branch::create([
            'name' => 'IT',
        ]);
    }
}
