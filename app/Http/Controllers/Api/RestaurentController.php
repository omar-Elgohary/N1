<?php
namespace App\Http\Controllers\Api;
use App\Models\Cart;
use App\Models\Branch;
use App\Models\Category;
use App\Models\BrancheRate;
use Illuminate\Http\Request;
use App\Models\RestaurentProduct;
use App\Http\Controllers\Controller;
use App\Models\RestaurentOrder;
use App\Models\ShopProduct;

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
        $cart = Cart::where('cartsable_type', RestaurentProduct::class)->where('user_id', auth()->user()->id)->get();

        if($cart){
            return response()->json([
                'status' => 200,
                'message' => 'Cart Returned Successfully',
                'cart' => $cart,
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Cart is Empty',
            ]);
        }
    }




    public function addMealToCart($id)
    {
        if(!Cart::where('cartsable_type' , RestaurentProduct::class)->where('user_id', auth()->user()->id)->where('cartsable_id', $id)->exists())
        {
            $meal = RestaurentOrder::findorfail($id);
            $product = Cart::create([
                'user_id' => auth()->user()->id,
                'price' => $meal->total_price,
                'cartsable_type' => RestaurentProduct::class,
                'cartsable_id' => $id,
            ]);
            return $this->returnData(200, 'Meal Add to Cart Successfully', $product);
        }else{
            return $this->returnData(201, 'Meal Already On Cart');
        }
    }





    public function removeMealFromCart($id)
    {
        try{
            if(RestaurentProduct::find($id)){
                cart::where('cartsable_type', RestaurentProduct::class)->where('user_id', auth()->user()->id)->where('cartsable_id', $id)->delete();
                return $this->returnData(200, 'Meal Deleted From Cart Successfully');
            }else{
            return $this->returnError(400, "Meal Doesn't Exists");
            }
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Fail Delete From Cart');
        }
    }
}
