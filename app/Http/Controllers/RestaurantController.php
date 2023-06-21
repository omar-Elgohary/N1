<?php
namespace App\Http\Controllers;
use App\Models\Meal;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $products = Product::all();
        return view('admin.dashboards.restaurants.FoodMenu', compact('products'));
    }



    public function createRestaurentProduct()
    {
        return view('admin.dashboards.restaurants.create');
    }



    public function storeRestaurentProduct(Request $request)
    {
        return $request;
        $this->validate($request, [
            'image' => 'required',
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
        while(Product::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("product_image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("product_image")->move(public_path('assets/images/products/'), $image_name);

        Product::create([
            'random_id' => $random_id,
            'product_image' => $image_name,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'calories' => $request->calories,
            'extra_id' => $request->extra_id,
            'without_id' => $request->without_id,
            'branche_id' => $request->branche_id,
            'quantity' => $request->quantity,
            'sold_quantity' => 50,
            'remaining_quantity' => $request->remaining_quantity - 50,
        ]);

        session()->flash('addRestaurentProduct');
        return redirect()->route('foodMenu');
    }

}
