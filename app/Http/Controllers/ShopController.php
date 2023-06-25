<?php
namespace App\Http\Controllers;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\ShopProduct;
use Illuminate\Http\Request;

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
        return $request;
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

        $sizes = implode(',', $request->size_id) ;
        $colors = implode(',', $request->color_id) ;
        $branches = implode(',', $request->branche_id) ;

        if($request->status == 'on')
        {
            ShopProduct::create([
                'random_id' => $random_id,
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
                'remaining_quantity' => $request->remaining_quantity - $request->sold_quantity,
            ]);
        }else{
            ShopProduct::create([
                'random_id' => $random_id,
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
                'remaining_quantity' => $request->remaining_quantity - $request->sold_quantity,
            ]);
        }

        session()->flash('addShopProduct');
        return redirect()->route('products');
    }
}
