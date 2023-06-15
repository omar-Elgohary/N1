<?php
namespace Database\Seeders;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $package = Package::create([
            'random_id' => '#DFSG48',
            'image' => '1686825194.jfif',
            'first_meal' => 'meat',
            'second_meal' => 'fried',
            'start_date' => '2023-06-16',
            'end_date' => '2023-06-19',
            'price' => '300',
            'users_count' => '40',
            'how_many_times_user_use_this_coupon' => '1',
            'status' => 'مفعل',
        ]);

        $package = Package::create([
            'random_id' => '#DSG564',
            'image' => '1686825194.jfif',
            'first_meal' => 'chicken',
            'second_meal' => 'koshary',
            'start_date' => '2023-06-19',
            'end_date' => '2023-06-22',
            'price' => '450',
            'users_count' => '20',
            'how_many_times_user_use_this_coupon' => '2',
            'status' => 'مفعل',
        ]);

        $package = Package::create([
            'random_id' => '#SDG647',
            'image' => '1686825194.jfif',
            'first_meal' => 'tamia',
            'second_meal' => 'fool',
            'start_date' => '2023-06-22',
            'end_date' => '2023-06-24',
            'price' => '70',
            'users_count' => '9',
            'how_many_times_user_use_this_coupon' => '1',
            'status' => 'غير مفعل',
        ]);

        $package = Package::create([
            'random_id' => '#FDSG12',
            'image' => '1686825194.jfif',
            'first_meal' => 'shawema',
            'second_meal' => 'pizza',
            'start_date' => '2023-06-23',
            'end_date' => '2023-06-26',
            'price' => '520',
            'users_count' => '22',
            'how_many_times_user_use_this_coupon' => '2',
            'status' => 'غير مفعل',
        ]);
    }
}
