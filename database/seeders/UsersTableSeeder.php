<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name'=>'Admin',
            'email'=>'admin@example.com',
            'password'=>bcrypt('aaaaaaaa')
        ]);

        User::factory(5)->create();
    }
}
