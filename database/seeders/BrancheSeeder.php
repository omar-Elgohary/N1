<?php
namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrancheSeeder extends Seeder
{
    public function run()
    {
        // Restaurents
        Branch::create([
            'random_id' => '#Df54fd',
            'department_id' => 1,
            'branche_title' => 'Kfc Branch',
            'branche_location' => 'mansoura - ahmed maher',
            'email' => 'kfc@mans.com',
            'phone' => '01236547854',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1687163715.PNG',
            'start_time' => '02:00',
            'end_time' => '02:00',
            'delivery' => '1',
        ]);

        Branch::create([
            'random_id' => '#H5G4D5',
            'department_id' => 1,
            'branche_title' => 'Mac Branch',
            'branche_location' => 'cairo - salah salem',
            'email' => 'mac@cairo.com',
            'phone' => '01278459651',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1687163715.PNG',
            'start_time' => '11:00',
            'end_time' => '12:00',
            'delivery' => '0',
        ]);

        // Shops
        Branch::create([
            'random_id' => '#J4U6F2',
            'department_id' => 2,
            'branche_title' => 'eltawheed w elnoor',
            'branche_location' => 'cairo - giza',
            'email' => 'eltawheed@giza.com',
            'phone' => '01236548514',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1687163715.PNG',
            'start_time' => '2:00',
            'end_time' => '2:00',
            'delivery' => '0',
        ]);

        Branch::create([
            'random_id' => '#S6R2V7',
            'department_id' => 2,
            'branche_title' => 'elkorbs',
            'branche_location' => 'alex',
            'email' => 'elkorbs@alex.com',
            'phone' => '01023652010',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1687163715.PNG',
            'start_time' => '1:00',
            'end_time' => '12:00',
            'delivery' => '0',
        ]);

        Branch::create([
            'random_id' => '#S6R2V7',
            'department_id' => 3,
            'branche_title' => 'سينما المعادي',
            'branche_location' => 'القاهرة',
            'email' => 'cinema@cairo.com',
            'phone' => '01279584658',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1687163715.PNG',
            'start_time' => '1:00',
            'end_time' => '02:00',
            'delivery' => '0',
        ]);

        Branch::create([
            'random_id' => '#S6R2V7',
            'department_id' => 3,
            'branche_title' => 'ملاهي الشيخ زايد',
            'branche_location' => 'التجمع',
            'email' => 'malahy@tagamo3.com',
            'phone' => '01125414530',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1687163715.PNG',
            'start_time' => '11:00',
            'end_time' => '12:00',
            'delivery' => '0',
        ]);
    }
}
