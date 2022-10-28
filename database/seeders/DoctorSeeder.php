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
            'designation'           => 'Consultant',
            'consultant_of_college' => 'USTC Medical College & Hospital',
            'mobile'                => '01754874782',
            'firstVisit'            => 1000,
            'nextVisit'             => 800,
            'reportOnly'            => 600
        ]);

        Doctor::updateOrCreate([
            'name'                  => 'Dr.Shirin Fatema',
            'email'                 => 'shirin@gmail.com',
            'degrees'               => 'MBBS,MPCS,DGO,FCPS',
            'specialist'            => 'GYNAE & OBS',
            'consultant_of_college' => 'USTC Medical College & Hospital',
            'designation'           => 'Professor',
            'mobile'                => '01754874782',
            'firstVisit'            => 800,
            'nextVisit'             => 600,
            'reportOnly'            => 400
        ]);
    }
}
