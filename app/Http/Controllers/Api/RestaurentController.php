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



    public function getBranchMealById($branche_id, $meal_id)
    {
        $branche = Branch::find($branche_id);
        if($branche->department_id == 1){
            dd($branche);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Branche Returned Failed Is Not Restaurent Store',
            ]);
        }
    }
}
