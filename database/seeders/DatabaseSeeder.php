<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $acq = new User(
            [
                'name' => 'Adrian Capote Quintana',
                'email' => 'adriancapote95@gmail.com',
                'password' => bcrypt('adriancapote95')
            ]
        );
        $acq->save();
        $user = new User(
            [
                'name' => 'Homero F. Palmero',
                'email' => 'homerofph@gmail.com',
                'password' => bcrypt('homerofph')
            ]
        );
        $user->save();
    }
}
