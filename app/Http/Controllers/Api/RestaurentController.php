<?php
namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\MealRate;
use App\Models\BrancheRate;
use Illuminate\Http\Request;
use App\Models\ReservationType;
use App\Models\RestaurentOrder;
use App\Models\TableReservation;
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



    public function getMealsCart(Request $request, $branche_id)
    {
        $Order_Price = 0;
        $delivery_price = 0;
        $Order_Price_with_Coupon = 0;
        $currentDate = Carbon::now()->format('Y-m-d');
        $carts = RestaurentOrder::whereDate('created_at', $currentDate)->where('user_id', auth()->user()->id)->where('branche_id', $branche_id)->get();


        $branche = Branch::find($branche_id);
        if($branche->delivery == 1){
            $delivery_price = $branche->delivery_price;
        }


        if($request->offer_id){
            $coupon = Coupon::find($request->offer_id);
            if($coupon->status == 'غير مفعل'){
                return response()->json([
                    'status' => 404,
                    'message' => 'Coupon Is Not Active',
                ]);
            }
            foreach ($carts as $cart) {
                $cart['restaurent_product_id'] = RestaurentProduct::where('id', $cart->restaurent_product_id)->get();
                $Order_Price += $cart['total_price'] + $delivery_price;
                $Coupon_Discount = $coupon->discount_percentage.'%';
                $Order_Price_with_Coupon = $Order_Price - ($Order_Price * $coupon->discount_percentage /100) + $delivery_price;
            }
        }else{
            foreach ($carts as $cart) {
                $cart['restaurent_product_id'] = RestaurentProduct::where('id', $cart->restaurent_product_id)->get();
                $Order_Price += $cart['total_price'] + $delivery_price;
                $Coupon_Discount = 'There is no Coupon';
                $Order_Price_with_Coupon = 'There is no discount';
            }
        }


        if($carts){
            return response()->json([
                'status' => 200,
                'message' => 'Cart Returned Successfully',
                'cart' => $carts,
                'Order_Price' => $Order_Price,
                'Coupon Discount' => $Coupon_Discount,
                'delivery_price' => $delivery_price,
                'Order_Price_with_Coupon' => $Order_Price_with_Coupon,
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

            if($meal->coupon_id){
                $coupon = Coupon::find($meal->coupon_id);
                $firstPrice = $meal->price * $request->products_count;
                $TotalPrice = $firstPrice - ($firstPrice * $coupon->discount_percentage / 100);
            }else{
                $TotalPrice = $meal->price * $request->products_count;
            }

            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
            while(RestaurentProduct::where('random_id', $random_id )->exists()){
                $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
            }

            $product = RestaurentOrder::create([
                'random_id' => $random_id,
                'user_id' => auth()->user()->id,
                'branche_id' => $meal->branche_id,
                'restaurent_product_id' => $meal->id,
                'offer_id' => $meal->coupon_id,
                'products_count' => $request->products_count,
                'order_status' => 'جديد',
                'total_price' => $TotalPrice,
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




    public function RestaurentReservations()
    {
        $reservations = TableReservation::where('user_id', auth()->user()->id)->get();

        foreach ($reservations as $reservation) {
            $reservation['branche_id'] = Branch::where('id', $reservation->branche_id)->get();
        }

        return response()->json([
            'status' => 200,
            'message' => 'Restaurent Reservations Returned Successfully',
            'reservations' => $reservations,
        ]);
    }




    public function table_reservation(Request $request, $branche_id)
    {
        $branche = Branch::find($branche_id);
        if($branche->department_id != 1){
            return response()->json([
                'status' => 200,
                'message' => 'Branche Returned Failed There Is Not Restaurent Store',
            ]);
        }

        $reservationType = ReservationType::find($request->reservations_type_id);
        if($reservationType->department_id != 1){
            return response()->json([
                'status' => 200,
                'message' => 'Reservation Type Not Found',
            ]);
        }else{
            $time = Carbon::parse($request->reservation_time);
            $reservation = TableReservation::create([
                'user_id' => auth()->user()->id,
                'branche_id' => $branche_id,
                'clients_count' => $request->clients_count,
                'reservations_type_id' => $request->reservations_type_id,
                'reservation_date' =>  date('Y-m-d H:i:s' , strtotime($request->reservation_date)),
                'reservation_time' => $time->format('H:i:s'),
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Table Reservation',
            'reservation' => $reservation,
        ]);
    }





    public function mealsOfCategory($cat_id)
    {
        $category = Category::find($cat_id);
        if($category->department_id != 1){
            return response()->json([
                'status' => 201,
                'message' => 'Category Not Found',
            ]);
        }
        $meals = RestaurentProduct::where('category_id', $cat_id)->get();
        foreach($meals as $meal){
            $meal['product_image'] = asset('assets/images/products/'.$meal->product_image);
            $meal['rate'] = MealRate::where('restaurent_product_id', $meal->id)->avg('rate');

            if($meal->coupon_id){
                $coupon = Coupon::where('id', $meal->coupon_id)->first();
                $meal['coupon_id'] = Coupon::where('id', $meal->coupon_id)->select('discount_percentage', 'status')->first();
                if($coupon->status == 'مفعل'){
                    $meal['price_after_discount'] = $meal->price  - ($meal->price * $coupon->discount_percentage)/ 100;
                }
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'All Meals Returned Successfully',
            'category' => $category,
            'meals' => $meals,
        ]);
    }
}
