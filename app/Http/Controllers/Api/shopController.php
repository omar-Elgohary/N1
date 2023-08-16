<?php
namespace App\Http\Controllers\Api;
use App\Models\Like;
use App\Models\Branch;
use App\Models\Comment;
use App\Models\Category;
use App\Models\BrancheRate;
use App\Models\ShopProduct;
use App\Http\Controllers\Controller;
use App\Models\ProductRate;

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
                $bestSelle['rate'] = ProductRate::where('shop_product_id', $bestSelle->id)->avg('rate');
            }

            $highRates = ShopProduct::where('branche_id', $id)->get();
            foreach($highRates as $highRate){
                $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
                $highRate['rate'] = ProductRate::where('shop_product_id', $highRate->id)->avg('rate');
            }

            $allProducts = ShopProduct::where('branche_id', $id)->get();
            foreach($allProducts as $product){
                $product['product_image'] = asset('assets/images/products/'.$product->product_image);
                $product['rate'] = ProductRate::where('shop_product_id', $highRate->id)->avg('rate');
            }

            if($branche->department_id == 2){
                return response()->json([
                    'status' => 200,
                    'message' => 'Branche Returned Successfully',
                    'branche' => $branche,
                    'categories' => $categories,
                    'bestSelles' => $bestSelles,
                    'highRates' => $highRates,
                    'allProducts' => $allProducts,
                ]);
            }else{
                return response()->json([
                    'status' => 200,
                    'message' => 'Branche Returned Failed Is Not Shop Store',
                ]);
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }




    public function getShopProductById($id)
    {
        $product = ShopProduct::select('id', 'category_id', 'product_image', 'name', 'description', 'price', 'size_id', 'color_id', 'branche_id')->find($id);
        $product['product_image'] = asset('assets/images/products/'.$product->product_image);

        $sizes = $product->sizes();
        $product['size_id'] = $sizes;

        $colors = $product->colors();
        $product['color_id'] = $colors;

        if($product['rate']){
            $product['rate'] = ProductRate::where('shop_product_id', $id)->first()->rate;
        }else{
            $product['rate'] = 0;
        }

        $like = Like::where('likesable_id', $id)->where('user_id', auth()->user()->id)->first();
        if($like){
            $isLiked = true;
        }else{
            $isLiked = false;
        }

        $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($product->branche_id);
        $branche['image'] = asset('assets/images/branches/'.$branche->image);
        if($branche->rate){
            // $branche['rate'] = BrancheRate::where('branche_id', $branche->id)->first()->rate;
                $branche['rate'] = BrancheRate::where('branche_id', $branche->id)->avg('rate');
        }else{
            $branche['rate'] = 0;
        }


        $comments = Comment::select('id', 'user_id', 'comment', 'rate')->where('shop_product_id', $id)->get();
        foreach ($comments as $comment) {
            $comment['user_id'] = $comment->user->name;
        }

        $similarProducts = ShopProduct::where('category_id', $product->category_id)->get();
        foreach ($similarProducts as $similarProduct) {
            $similarProduct['product_image'] = asset('assets/images/products/'.$similarProduct->product_image);

            $sizes = $similarProduct->sizes();
            $similarProduct['size_id'] = $sizes;

            $colors = $similarProduct->colors();
            $similarProduct['color_id'] = $colors;
        }

        if($product){
            return response()->json([
                'status' => 200,
                'message' => 'Shop Product Returned Successfully',
                'isLiked' => $isLiked,
                'product' => $product,
                'branche' => $branche,
                'comments' => $comments,
                'similarProducts' => $similarProducts,
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => "Shop Product Not Found",
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
                'message' => 'Branche Returned Failed Is Not Shop Store',
            ]);
        }

        $category = Category::find($cat_id);
        if($category->department_id != 2){
            return response()->json([
                'status' => 200,
                'message' => 'Category Returned Failed Is Not Shop Store',
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
            'message' => 'Shop Product Returned Successfully',
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
                'message' => 'Remove Like Successfully',
            ]);
        }
            $flag = true;
            return response()->json([
                'status' => 200,
                'message' => 'Add Like Successfully',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 200,
                'message' => 'Product Not Found',
            ]);
        }
    }
}
