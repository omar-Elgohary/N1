<?php
namespace App\Http\Controllers\Api;
use App\Models\Branch;
use App\Models\Category;
use App\Models\BrancheRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RestaurentProduct;

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

        $meals = RestaurentProduct::where('category_id', $cat_id)->get();
        foreach($meals as $meal){
            $meal['product_image'] = asset('assets/images/products/'.$meal->product_image);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Shop Product Returned Successfully',
            'branche' => $branche,
            'categories' => $categories,
            'meals' => $meals,
        ]);
    }
}
