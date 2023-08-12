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
            'branche_id' => 2,
            'department_id' => 1,
            'rate' => 2.8,
        ]);
    }
}
