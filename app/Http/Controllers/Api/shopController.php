<?php
namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use App\Models\Like;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Comment;
use App\Models\Category;
use App\Models\ShopOrder;
use App\Models\BrancheRate;
use App\Models\ProductRate;
use App\Models\ShopProduct;
use Illuminate\Http\Request;
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

        $similarProducts = ShopProduct::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
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

        if($product->likes->where("user_id", auth()->user()->id)->count() == 0 && $product->department_id == 2){
            $product->likes()->create([
                "user_id" => auth()->user()->id,
                'likesable_type' => ShopProduct::class,
                'likesable_id' => $product->id,
            ]);
        }else{
            $product->likes()->where('likesable_type', ShopProduct::class)->where("user_id", auth()->user()->id)
            ->delete();
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




    public function getProductsCart(Request $request, $branche_id)
    {
        $Order_Price = 0;
        $delivery_price = 0;
        $Order_Price_with_Coupon = 0;
        $currentDate = Carbon::now()->format('Y-m-d');
        $carts = ShopOrder::whereDate('created_at', $currentDate)->where('user_id', auth()->user()->id)->where('branche_id', $branche_id)->get();


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
            }else{
                foreach ($carts as $cart) {
                    $sizes = $cart->sizes();
                    $cart['size_id'] = $sizes;

                    $colors = $cart->colors();
                    $cart['color_id'] = $colors;

                    // $cart['shop_product_id'] = ShopProduct::where('id', $cart->shop_product_id)->get();
                    $Order_Price += $cart['total_price'];
                    $Coupon_Discount = $coupon->discount_percentage.'%';
                    $Order_Price_with_Coupon = $Order_Price - ($Order_Price * $coupon->discount_percentage /100) + $delivery_price;
                }
            }
        }else{
            foreach ($carts as $cart) {
                $sizes = $cart->sizes();
                $cart['size_id'] = $sizes;

                $colors = $cart->colors();
                $cart['color_id'] = $colors;

                // $cart['shop_product_id'] = ShopProduct::where('id', $cart->shop_product_id)->get();
                $Order_Price += $cart['total_price'] ;
                $Coupon_Discount = 'There is no Coupon';
                $Order_Price_with_Coupon = 'There is no discount';
            }
        }



        if($carts){
            return response()->json([
                'status' => 200,
                'message' => 'Cart Returned Successfully',
                'cart' => $carts,
                'delivery_price' => $delivery_price,
                'Order_Price' => $Order_Price,
                'Coupon Discount' => $Coupon_Discount,
                'Order_Price_with_Coupon' => $Order_Price_with_Coupon,
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Cart is Empty',
            ]);
        }
    }




    public function addProductToCart(Request $request, $id)
    {
        if(!ShopOrder::where('user_id', auth()->user()->id)->where('shop_product_id', $id)->exists())
        {
            $product = ShopProduct::findorfail($id);

            if($product->coupon_id){
                $coupon = Coupon::find($product->coupon_id);
                $firstPrice = $product->price * $request->products_count;
                $TotalPrice = $firstPrice - ($firstPrice * $coupon->discount_percentage / 100);
            }else{
                $TotalPrice = $product->price * $request->products_count;
            }

            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
            while(ShopProduct::where('random_id', $random_id )->exists()){
                $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
            }

            $product = ShopOrder::create([
                'random_id' => $random_id,
                'department_id' => 2,
                'user_id' => auth()->user()->id,
                'branche_id' => $product->branche_id,
                'shop_product_id' => $product->id,
                'offer_id' => $product->coupon_id,
                'products_count' => $request->products_count,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'total_price' => $TotalPrice,
                'order_status' => 'قيد التجهيز',
            ]);

            $product['shop_product_id'] = ShopProduct::where('id', $id)->get();

            $sizes = $product->sizes();
            $product['size_id'] = $sizes;

            $colors = $product->colors();
            $product['color_id'] = $colors;

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





    public function removeProductFromCart($id)
    {
        try{
            if(ShopOrder::where('user_id', auth()->user()->id)->where('shop_product_id', $id)->exists())
            {
                ShopOrder::where('user_id', auth()->user()->id)->where('shop_product_id', $id)->delete();
                return response()->json([
                    'status' => 200,
                    'message' => "Product Deleted From Cart Successfully",
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' => "Product Doesn't Exists In Cart",
                ]);
            }
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Fail Delete From Cart');
        }
    }
}
