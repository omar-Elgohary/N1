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
            'name' => ['en' => 'KFC', 'ar' => 'كنتاكي'],
            'branche_location' => 'المنصورة - حي الجامعة',
            'latitude' => 31.03805434460121,
            'longitude' => 31.361082613686104,
            'email' => 'kfc@mans.com',
            'phone' => '01236547854',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1691851099.jpg',
            'start_time' => '02:00',
            'end_time' => '02:00',
            'delivery' => '1',
            'delivery_price' => 10,
        ]);

        Branch::create([
            'random_id' => '#H5G4D5',
            'department_id' => 1,
            'name' => ['en' => 'MAC', 'ar' => 'ماكدونلز'],
            'branche_location' => 'شربين - الدبوسي',
            'latitude' => 31.18328052229671,
            'longitude' => 31.50437235111971,
            'email' => 'mac@cairo.com',
            'phone' => '01278459651',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1691851099.jpg',
            'start_time' => '11:00',
            'end_time' => '12:00',
            'delivery' => '0',
        ]);


        // Shops
        Branch::create([
            'random_id' => '#J4U6F2',
            'department_id' => 2,
            'name' => ['en' => 'eltaw7ed w elnour', 'ar' => 'التوحيد والنور'],
            'branche_location' => 'الجيزة - حي أول',
            'latitude' => 30.016621134621392,
            'longitude' => 31.212086488065257,
            'email' => 'eltawheed@giza.com',
            'phone' => '01236548514',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1691851099.jpg',
            'start_time' => '2:00',
            'end_time' => '2:00',
            'delivery' => '1',
            'delivery_price' => 15,
        ]);

        Branch::create([
            'random_id' => '#S6R2V7',
            'department_id' => 2,
            'name' => ['en' => 'bety brand', 'ar' => 'بيتي براند'],
            'branche_location' => 'الاسكندرية - سيدي جابر',
            'latitude' => 31.219215711795407,
            'longitude' => 29.942017490056216,
            'email' => 'betey@alex.com',
            'phone' => '01023652010',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1691851099.jpg',
            'start_time' => '1:00',
            'end_time' => '12:00',
            'delivery' => '0',
        ]);


        // events
        Branch::create([
            'random_id' => '#S6R2V7',
            'department_id' => 3,
            'name' => ['en' => 'cinema', 'ar' => 'سينما'],
            'branche_location' => 'ميت غمر',
            'latitude' => 30.71584973202776,
            'longitude' => 31.257475713854607,
            'email' => 'cinema@cairo.com',
            'phone' => '01279584658',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1691851099.jpg',
            'start_time' => '1:00',
            'end_time' => '02:00',
            'delivery' => '1',
            'delivery_price' => 10,
        ]);

        Branch::create([
            'random_id' => '#S6R2V7',
            'department_id' => 3,
            'name' => ['en' => 'toreel malahy', 'ar' => 'ملاهي توريل'],
            'branche_location' => 'المنصورة توريل',
            'latitude' => 31.063227683064635,
            'longitude' => 31.40324682015666,
            'email' => 'malahy@tagamo3.com',
            'phone' => '01125414530',
            'password' => Hash::make('12345678'),
            'confirmed_password' => Hash::make('12345678'),
            'image' => '1691851099.jpg',
            'start_time' => '11:00',
            'end_time' => '12:00',
            'delivery' => '0',
        ]);
    }
}
