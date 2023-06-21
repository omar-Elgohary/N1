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
        Branch::create([
            'random_id' => '#Df54fd',
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
    }
}
