<?php
namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\BrancheRate;
use Illuminate\Http\Request;
use App\Models\RestaurentOrder;
use App\Models\RestaurentProduct;
use App\Http\Controllers\Controller;

class RestaurentController extends Controller
{
    use ApiResponseTrait;

    public function getRestaurentById($id)
    {
        try{
            $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($id);
            $branche['image'] = asset('assets/images/branches/'.$branche->image);
            if($branche->rate){
                $branche['rate'] = BrancheRate::where('branche_id', $id)->first()->rate;
            }else{
                $branche['rate'] = 0;
            }

            $categories = Category::where('department_id', 1)->select('id', 'name')->get();

            $meals = RestaurentProduct::where('branche_id', $branche->id)->get();
            foreach($meals as $meal){
                $meal['product_image'] = asset('assets/images/products/'.$meal->product_image);
                $meal['extra_id'] = $meal->extras();
                $meal['without_id'] = $meal->withouts();
            }


            if($branche->department_id == 1){
                return response()->json([
                    'status' => 200,
                    'message' => 'Branche Returned Successfully',
                    'branche' => $branche,
                    'categories' => $categories,
                    'meals' => $meals,
                ]);
            }else{
                return response()->json([
                    'status' => 200,
                    'message' => 'Branche Returned Failed Is Not Restaurent Store',
                ]);
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }



    public function getRestaurentMealById($branche_id, $meal_id)
    {
        $branche = Branch::find($branche_id);
        $meal = RestaurentProduct::where('branche_id', $branche_id)->find($meal_id);

        if(!$branche->department_id == 1){
            return response()->json([
                'status' => 200,
                'message' => 'Branche Returned Failed There Is Not Restaurent Store',
            ]);
        }else{
            if($meal){
                $meal['product_image'] = asset('assets/images/products/'.$meal->product_image);
                $meal['extra_id'] = $meal->extras();
                $meal['without_id'] = $meal->withouts();
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Meal Not Found',
                ]);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Branche Returned Successfully',
                'meal' => $meal,
            ]);
        }
    }



    public function getRestaurentMealsOfCategory($branche_id, $cat_id)
    {
        $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($branche_id);
        if($branche->department_id != 1){
            return response()->json([
                'status' => 200,
                'message' => 'Branche Returned Failed There Is Not Restaurent Store',
            ]);
        }

        $branche['image'] = asset('assets/images/branches/'.$branche->image);
        if($branche->rate){
            $branche['rate'] = BrancheRate::where('branche_id', $branche_id)->first()->rate;
        }else{
            $branche['rate'] = 0;
        }

        $categories = Category::where('department_id', 1)->select('id', 'name')->get();
        $category = Category::find($cat_id);
        if($category->department_id != 1){
            return response()->json([
                'status' => 200,
                'message' => 'Category Not Found',
            ]);
        }


        $meals = RestaurentProduct::where('branche_id', $branche_id)->where('category_id', $cat_id)->get();
        foreach($meals as $meal){
            $meal['product_image'] = asset('assets/images/products/'.$meal->product_image);
            $meal['extra_id'] = $meal->extras();
            $meal['without_id'] = $meal->withouts();
        }

        if($meals){
            return response()->json([
                'status' => 200,
                'message' => 'Shop Product Returned Successfully',
                'branche' => $branche,
                'categories' => $categories,
                'meals' => $meals,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'There Is No Meals',
            ]);
        }
    }



    public function getMealsCart()
    {
        $Order_Price = 0;
        $currentDate = Carbon::now()->format('Y-m-d');
        $carts = RestaurentOrder::whereDate('created_at', $currentDate)->where('user_id', auth()->user()->id)->get();

        foreach ($carts as $cart) {
            $cart['restaurent_product_id'] = RestaurentProduct::where('id', $cart->restaurent_product_id)->get();
            $Order_Price += $cart['total_price'];
        }


        if($carts){
            return response()->json([
                'status' => 200,
                'message' => 'Cart Returned Successfully',
                'cart' => $carts,
                'Order_Price' => $Order_Price,
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Cart is Empty',
            ]);
        }
    }




    public function addMealToCart(Request $request, $id)
    {
        if(!RestaurentOrder::where('user_id', auth()->user()->id)->where('restaurent_product_id', $id)->exists())
        {
            $meal = RestaurentProduct::findorfail($id);

            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
            while(RestaurentProduct::where('random_id', $random_id )->exists()){
                $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
            }

            $product = RestaurentOrder::create([
                'random_id' => $random_id,
                'user_id' => auth()->user()->id,
                'branche_id' => $meal->branche_id,
                'restaurent_product_id' => $meal->id,
                'products_count' => $request->products_count,
                'order_status' => 'جديد',
                'total_price' => $meal->price * $request->products_count,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Meal Add to Cart Successfully',
                'cart' => $product,
            ]);
        }else{
            return response()->json([
                'status' => 201,
                'message' => 'Meal Already On Cart',
            ]);
        }
    }





    public function removeMealFromCart($id)
    {
        try{
            if(RestaurentOrder::where('user_id', auth()->user()->id)->where('restaurent_product_id', $id)->exists())
            {
                RestaurentOrder::where('user_id', auth()->user()->id)->where('restaurent_product_id', $id)->delete();
                return response()->json([
                    'status' => 200,
                    'message' => "Meal Deleted From Cart Successfully",
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' => "Meal Doesn't Exists In Cart",
                ]);
            }
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Fail Delete From Cart');
        }
    }
}
