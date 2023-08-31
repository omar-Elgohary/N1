<?php
namespace App\Http\Controllers\Api;
use App\Models\Event;
use App\Models\Branch;
use App\Models\MealRate;
use App\Models\EventRate;
use App\Models\Department;
use App\Models\EventOrder;
use App\Models\BrancheRate;
use App\Models\ProductRate;
use App\Models\ShopProduct;
use App\Models\ReservationType;
use App\Models\RestaurentOrder;
use App\Models\TableReservation;
use App\Models\RestaurentProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;

class HomeController extends Controller
{
    use ApiResponseTrait;

    public function home()
    {
        $departments = Department::select('id', 'name')->get();
        $allShops = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->get();

        foreach($allShops as $shop){
            $shop['image'] = asset('assets/images/branches/'.$shop->image);
            $shop['department_id'] = Department::where('id', $shop->department_id)->first()->name;
            $shop['rate'] = BrancheRate::where('branche_id', $shop->id)->avg('rate');
        }

        $restaurantProducts = RestaurentProduct::get();
        $shopProducts = ShopProduct::get();
        $events = Event::get();

        $mergedData = $restaurantProducts->concat($shopProducts)->concat($events);
        $bestSelles = $mergedData->sortByDesc('sold_quantity')->values()->all();

        foreach($bestSelles as $bestSelle){
            $bestSelle['product_image'] = asset('assets/images/products/'.$bestSelle->product_image);
            $bestSelle['rate'] = $bestSelle->rates()->avg('rate');

            if($bestSelle['rate']){
                $bestSelle['rate'] = $bestSelle->rate;
            }else{
                $bestSelle['rate'] = [];
            }
        }

        $restaurantProducts = RestaurentProduct::get();
        $shopProducts = ShopProduct::get();
        $events = Event::get();

        $mergedData = $restaurantProducts->concat($shopProducts)->concat($events);
        $highRates = $mergedData->sortByDesc('sold_quantity')->values()->all();

        foreach ($highRates as $highRate) {
            $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
            $highRate['rate'] = $highRate->rates()->avg('rate');

            if($highRate['rate']){
                $highRate['rate'] = $highRate->rate;
            }else{
                $highRate['rate'] = [];
            }
        }

        return $this->returnData(200, 'Reached Home Page Successfully', compact('departments', 'allShops', 'bestSelles', 'highRates'));
    }




    public function restaurentProducts()
    {
        $departments = Department::select('id', 'name')->get();

        $highRates = Branch::select('id', 'department_id', 'name', 'image')->where('department_id', 1)->get();
        foreach($highRates as $highRate){
            $highRate['image'] = asset('assets/images/branches/'.$highRate->image);
            $highRate['rate'] = BrancheRate::where('department_id', 1)->where('branche_id', $highRate->id)->avg('rate');
        }

        $latitude = auth("sanctum")->user()->latitude;
        $longitude = auth("sanctum")->user()->longitude;

        $radius = 2500 / 100;

        $nearests = Branch::where("department_id", 1)->withinRadius($latitude, $longitude, $radius)->get();
        foreach($nearests as $nearest){
            $nearest['department_id'] = 1;
            $nearest['image'] = asset('assets/images/branches/'.$nearest->image);
            $nearest['rate'] = BrancheRate::where('branche_id', $nearest->id)->sum('rate');
        }

        $mostOrders = RestaurentOrder::where('user_id', auth()->user()->id)
            ->groupBy('branche_id')->select('branche_id', DB::raw('count(*) as repeat_count'))
            ->orderByDesc('repeat_count')->get();

        foreach($mostOrders as $mostOrder){
            $mostOrder->branche['image'] = asset('assets/images/branches/'.$mostOrder->branche->image);
            $mostOrder->branche['rate'] = BrancheRate::where('branche_id', $mostOrder->branche->id)->sum('rate');
        }

        return $this->returnData(200, 'Data Returned Successfully', compact('departments', 'highRates', 'nearests', 'mostOrders'));
    }




    public function shopProducts()
    {
        $departments = Department::select('id', 'name')->get();
        $shops = Branch::where('department_id', 2)->select('id', 'image', 'name')->get();

        foreach($shops as $shop){
            $shop['image'] = asset('assets/images/branches/'.$shop->image);
            $shop['rate'] = BrancheRate::where('branche_id', $shop->id)->avg('rate');
        }

        $bestSelles = ShopProduct::orderby('sold_quantity', 'desc')->get();
        foreach($bestSelles as $bestSelle){
            $bestSelle['product_image'] = asset('assets/images/products/'.$bestSelle->product_image);
            $bestSelle['rate'] = ProductRate::where('shop_product_id', $bestSelle->id)->avg('rate');
        }

        $highRates = ShopProduct::get();
        foreach($highRates as $highRate){
            $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
            $highRate['rate'] = ProductRate::where('shop_product_id', $highRate->id)->avg('rate');
        }

        return $this->returnData(200, 'Data Returned Successfully', compact('departments', 'shops', 'bestSelles', 'highRates'));
    }





    public function eventProducts()
    {
        $departments = Department::select('id', 'name')->get();

        $latitude = auth("sanctum")->user()->latitude;
        $longitude = auth("sanctum")->user()->longitude;
        $radius = 40;

        $nearests = Branch::where('department_id', 3)->withinRadius($latitude, $longitude, $radius)->get();
        foreach($nearests as $nearest){
            $nearest['department_id'] = 3;
            $nearest['image'] = asset('assets/images/branches/'.$nearest->image);
            $nearest['rate'] = BrancheRate::where('branche_id', $nearest->id)->avg('rate');
        }

        $newests = Event::orderby('created_at', 'desc')->get();
        foreach($newests as $newest){
            $newest['product_image'] = asset('assets/images/products/'.$newest->product_image);
            $newest['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $newest->reservations_type_id)->get();
            $newest['rate'] = EventRate::where('event_id', $newest->id)->avg('rate');
        }

        $highRates = Event::get();
        foreach($highRates as $highRate){
            $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
            $highRate['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $highRate->reservations_type_id)->get();
            $highRate['rate'] = EventRate::where('event_id', $highRate->id)->avg('rate');
        }

        $famoustes = Event::orderby('sold_quantity', 'desc')->get();
        foreach($famoustes as $famouste){
            $famouste['product_image'] = asset('assets/images/products/'.$famouste->product_image);
            $famouste['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $famouste->reservations_type_id)->get();
            $famouste['rate'] = EventRate::where('event_id', $famouste->id)->avg('rate');
        }

        return $this->returnData(200, 'Data Returned Successfully', compact('departments', 'nearests', 'newests', 'highRates', 'famoustes'));
    }






    public function allBranches()
    {
        $branches = Branch::get();
        foreach($branches as $branche){
            $branche['image'] = asset('assets/images/branches/'.$branche->image);
            $branche['rate'] = BrancheRate::where('branche_id', $branche->id)->avg('rate');
        }

        return response()->json([
            'status' => 200,
            'message' => 'All Branches Returned Successfully',
            'branches' => $branches,
        ]);
    }






    public function allReservations()
    {
        $restaurantReservations = TableReservation::where('user_id', auth()->user()->id)->get();
        $eventReservations = EventOrder::where('user_id', auth()->user()->id)->get();

        $mergedData = $restaurantReservations->concat($eventReservations);
        $allReservations = $mergedData->all();

        foreach($allReservations as $allReservation){
            $allReservation['branche_id'] = Branch::where('id', $allReservation->branche_id)->get();
        }

        return response()->json([
            'status' => 200,
            'message' => 'All Reservations Successfully',
            'allReservations' => $allReservations,
        ]);
    }




    public function allInvoices()
    {
        $restaurantInvoices = TableReservation::where('user_id', auth()->user()->id)->where('reservation_status', 'مكتمل')->get();
        $eventInvoices = EventOrder::where('user_id', auth()->user()->id)->where('order_status', 'تم تأكيد الحضور')->get();

        $mergedData = $restaurantInvoices->concat($eventInvoices);
        $allInvoices = $mergedData->all();

        foreach($allInvoices as $allInvoice){
            $allInvoice['branche_id'] = Branch::where('id', $allInvoice->branche_id)->get();
        }

        return response()->json([
            'status' => 200,
            'message' => 'All Invoices Successfully',
            'allInvoices' => $allInvoices,
        ]);
    }
}
