<?php
namespace App\Repositories;
use App\Interfaces\CouponRepositoryInterface;
use App\Models\Coupon;

class CouponRepository implements CouponRepositoryInterface
{
    public function getAllCoupons()
    {
        return Coupon::all();
    }

}
