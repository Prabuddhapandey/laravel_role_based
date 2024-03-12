<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     //Admin
        //     [
                // 'name'=>'Admin',
                // 'username'=>'admin',
                // 'email'=>'admin@gmail.com',
                // 'password'=>Hash::make('1234'),
                // 'role'=>'admin',
        //     ]
        // ]);

        User::create([
            'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1234'),
                'role'=>'admin',
                'status'=> true,
        ]);
    }
}
