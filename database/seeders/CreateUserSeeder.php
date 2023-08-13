<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@org.com',
            'phone' => '1234657890',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'admin',
        ]);

        $user = User::create([
            'name' => 'Osama Gamal',
            'email' => 'osama@ghj.com',
            'phone' => '1245789124',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'user',
            'latitude' => 31.030737029693444,
            'longitude' => 31.362085322087935,
        ]);

        $user = User::create([
            'name' => 'Ahmed Mahmoud',
            'email' => 'ahmed@dgfc.com',
            'phone' => '1026895475',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'user',
            'latitude' => 31.030737029693444,
            'longitude' => 31.362085322087935,
        ]);

        $user = User::create([
            'name' => 'Ahmed KFC',
            'email' => 'Ahmed@KFC.com',
            'phone' => '1234577890',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'seller',
            'company_name' => 'Ahmed KFC Company',
            'department_id' => 1,
            'commercial_registration_number' => '47544125646',
            'commercial_registration_image' => '1.jpg',
        ]);

        $user = User::create([
            'name' => 'Sara Mhmd Shop',
            'email' => 'Sara@Shop.com',
            'phone' => '1234167890',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'seller',
            'company_name' => 'Sara Shop Company',
            'department_id' => 2,
            'commercial_registration_number' => '89545648484',
            'commercial_registration_image' => '2.jpg',
        ]);

        $user = User::create([
            'name' => 'Ghada Entertainments',
            'email' => 'Ghada@Entertainments.com',
            'phone' => '1234167890',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'seller',
            'company_name' => 'Ghada Entertainments Company',
            'department_id' => 3,
            'commercial_registration_number' => '453745364753',
            'commercial_registration_image' => '3.jpg',
        ]);
    }
}
