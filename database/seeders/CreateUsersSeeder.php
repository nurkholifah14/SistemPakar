<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'user',
            'email'=> 'user@gmail.com',
            'password'=> bcrypt('12345'),
            'alamat' => 'Jl. Kencana No.13',
            'telp' => '08974834244',
            'role' => 'user',
            ],
            [
                'name' => 'admin',
                'email'=> 'admin@gmail.com',
                'password'=> bcrypt('123456'),
                'alamat' => 'Jl. Veteran',
                'telp' => '08763737647',
                'role' => 'admin',
            ],
        ];

        foreach ($users as $key => $user){
            User::create($user);
        }
    }
}
