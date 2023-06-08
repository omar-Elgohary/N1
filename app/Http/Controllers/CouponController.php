<?php
namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CouponController extends Controller
{
    public function create()
    {
        return view('admin.coupons.addCoupon');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'discount_coupon' => 'required',
            'discount_percentage' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'users_count' => 'required|numeric',
            'number_of_uses' => 'required|numeric',
        ]);
        
        $file_extention = $request->file("image")->getCLientOriginalExtension();
        $image = time(). "." .$file_extention;
        $request->file("image")->move(public_path('assets/images/offers/'), $image);
        

        Coupon::create([
            'image' => $image,
            'discount_coupon' => $request->discount_coupon,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'users_count' => $request->users_count,
            'number_of_uses' => $request->number_of_uses,
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

        session()->flash('Add', 'تم اضافة الكوبون بنجاح ');
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
        //     'number_of_uses' => 'required|numeric',
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
            'number_of_uses' => $request->number_of_uses,
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
        
        session()->flash('Add', 'تم تعديل الكوبون بنجاح ');
        return redirect()->route('alloffers');
    }
}
