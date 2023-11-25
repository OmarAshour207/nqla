<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@app.com',
            'phone'     => '1007958185',
            'password'  => bcrypt('123456'),
            'role'      => 'admin',
            'status'    => 1
        ]);
    }
}
