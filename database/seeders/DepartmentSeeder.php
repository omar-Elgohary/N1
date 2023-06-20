<?php
namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{

    public function run()
    {
        Department::create([
            'name' => 'Restaurents',
        ]);

        Department::create([
            'name' => 'Shops',
        ]);

        Department::create([
            'name' => 'Entertainments',
        ]);
    }
}
