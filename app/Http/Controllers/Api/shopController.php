<?php
namespace App\Http\Controllers\Api;
use App\Models\Rate;
use App\Models\Branch;
use App\Models\Comment;
use App\Models\Category;
use App\Models\BrancheRate;
use App\Models\ShopProduct;
use App\Http\Controllers\Controller;

class shopController extends Controller
{
    use ApiResponseTrait;


    public function getShopBrancheById($id)
    {
        try{
            $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($id);
            $branche['image'] = asset('assets/images/branches/'.$branche->image);
            if($branche->rate){
                $branche['rate'] = BrancheRate::where('branche_id', $id)->first()->rate;
            }else{
                $branche['rate'] = 0;
            }

            $categories = Category::where('department_id', 2)->select('id', 'name')->get();

            $bestSelles = ShopProduct::where('branche_id', $id)->orderby('sold_quantity', 'desc')->get();
            foreach($bestSelles as $bestSelle){
                $bestSelle['product_image'] = asset('assets/images/products/'.$bestSelle->product_image);
                $bestSelle['rate'] = Rate::where('shop_product_id', $bestSelle->id)->sum('rate');
            }

            $highRates = ShopProduct::where('branche_id', $id)->get();
            foreach($highRates as $highRate){
                $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
                $highRate['rate'] = Rate::where('shop_product_id', $highRate->id)->sum('rate');
            }

            $allProducts = ShopProduct::where('branche_id', $id)->get();
            foreach($allProducts as $product){
                $product['product_image'] = asset('assets/images/products/'.$product->product_image);
                $product['rate'] = Rate::where('shop_product_id', $highRate->id)->sum('rate');
            }

            if($branche->department_id == 2){
                return response()->json([
                    'status' => 200,
                    'massage' => 'Branche Returned Successfully',
                    'branche' => $branche,
                    'categories' => $categories,
                    'bestSelles' => $bestSelles,
                    'highRates' => $highRates,
                    'allProducts' => $allProducts,
                ]);
            }else{
                return response()->json([
                    'status' => 200,
                    'massage' => 'Branche Returned Failed Is Not Shop Store',
                ]);
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }




    public function getShopProductById($id)
    {
        $product = ShopProduct::select('id', 'product_image', 'name', 'description', 'price', 'size_id', 'color_id', 'branche_id')->find($id);
        $product['product_image'] = asset('assets/images/products/'.$product->product_image);

        $sizes = $product->sizes();
        $product['size_id'] = $sizes;

        $colors = $product->colors();
        $product['color_id'] = $colors;

        if($product['rate']){
            $product['rate'] = Rate::where('shop_product_id', $id)->first()->rate;
        }else{
            $product['rate'] = 0;
        }


        $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($product->branche_id);
        $branche['image'] = asset('assets/images/branches/'.$branche->image);
        if($branche->rate){
            $branche['rate'] = BrancheRate::where('branche_id', $branche->id)->first()->rate;
                // $branche['rate'] = BrancheRate::where('branche_id', $branche->id)->sum('rate');
        }else{
            $branche['rate'] = 0;
        }


        $comments = Comment::select('id', 'user_id', 'comment', 'rate')->where('shop_product_id', $id)->get();
        foreach ($comments as $comment) {
            $comment['user_id'] = $comment->user->name;
        }


        if($product){
            return response()->json([
                'status' => 200,
                'massage' => 'Shop Product Returned Successfully',
                'product' => $product,
                'branche' => $branche,
                'comments' => $comments,
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'massage' => "Shop Product Not Found",
            ]);
        }
    }




    public function getBrancheProductsOfCategory($branche_id, $cat_id)
    {
        $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location')->find($branche_id);
        $branche['image'] = asset('assets/images/branches/'.$branche->image);
        if($branche->rate){
            $branche['rate'] = BrancheRate::where('branche_id', $branche_id)->first()->rate;
        }else{
            $branche['rate'] = 0;
        }

        $categories = Category::where('department_id', 2)->select('id', 'name')->get();
        if($branche->department_id != 2){
            return response()->json([
                'status' => 200,
                'massage' => 'Branche Returned Failed Is Not Shop Store',
            ]);
        }

        $category = Category::find($cat_id);
        if($category->department_id != 2){
            return response()->json([
                'status' => 200,
                'massage' => 'Category Returned Failed Is Not Shop Store',
            ]);
        }


        $bestSelles = ShopProduct::where('branche_id', $branche_id)->where('category_id', $cat_id)->orderby('sold_quantity', 'desc')->get();
        foreach($bestSelles as $bestSelle){
            $bestSelle['product_image'] = asset('assets/images/products/'.$bestSelle->product_image);
            $bestSelle['rate'] = Rate::where('shop_product_id', $bestSelle->id)->sum('rate');
        }

        $highRates = ShopProduct::where('branche_id', $branche_id)->where('category_id', $cat_id)->get();
        foreach($highRates as $highRate){
            $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
            $highRate['rate'] = Rate::where('shop_product_id', $highRate->id)->sum('rate');
        }

        $allProducts = ShopProduct::where('branche_id', $branche_id)->where('category_id', $cat_id)->get();
        foreach($allProducts as $product){
            $product['product_image'] = asset('assets/images/products/'.$product->product_image);
            $product['rate'] = Rate::where('shop_product_id', $highRate->id)->sum('rate');
        }

        return response()->json([
            'status' => 200,
            'massage' => 'Shop Product Returned Successfully',
            'branche' => $branche,
            'categories' => $categories,
            'bestSelles' => $bestSelles,
            'highRates' => $highRates,
            'allProducts' => $allProducts,
        ]);
    }





    public function addOrRemoveShopProductLikes($id)
    {
        try{
        $product = ShopProduct::findOrFail($id);

        if($product->likes->where("user_id", auth()->user()->id)->count() == 0){
            $product->likes()->create([
                "user_id" => auth()->user()->id,
                'likesable_type' => ShopProduct::class,
                'likesable_id' => $product->id,
            ]);
        }else{
            $product->likes()->where("user_id", auth()->user()->id)->delete();
            return response()->json([
                'status' => 200,
                'massage' => 'Remove Like Successfully',
            ]);
        }
            $flag = true;
            return response()->json([
                'status' => 200,
                'massage' => 'Add Like Successfully',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 200,
                'massage' => 'Product Not Found',
            ]);
        }
    }
}
