<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    // $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,6));
    // while(Requests::where('random_id', $random_id )->exists()){
    //     $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,6));
    // }


    // $randomNumber = random_int(1000, 9999);
    // dd($randomNumber);
}
