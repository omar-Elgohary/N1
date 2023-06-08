<?php
namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Coupon;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers.allOffers', compact('offers'));
    }


    public function deleteOffer($id)
    {
        $offer = Offer::find($id);
        if($offer->coupon_id == Coupon::find($offer->coupon_id)->id){
            $offer->delete();
            $coupon = Coupon::find($offer->coupon_id)->delete();
            session()->flash('Delete', 'تم حذف الكوبون بنجاح ');
            return back();
        }else{
            $package = Package::find($offer->coupon_id);
            session()->flash('Delete', 'تم حذف الباكدج بنجاح ');
            return back();            
        }
    }
}
