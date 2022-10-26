<?php

namespace Database\Seeders;

use App\Models\BedGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BedGroup::updateOrCreate([
            'floor_id'      => 1,
            'name'          => 'General Ward',
            'description'   => 'The operating room (OR) is where both inpatient and outpatient surgeries are performed.'
        ]);

        BedGroup::updateOrCreate([
            'floor_id'      => 2,
            'name'          => 'VIP Ward',
            'description'   => 'The operating room (OR) is where both inpatient and outpatient surgeries are performed.'
        ]);

        BedGroup::updateOrCreate([
            'floor_id'      => 3,
            'name'          => 'Private Ward',
            'description'   => 'The operating room (OR) is where both inpatient and outpatient surgeries are performed.'
        ]);
    }
}
