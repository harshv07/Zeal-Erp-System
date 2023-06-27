<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function veremail()
    {
        return Carbon::now()->format('Y-m-d H:i:s');
    }



    public function run()
    {
        // Teachers

        $user = User::create([
            'first_name' => 'Amazing',
            'last_name' => 'Spiderman',
            'name' => 'Spiderman newSpiderman',
            'email' => 'spiderman@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '1',
            'designation_id' => '1',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Teacher');



        $user = User::create([
            'first_name' => 'Rey',
            'last_name' => 'Mysterio',
            'name' => 'user1 newuser1',
            'email' => 'user1@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '2',
            'designation_id' => '2',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Teacher');

        $user = User::create([
            'first_name' => 'Iron',
            'last_name' => 'Man',
            'name' => 'user2 newuser2',
            'email' => 'user2@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '3',
            'designation_id' => '3',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Teacher');

        $user = User::create([
            'first_name' => 'Itachi',
            'last_name' => 'Uchiha',
            'name' => 'user3 newuser3',
            'email' => 'user4@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '3',
            'designation_id' => '3',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Teacher');

        $user = User::create([
            'first_name' => 'Eren',
            'last_name' => 'Yeager',
            'name' => 'user5 user5',
            'email' => 'user5@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '3',
            'designation_id' => '3',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Teacher');


        // Students 

        $user = User::create([
            'first_name' => 'Naruto',
            'last_name' => 'Uzumaki',
            'name' => 'Students1 newStudents1',
            'email' => 'Students1@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '3',
            'year_id' => '3',
            'designation_id' => '5',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Student');

        $user = User::create([
            'first_name' => 'Kakashi',
            'last_name' => 'Hatate',
            'name' => 'Students1 newStudents1',
            'email' => 'Students2@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '3',
            'year_id' => '3',
            'designation_id' => '5',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Student');


        // Admins 


        $user = User::create([
            'first_name' => 'Mob',
            'last_name' => 'Physco',
            'name' => 'Students1 newStudents1',
            'email' => 'Students5@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '1',
            'designation_id' => '3',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');

        $user->assignRole('Admin');

        $user = User::create([
            'first_name' => 'Saitama',
            'last_name' => 'OPM',
            'name' => 'Students1 newStudents1',
            'email' => 'Students6@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '4',
            'designation_id' => '2',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');

        $user->assignRole('Admin');

        $user = User::create([
            'first_name' => 'gOKU',
            'last_name' => 'VEGETA',
            'name' => 'Students1 newStudents1',
            'email' => 'Students7@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '2',
            'designation_id' => '1',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');

        $user->assignRole('Admin');


        //Super Admins

        $user = User::create([
            'first_name' => 'LEVI',
            'last_name' => 'ACKERMAN',
            'name' => 'Students1 newStudents1',
            'email' => 'superadmin@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '3',
            'designation_id' => '1',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');

        $user->assignRole('SuperAdmin');

        $user = User::create([
            'first_name' => 'MADARA',
            'last_name' => 'UCHIHA',
            'name' => 'Students1 newStudents1',
            'email' => 'superadmin2@gmail.com',
            'password' => '$2y$10$9AUkGhrbarpv001czMvQ6eXvNux6W2AQps.eCVnmtQcvQoG1SHYsi',
            'email_verified_at' => $this->ver(),
            'branch_id' => '1',
            'designation_id' => '1',
            'year_id' => '1',
        ]);
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');

        $user->assignRole('SuperAdmin');
    }

    public function ver()
    {
        return Carbon::now()->format('Y-m-d H:i:s');
    }
}
