<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::updateOrCreate([
            'medicinegroup_id'  => 2,
            'name'              => 'Napa',
            'mg'                => 120
        ]);

        Medicine::updateOrCreate([
            'medicinegroup_id'  => 2,
            'name'              => 'Fast',
            'mg'                => 500
        ]);

        Medicine::updateOrCreate([
            'medicinegroup_id'  => 1,
            'name'              => 'Fexo',
            'mg'                => 120
        ]);

        Medicine::updateOrCreate([
            'medicinegroup_id'  => 1,
            'name'              => 'Flux',
            'mg'                => 500
        ]);
    }
}
