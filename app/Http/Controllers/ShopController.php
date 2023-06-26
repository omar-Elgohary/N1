<?php
namespace App\Http\Controllers;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\Category;
use App\Models\ShopProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ShopController extends Controller
{
    public function shopMenu()
    {
        return view('admin.dashboards.shops.menu');
    }




    public function products()
    {
        $products = ShopProduct::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.shops.products', compact('products'));
    }




    public function createShopCategory(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'department_id' => auth()->user()->department_id,
        ]);

        session()->flash('addCategory');
        return redirect()->route('products');
    }




    public function createShopProduct()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.dashboards.shops.create', compact('colors', 'sizes'));
    }



    public function storeShopProduct(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'product_image' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'size_id' => 'required',
            'color_id' => 'required',
            'branche_id' => 'bail|nullable',
            'quantity' => 'required|numeric',
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        while(ShopProduct::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("product_image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("product_image")->move(public_path('assets/images/products/'), $image_name);

        $sizes = implode(',', $request->size_id);
        $colors = implode(',', $request->color_id);
        $branches = implode(',', $request->branche_id);

        if($request->status == 'on')
        {
            ShopProduct::create([
                'random_id' => $random_id,
                'department_id' => auth()->user()->department_id,
                'product_image' => $image_name,
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'status' => 'متوفر',
                'size_id' => $sizes,
                'color_id' => $colors,
                'branche_id' => $branches,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->quantity - $request->sold_quantity,
            ]);
        }else{
            ShopProduct::create([
                'random_id' => $random_id,
                'department_id' => auth()->user()->department_id,
                'product_image' => $image_name,
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'status' => 'غير متوفر',
                'size_id' => $sizes,
                'color_id' => $colors,
                'branche_id' => $branches,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->quantity - $request->sold_quantity,
            ]);
        }

        session()->flash('addShopProduct');
        return redirect()->route('products');
    }




    public function editShopProduct(Request $request, $id)
    {
        $product = ShopProduct::find($id);
        return view('admin.dashboards.shops.edit', compact('product'));
    }




    public function updateShopProduct(Request $request, $id)
    {
        $product = ShopProduct::find($id);

        if($request->hasFile('product_image'))
        {
            $oldImage = 'assets/images/products/'.$product->image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }
            $file_extention = $request->file("product_image")->getCLientOriginalExtension();
            $newImage = time(). "." .$file_extention;
            $request->file("product_image")->move(public_path('assets/images/products/'), $newImage);
            $product->product_image = $newImage;
        }

        $sizes = implode(',', $request->size_id);
        $colors = implode(',', $request->color_id);
        $branches = implode(',', $request->branche_id);

        if($request->status == 'on')
        {
            $product->update([
                'category_id' => $request->category_id,
                'product_image' => $product->product_image,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'size_id' => $sizes,
                'color_id' => $colors,
                'returnable' => $request->returnable,
                'guarantee' => $request->guarantee,
                'status' => 'متوفر',
                'branche_id' => $branches,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->quantity - $request->sold_quantity,
            ]);
        }else{
            $product->update([
                'category_id' => $request->category_id,
                'product_image' => $product->product_image,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'size_id' => $sizes,
                'color_id' => $colors,
                'returnable' => $request->returnable,
                'guarantee' => $request->guarantee,
                'status' => 'غير متوفر',
                'branche_id' => $branches,
                'quantity' => $request->quantity,
                'sold_quantity' => 50,
                'remaining_quantity' => $request->quantity - $request->sold_quantity,
            ]);
        }

        session()->flash('editShopProduct');
        return redirect()->route('products');
    }





    public function shopProductDetails($id)
    {
        $product = ShopProduct::find($id);
        return view('admin.dashboards.shops.productDetails', compact('product'));
    }





    public function deleteShopProduct($id)
    {
        $product = ShopProduct::find($id);
        $oldImage = 'assets/images/products/'.$product->product_image;
        if(File::exists($oldImage))
        {
            File::delete($oldImage);
        }
        $product->delete();
        session()->flash('deleteShopProduct');
        return redirect()->route('products');
    }



    public function DeactiviteShopProduct($id)
    {
        $product = ShopProduct::find($id);
        $product->update([
            'status' => 'غير متوفر',
        ]);
        session()->flash('DeactiveShopProduct');
        return back();
    }





    public function unDeactiviteShopProduct($id)
    {
        $product = ShopProduct::find($id);
        $product->update([
            'status' => 'متوفر',
        ]);
        session()->flash('unDeactiveShopProduct');
        return back();
    }



    public function shopPurchases()
    {
        $purchases = Order::where('department_id', auth()->user()->department_id)->get();
        return view('admin.purchases.ShopPurchases.index', compact('purchases'));
    }



    public function shopPurchasesDetails($id)
    {
        $purchase = Order::find($id);
        return view('admin.purchases.ShopPurchases.details');
    }

}
