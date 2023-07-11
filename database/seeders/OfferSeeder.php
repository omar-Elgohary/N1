<?php
namespace Database\Seeders;
use App\Models\Offer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfferSeeder extends Seeder
{
    public function run()
    {
        // Coupons
        $offer = Offer::create([
            'offer_type' => 'coupon',
            'users_count' => '6',
            'status' => 'مفعل',
            'start_date' => '2023-06-15',
            'end_date' => '2023-06-16',
            'coupon_id' => '1',
            'department_id' => 1,
        ]);

        $offer = Offer::create([
            'offer_type' => 'coupon',
            'users_count' => '10',
            'status' => 'مفعل',
            'start_date' => '2023-06-18',
            'end_date' => '2023-06-22',
            'coupon_id' => '2',
            'department_id' => 2,
        ]);

        $offer = Offer::create([
            'offer_type' => 'coupon',
            'users_count' => '15',
            'status' => 'غير مفعل',
            'start_date' => '2023-06-20',
            'end_date' => '2023-06-21',
            'coupon_id' => '3',
            'department_id' => 3,
        ]);




        $offer = Offer::create([
            'offer_type' => 'package',
            'users_count' => '40',
            'status' => 'مفعل',
            'start_date' => '2023-06-16',
            'end_date' => '2023-06-19',
            'package_id' => '1',
            'department_id' => 1,
        ]);

        $offer = Offer::create([
            'offer_type' => 'package',
            'users_count' => '20',
            'status' => 'مفعل',
            'start_date' => '2023-06-19',
            'end_date' => '2023-06-22',
            'package_id' => '2',
            'department_id' => 1,
        ]);

        $offer = Offer::create([
            'offer_type' => 'coupon',
            'users_count' => '20',
            'status' => 'غير مفعل',
            'start_date' => '2023-06-25',
            'end_date' => '2023-06-27',
            'coupon_id' => '4',
            'department_id' => 1,
        ]);

        $offer = Offer::create([
            'offer_type' => 'package',
            'users_count' => '9',
            'status' => 'غير مفعل',
            'start_date' => '2023-06-22',
            'end_date' => '2023-06-24',
            'package_id' => '3',
            'department_id' => 1,
        ]);

        $offer = Offer::create([
            'offer_type' => 'package',
            'users_count' => '22',
            'status' => 'غير مفعل',
            'start_date' => '2023-06-23',
            'end_date' => '2023-06-26',
            'package_id' => '4',
            'department_id' => 1,
        ]);
    }
}
