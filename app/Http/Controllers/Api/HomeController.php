<?php
namespace App\Http\Controllers\Api;
use App\Models\Rate;
use App\Models\User;
use App\Models\Event;
use App\Models\Department;
use App\Models\ShopProduct;
use Illuminate\Http\Request;
use App\Models\RestaurentProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Models\Branch;
use App\Models\BrancheRate;

class HomeController extends Controller
{
    use ApiResponseTrait;

    public function home()
    {
        $departments = Department::select('name')->get();
        $allShops = User::where('department_id', '!=', null)->select('commercial_registration_image', 'company_name')->get();

        foreach($allShops as $shop){
            $shop['commercial_registration_image'] = asset('assets/images/commercial/'.$shop->commercial_registration_image);
            $shop['department'] = Department::where('id', 2)->first()->name;
            $rates = Rate::where('user_id', auth()->user()->id)->sum('rate');
            $shop['rate'] = $rates / 5;
        }

        $restaurent = collect(RestaurentProduct::select('name', 'product_image','sold_quantity')->get()->toArray());
        $restaurent = $restaurent->merge(ShopProduct::select('name', 'product_image', 'sold_quantity')->get()->toArray());
        $restaurent = $restaurent->merge(Event::select('name', 'product_image', 'sold_quantity')->get()->toArray())->toArray();
        sort($restaurent);

        // $bestSelles = collect(RestaurentProduct::select('id', 'name', 'product_image','sold_quantity')->get());
        // $bestSelles = $bestSelles->merge(ShopProduct::select('id', 'name', 'product_image', 'sold_quantity')->get());
        // $bestSelles = $bestSelles->merge(Event::select('id', 'name', 'product_image', 'sold_quantity')->get());
        // $bestSelles = $bestSelles->sortByDesc('sold_quantity');

        // foreach ($bestSelles as $bestSelle) {
        //     $bestSelle['product_image'] = asset('assets/images/products/'.$bestSelle->product_image);
        //     $bestSelle['rate'] = Rate::where('department_id', $bestSelle->department_id)
        //         ->where('restaurent_product_id', $bestSelle->id)
        //         ->select('rate')->get();
        // }

        // $highRates = Rate::where('shop_product_id', '!=', null)->orderby('rate', 'desc')->select('rate', 'shop_product_id')->get();
        // foreach($highRates as $highRate){
        //     $highRate->shop_product['product_image'] = asset('assets/images/products/'.$highRate->shop_product->product_image);
        // }

        return $this->returnData(200, 'Reached Home Page Successfully', compact('departments', 'allShops', 'restaurent'));
    }




    public function restaurentProducts()
    {
        $departments = Department::select('id', 'name')->get();
        $restaurents = Branch::where('department_id', 1)->select('id', 'image', 'name')->get();

        foreach($restaurents as $restaurent){
            $restaurent['image'] = asset('assets/images/branches/'.$restaurent->image);
            $restaurent['rate'] = BrancheRate::where('branche_id', $restaurent->id)->sum('rate');
        }

        $highRates = RestaurentProduct::get();
        foreach($highRates as $highRate){
            $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
            $highRate['rate'] = Rate::where('shop_product_id', $highRate->id)->sum('rate');
        }

        $latitude = auth("sanctum")->user()->latitude;
        $longitude = auth("sanctum")->user()->longitude;

        $radius = 2500 / 100;

        $nearests = Branch::where("department_id", 1)->withinRadius($latitude, $longitude, $radius)->get();
        foreach($nearests as $nearest){
            $nearest['image'] = asset('assets/images/branches/'.$nearest->image);
            $nearest['rate'] = BrancheRate::where('branche_id', $nearest->id)->sum('rate');
        }
        return $this->returnData(200, 'Data Returned Successfully', compact('departments', 'restaurents', 'highRates', 'nearests'));
    }




    public function shopProducts()
    {
        $departments = Department::select('id', 'name')->get();
        $shops = Branch::where('department_id', 2)->select('id', 'image', 'name')->get();

        foreach($shops as $shop){
            $shop['image'] = asset('assets/images/branches/'.$shop->image);
            $shop['rate'] = BrancheRate::where('branche_id', $shop->id)->sum('rate');
        }

        $bestSelles = ShopProduct::orderby('sold_quantity', 'desc')->get();
        foreach($bestSelles as $bestSelle){
            $bestSelle['product_image'] = asset('assets/images/products/'.$bestSelle->product_image);
            $bestSelle['rate'] = Rate::where('shop_product_id', $bestSelle->id)->sum('rate');
        }

        $highRates = ShopProduct::get();
        foreach($highRates as $highRate){
            $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
            $highRate['rate'] = Rate::where('shop_product_id', $highRate->id)->sum('rate');
        }

        return $this->returnData(200, 'Data Returned Successfully', compact('departments', 'shops', 'bestSelles', 'highRates'));
    }





    public function eventProducts()
    {
        $departments = Department::select('name')->get();
        $events = User::where('department_id', 3)->select('commercial_registration_image', 'company_name')->get();

        foreach($events as $event){
            $event['commercial_registration_image'] = asset('assets/images/commercial/'.$event->commercial_registration_image);
            $rates = Rate::where('user_id', auth()->user()->id)->sum('rate');
            $event['rate'] = $rates / 5;
        }

        $newests = Event::orderby('created_at', 'desc')->get();
        foreach($newests as $newest){
            $newest['product_image'] = asset('assets/images/products/'.$newest->product_image);
            $newest['rate'] = Rate::where('shop_product_id', $newest->id)->sum('rate');
        }

        $highRates = Rate::where('event_product_id', '!=', null)->orderby('rate', 'desc')->select('rate', 'event_product_id')->get();
        foreach($highRates as $highRate){
            $highRate->event_product['product_image'] = asset('assets/images/products/'.$highRate->event_product->product_image);
        }

        $famoustes = Event::orderby('sold_quantity', 'desc')->get();
        foreach($famoustes as $famouste){
            $famouste['product_image'] = asset('assets/images/products/'.$famouste->product_image);
            $famouste['rate'] = Rate::where('shop_product_id', $famouste->id)->sum('rate');
        }

        return $this->returnData(200, 'Data Returned Successfully', compact('departments', 'events', 'newests', 'highRates', 'famoustes'));
    }




}
