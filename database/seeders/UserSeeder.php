<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'role_id' => Role::where('slug','super-admin')->first()->id,
            'name'    => 'Super Admin',
            'email'   => 'superadmin@gmail.com',
            'password'=> bcrypt(11111111)
        ]);

        User::updateOrCreate([
            'role_id' => Role::where('slug','doctor')->first()->id,
            'name'    => 'Doctor',
            'email'   => 'doctor@gmail.com',
            'password'=> bcrypt(11111111)
        ]);

        User::updateOrCreate([
            'role_id' => Role::where('slug','assistant')->first()->id,
            'name'    => 'Assistant',
            'email'   => 'assistant@gmail.com',
            'password'=> bcrypt(11111111)
        ]);
    }
}
