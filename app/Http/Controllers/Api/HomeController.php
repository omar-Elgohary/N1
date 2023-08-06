<?php
namespace App\Http\Controllers\Api;
use App\Models\Rate;
use App\Models\User;
use App\Models\Event;
use App\Models\Department;
use App\Models\ShopProduct;
use Illuminate\Http\Request;
use App\Models\RestaurentProduct;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;

class HomeController extends Controller
{
    use ApiResponseTrait;

    // public function home()
    // {
    //     try {
    //         $departments = Department::select('name')->get();
    //         $mostSelling =

    //         return $this->returnData(200, 'Reached Home Page Successfully', compact('departments'));
    //     } catch (\Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }




    public function restaurentProducts()
    {
        try {
            $restaurents = User::where('department_id', 1)->get();
            foreach ($restaurents as $restaurent) {
                $rates = Rate::where('user_id', auth()->user()->id)->sum('rate');
                $restaurent['rate'] = $rates / 5;
            }

            return response()->json([
                'status' => 200,
                'message' => 'Data Returned Successfully',
                'data' => $restaurents,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }




    public function shopProducts()
    {
        $shops = User::where('department_id', 2)->get();
        foreach ($shops as $shop) {
            $rates = Rate::where('user_id', auth()->user()->id)->sum('rate');
            $shop['rate'] = $rates / 5;
        }

        $shops['bestSelles'] = ShopProduct::orderby('sold_quantity', 'desc')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Data Returned Successfully',
            'data' => $shops,
        ]);
    }




    public function EventProducts()
    {
        $products = Event::get();
    }




}
