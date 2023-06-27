<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Testseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Students20',
            'email' => 'Students1112qe230@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'branch_id' => '2',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');

        $user->assignRole('Student');
    }
}
