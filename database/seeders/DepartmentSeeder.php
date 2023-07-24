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
            'name' => ['en' => 'Restaurents', 'ar' => 'مطاعم'],
            'image' => 'fgj.jfif',
        ]);

        Department::create([
            'name' => ['en' => 'Shops', 'ar' => 'متجر منتجات'],
            'image' => 'vyugj.jfif',
        ]);

        Department::create([
            'name' => ['en' => 'Entertainments', 'ar' => 'ترفيه'],
            'image' => 'ghk.jfif',
        ]);
    }
}
