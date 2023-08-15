<?php
namespace Database\Seeders;

use App\Models\BrancheRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrancheRateSeeder extends Seeder
{
    public function run()
    {
        BrancheRate::create([
            'branche_id' => 1,
            'department_id' => 1,
            'rate' => 1.5,
        ]);

        BrancheRate::create([
            'branche_id' => 1,
            'department_id' => 1,
            'rate' => 4,
        ]);

        BrancheRate::create([
            'branche_id' => 2,
            'department_id' => 1,
            'rate' => 2.3,
        ]);


        // shop
        BrancheRate::create([
            'branche_id' => 3,
            'department_id' => 2,
            'rate' => 3,
        ]);

        BrancheRate::create([
            'branche_id' => 3,
            'department_id' => 2,
            'rate' => 1.5,
        ]);

        BrancheRate::create([
            'branche_id' => 4,
            'department_id' => 1,
            'rate' => 2.8,
        ]);


        // event
        BrancheRate::create([
            'branche_id' => 5,
            'department_id' => 3,
            'rate' => 3.6,
        ]);

        BrancheRate::create([
            'branche_id' => 6,
            'department_id' => 3,
            'rate' => 3.1,
        ]);

        BrancheRate::create([
            'branche_id' => 6,
            'department_id' => 3,
            'rate' => 1.4,
        ]);
    }
}
