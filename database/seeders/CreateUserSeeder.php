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
            'name' => 'Mhmd Ghareeb',
            'email' => 'mhmd@grareeb.com',
            'phone' => '1234577890',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'seller',
            'company_name' => 'Ghareeb Company',
            'activity_type' => 'متجر منتجات',
            'commercial_registration_number' => '47544125646',
            'commercial_registration_image' => 'image.jpg',
        ]);

        $user = User::create([
            'name' => 'sara Mhmd',
            'email' => 'sara@mhmd.com',
            'phone' => '1234167890',
            'country_code' => '+20',
            'password' => bcrypt('12345678'),
            'confirmed_password' => bcrypt('12345678'),
            'type' => 'user',
        ]);
    }
}
