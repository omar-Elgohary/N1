<?php
namespace App\Http\Controllers;
use App\Models\Extra;
use App\Models\Order;
use App\Models\Without;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\RestaurentProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RestaurantController extends Controller
{
    public function restaurantMenu()
    {
        return view('admin.dashboards.restaurants.menu');
    }


    public function createCategory(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'department_id' => auth()->user()->department_id,
        ]);

        session()->flash('addCategory');
        return redirect()->route('foodMenu');
    }



    public function foodMenu()
    {
        $products = RestaurentProduct::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.restaurants.FoodMenu', compact('products'));
    }



    public function createRestaurentProduct()
    {
        return view('admin.dashboards.restaurants.create');
    }



    public function storeRestaurentProduct(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'product_image' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'calories' => 'required|numeric',
            'extra_id' => 'bail|nullable',
            'without_id' => 'bail|nullable',
            'branche_id' => 'bail|nullable',
            'quantity' => 'required|numeric',
            'sold_quantity' => 'bail|nullable',
            'remaining_quantity' => 'bail|nullable',
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        while(RestaurentProduct::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("product_image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("product_image")->move(public_path('assets/images/meals/'), $image_name);

        $extra = implode(',', $request->extra_id) ;
        $without = implode(',', $request->without_id) ;
        $branche = implode(',', $request->branche_id) ;

        if($request->status == 'on')
        {
            RestaurentProduct::create([
                'random_id' => $random_id,
                'department_id' => auth()->user()->department_id,
                'product_image' => $image_name,
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'status' => 'متوفر',
                'calories' => $request->calories,
                'extra_id' => $extra,
                'without_id' => $without,
                'branche_id' => $branche,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->remaining_quantity - $request->sold_quantity,
            ]);
        }else{
            RestaurentProduct::create([
                'random_id' => $random_id,
                'department_id' => auth()->user()->department_id,
                'product_image' => $image_name,
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'status' => 'غير متوفر',
                'calories' => $request->calories,
                'extra_id' => $extra,
                'without_id' => $without,
                'branche_id' => $branche,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->remaining_quantity - $request->sold_quantity,
            ]);
        }

        session()->flash('addRestaurentProduct');
        return redirect()->route('foodMenu');
    }





    public function RestaurentProductDetails($id)
    {
        $product = RestaurentProduct::find($id);
        $extra   = explode(',', $product->extra_id);
        $extras = Extra::whereIn('id', $extra)->get();

        $without   = explode(',', $product->without_id);
        $withouts = Without::whereIn('id', $without)->get();
        return view('admin.dashboards.restaurants.productDetails', compact('product', 'extras', 'withouts'));
    }






    public function editRestaurentProduct(Request $request, $id)
    {
        $product = RestaurentProduct::find($id);
        return view('admin.dashboards.restaurants.edit', compact('product'));
    }




    public function updateRestaurentProduct(Request $request, $id)
    {
        $product = RestaurentProduct::find($id);

        if($request->hasFile('product_image'))
        {
            $oldImage = 'assets/images/meals/'.$product->image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }
            $file_extention = $request->file("product_image")->getCLientOriginalExtension();
            $newImage = time(). "." .$file_extention;
            $request->file("product_image")->move(public_path('assets/images/meals/'), $newImage);
            $product->product_image = $newImage;
        }

        $extra   = implode(',', $request->extra_id);
        $without = implode(',', $request->without_id);
        $branche = implode(',', $request->branche_id);

        if($request->status == 'off')
        {
            $product->update([
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'status' => 'غير متوفر',
                'calories' => $request->calories,
                'extra_id' => $extra,
                'without_id' => $without,
                'branche_id' => $branche,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->remaining_quantity - $request->sold_quantity,
            ]);
        }else{
            $product->update([
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'status' => 'متوفر',
                'calories' => $request->calories,
                'extra_id' => $extra,
                'without_id' => $without,
                'branche_id' => $branche,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->remaining_quantity - $request->sold_quantity,
            ]);
        }

        session()->flash('editRestaurentProduct');
        return redirect()->route('foodMenu');
    }





    public function DeactiviteRestaurentProduct($id)
    {
        $product = RestaurentProduct::find($id);
        $product->update([
            'status' => 'غير متوفر',
        ]);
        session()->flash('DeactiveRestaurentProduct');
        return back();
    }




    public function unDeactiviteRestaurentProduct($id)
    {
        $product = RestaurentProduct::find($id);
        $product->update([
            'status' => 'متوفر',
        ]);
        session()->flash('unDeactiveRestaurentProduct');
        return back();
    }





    public function deleteRestaurentProduct($id)
    {
        RestaurentProduct::find($id)->delete();
        session()->flash('deleteRestaurentProduct');
        return redirect()->route('foodMenu');
    }



    // Restaurant Purchases
    public function restaurantPurchases()
    {
        $purchases = Purchase::all();
        return view('admin.purchases.RestaurantPurchases.index', compact('purchases'));
    }


    public function restaurantPurchasesDetails($id)
    {
        $purchase = Purchase::find($id);
        return view('admin.purchases.RestaurantPurchases.details', compact('purchase'));
    }


    public function changePurchaseStatus($id)
    {
        $purchase = Purchase::find($id);
        $order = Order::where('id', $purchase->order_id)->first();

        if($purchase->order->order_status == 'جديد'){
            $order->update([
                'order_status' => 'قيد التجهيز'
            ]);
        }elseif($purchase->order->order_status == 'قيد التجهيز'){
            $order->update([
                'order_status' => 'تم الاستلام'
            ]);
        }
        return back();
    }
}
