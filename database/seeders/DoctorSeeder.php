<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::updateOrCreate([
            'name'                  => 'Dr.Sharmin Akter',
            'email'                 => 'sharmin@gmail.com',
            'degrees'               => 'MBBS,MPCS,DGO,FCPS',
            'specialist'            => 'GYNAE & OBS',
            'consultant_of_college' => 'USTC Medical College & Hospital',
            'mobile'                => 1754874782
        ]);

        Doctor::updateOrCreate([
            'name'                  => 'Dr.Shirin Fatema',
            'email'                 => 'shirin@gmail.com',
            'degrees'               => 'MBBS,MPCS,DGO,FCPS',
            'specialist'            => 'GYNAE & OBS',
            'consultant_of_college' => 'USTC Medical College & Hospital',
            'mobile'                => 1754874782
        ]);
    }
}
