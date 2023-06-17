<?php
namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Coupon;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CouponController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'discount_coupon' => 'required',
            'discount_percentage' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'users_count' => 'required|numeric',
            'how_many_times_user_use_this_coupon' => 'required|numeric',
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,6));
        while(Coupon::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("image")->move(public_path('assets/images/offers/'), $image_name);

        Coupon::create([
            'random_id' => $random_id,
            'image' => $image_name,
            'discount_coupon' => $request->discount_coupon,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'users_count' => $request->users_count,
            'how_many_times_user_use_this_coupon' => $request->how_many_times_user_use_this_coupon,
            'status' => 'مفعل',
        ]);

        $coupon_id = Coupon::latest()->first()->id;
        Offer::create([
            'offer_type' => 'coupon',
            'status' => 'مفعل',
            'users_count' => $request->users_count,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'coupon_id' => $coupon_id,
            'package_id' => null,
        ]);

        session()->flash('addCoupon');
        return redirect()->route('alloffers');
    }



    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.editCoupon', compact('coupon'));
    }



    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'image' => 'required',
        //     'discount_coupon' => 'required',
        //     'discount_percentage' => 'required',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date',
        //     'users_count' => 'required|numeric',
        //     'how_many_times_user_use_this_coupon' => 'required|numeric',
        // ]);

        $coupon = Coupon::find($id);

        if($request->hasFile('image'))
        {
            $oldImage = 'public/assets/images/offers/'.$coupon->image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }
            $file_extention = $request->file("image")->getCLientOriginalExtension();
            $image = time(). "." .$file_extention;
            $request->file("image")->move(public_path('assets/images/offers/'), $image);
            $coupon->image = $image;
        }

        $coupon->update([
            // 'image' => $image,
            'discount_coupon' => $request->discount_coupon,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'users_count' => $request->users_count,
            'how_many_times_user_use_this_coupon' => $request->how_many_times_user_use_this_coupon,
        ]);

        $offer = Offer::where('coupon_id', $id)->first();
        $offer->update([
            'offer_type' => 'coupon',
            'status' => 'مفعل',
            'users_count' => $request->users_count,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'coupon_id' => $id,
            'package_id' => null,
        ]);

        session()->flash('editCoupon');
        return redirect()->route('alloffers');
    }






    public function couponDetails(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.couponDetails', compact('coupon'));
    }






    public function deactivationCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->update([
            'status' => 'غير مفعل',
        ]);

        $offer = Offer::where('coupon_id', $id)->first();
        $offer->update([
            'status' => 'غير مفعل',
        ]);

        session()->flash('deactivationCoupon');
        return back();
    }




    // public function delete($id)
    // {
    //     // $offer = Offer::find($id)->delete();
    //     $offer = Offer::find($id);
    //     if($offer->coupon_id){
    //         dd('coupon');
    //         // $coupon = Coupon::find($offer->coupon_id);
    //         // $coupon->delete();
    //     }else{
    //         dd('package');
    //         // $package = Package::find($offer->package_id);
    //         // $package->delete();
    //     }
    //     session()->flash('deleteOffer');
    //     return redirect()->route('alloffers');
    // }
}
