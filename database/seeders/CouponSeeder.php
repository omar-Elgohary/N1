<?php
namespace Database\Seeders;
use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponSeeder extends Seeder
{
    public function run()
    {
        Coupon::create([
            'random_id' => '#FA64B7',
            'department_id' => 1,
            'image' => '1686825194.jfif',
            'discount_coupon' => 'free',
            'discount_percentage' => 10,
            'start_date' => '2023-06-15',
            'end_date' => '2023-06-16',
            'users_count' => '6',
            'how_many_times_user_use_this_coupon' => '1',
            'status' => 'مفعل',
        ]);

        Coupon::create([
            'random_id' => '#DFG452',
            'department_id' => 2,
            'image' => '1686825194.jfif',
            'discount_coupon' => 'disc',
            'discount_percentage' => 15,
            'start_date' => '2023-06-18',
            'end_date' => '2023-06-22',
            'users_count' => '10',
            'how_many_times_user_use_this_coupon' => '1',
            'status' => 'مفعل',
        ]);

        Coupon::create([
            'random_id' => '#FDH4K7',
            'department_id' => 3,
            'image' => '1686825194.jfif',
            'discount_coupon' => 'masr',
            'discount_percentage' => 25,
            'start_date' => '2023-06-20',
            'end_date' => '2023-06-21',
            'users_count' => '15',
            'how_many_times_user_use_this_coupon' => '2',
            'status' => 'غير مفعل',
        ]);

        Coupon::create([
            'random_id' => '#S7FH74',
            'department_id' => 1,
            'image' => '1686825194.jfif',
            'discount_coupon' => 'paris',
            'discount_percentage' => 30,
            'start_date' => '2023-06-25',
            'end_date' => '2023-06-27',
            'users_count' => '20',
            'how_many_times_user_use_this_coupon' => '1',
            'status' => 'غير مفعل',
        ]);
    }
}
