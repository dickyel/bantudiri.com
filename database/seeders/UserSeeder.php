<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [

            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),

            ],
            [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),

            ],
        

        ];
    
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
