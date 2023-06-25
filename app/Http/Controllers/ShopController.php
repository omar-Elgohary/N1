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
    }
}
