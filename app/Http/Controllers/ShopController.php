<?php
namespace App\Http\Controllers;
use PDF;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\ShopOrder;
use App\Models\ShopProduct;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Imports\ImportShopProducts;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ShopController extends Controller
{
    public function shopMenu()
    {
        return view('admin.dashboards.shops.menu');
    }


    public function products()
    {
        $categories = Category::where('department_id', auth()->user()->department_id)->get();
        $products = ShopProduct::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.shops.products', compact('products', 'categories'));
    }



    // Categories
    public function shopCategories()
    {
        $categories = Category::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.shops.allCategories', compact('categories'));
    }



    public function createShopCategory(Request $request)
    {
        Category::create([
            'name' =>[
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'department_id' => auth()->user()->department_id,
        ]);

        session()->flash('addCategory');
        return back();
    }


    public function editShopCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
        ]);
        session()->flash('editCategory');
        return back();
    }


    public function deleteShopCategory($id)
    {
        Category::find($id)->delete();
        session()->flash('deleteCategory');
        return back();
    }



    // SubCategories
    public function shopSubCategories($id)
    {
        $category = Category::find($id);
        $subCategories = SubCategory::where('category_id', $id)->get();
        return view('admin.dashboards.shops.allSubCategories', compact('category', 'subCategories'));
    }


    public function createShopSubCategory(Request $request, $id)
    {
        if($request->name == ''){
            session()->flash('nameRequired');
            return back();
        }

        $category = Category::find($id);

        SubCategory::create([
            'name' => $request->name,
            'category_id' => $category->id,
        ]);
        session()->flash('addSubCategory');
        return back();
    }



    public function editShopSubCategory(Request $request, $id)
    {
        SubCategory::find($id)->update([
            'name' => $request->name,
        ]);
        session()->flash('editSubCategory');
        return back();
    }



    public function deleteShopSubCategory($id)
    {
        SubCategory::find($id)->delete();
        session()->flash('deleteSubCategory');
        return back();
    }




    public function filterShopProducts(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $products = ShopProduct::where('department_id', auth()->user()->department_id)->where('category_id', $category_id)->get();
        return view('admin.dashboards.shops.products', compact('category', 'products'));
    }




    public function createShopProduct()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.dashboards.shops.create', compact('colors', 'sizes'));
    }



    public function storeShopProduct(Request $request)
    {
        try{
            $this->validate($request, [
                'category_id' => 'required',
                'sub_category_name' => 'required',
                'product_image' => 'required',
                'product_name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
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

            if($request->has('size_id') || $request->has('color_id'))
            {
                $sizes = implode(',', $request->size_id);
                $colors = implode(',', $request->color_id);
                $branches = implode(',', $request->branche_id);
            }else{
                $sizes = '';
                $colors = '';
                $branches = '';
            }

            $subCatName = $request->sub_category_name;
            $element = SubCategory::where('name', $subCatName)->first()->id;

            if($request->status == 'on')
            {
                ShopProduct::create([
                    'random_id' => $random_id,
                    'department_id' => auth()->user()->department_id,
                    'product_image' => $image_name,
                    'category_id' => $request->category_id,
                    'sub_category_id' => $element,
                    'product_name' => $request->product_name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'status' => 'متوفر',
                    'size_id' => $sizes,
                    'color_id' => $colors,
                    'branche_id' => $branches,
                    'quantity' => $request->quantity,
                    'remaining_quantity' => ($request->quantity - $request->sold_quantity),
                ]);
            }else{
                ShopProduct::create([
                    'random_id' => $random_id,
                    'department_id' => auth()->user()->department_id,
                    'product_image' => $image_name,
                    'category_id' => $request->category_id,
                    'sub_category_id' => $element,
                    'product_name' => $request->product_name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'status' => 'غير متوفر',
                    'size_id' => $sizes,
                    'color_id' => $colors,
                    'branche_id' => $branches,
                    'quantity' => $request->quantity,
                    'remaining_quantity' => $request->quantity - $request->sold_quantity,
                ]);
            }

            session()->flash('addShopProduct');
            return redirect()->route('products');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }




    public function editShopProduct(Request $request, $id)
    {
        $product = ShopProduct::find($id);
        return view('admin.dashboards.shops.edit', compact('product'));
    }




    public function updateShopProduct(Request $request, $id)
    {
        try{
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

            if($request->has('size_id') || $request->has('color_id'))
            {
                $sizes = implode(',', $request->size_id);
                $colors = implode(',', $request->color_id);
                $branches = implode(',', $request->branche_id);
            }else{
                $sizes = '';
                $colors = '';
                $branches = '';
            }

            $subCatName = $request->sub_category_name;

            if($request->status == 'on')
            {
                $product->update([
                    'category_id' => $request->category_id,
                    'sub_category_id' => $subCatName,
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
                    'remaining_quantity' => ($request->quantity - $request->sold_quantity),
                ]);
            }else{
                $product->update([
                    'category_id' => $request->category_id,
                    'sub_category_id' => $subCatName,
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
                    'remaining_quantity' => ($request->quantity - $request->sold_quantity),
                ]);
            }

            session()->flash('editShopProduct');
            return redirect()->route('products');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
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
        $purchases = ShopOrder::where('department_id', auth()->user()->department_id)->get();
        return view('admin.purchases.ShopPurchases.index', compact('purchases'));
    }



    public function shopPurchasesDetails($id)
    {
        $purchase = ShopOrder::find($id);
        return view('admin.purchases.ShopPurchases.details', compact('purchase'));
    }



    // ShopAdmin
    public function shopAdmin()
    {
        $products = ShopProduct::all();
        return view('admin.branches.admins.Shop.index', compact('products'));
    }


    public function ShopAdminDetails($id)
    {
        $product = ShopProduct::find($id);
        return view('admin.branches.admins.Shop.details', compact('product'));
    }





    //PDF
    public function ExportShopPDF()
    {
        $products = ShopProduct::get();
        $data = [
            'title' => 'Welcome to N1.com',
            'date' => date('m/d/Y'),
            'products' => $products
        ];
        $pdf = PDF::loadView('pdf.shopProducts', $data);
        return $pdf->download('shopProducts.pdf');
    }



    public function ExportShopPurchasesPDF()
    {
        $Purchases  = ShopOrder::get();
        $data = [
            'title' => 'Welcome to N1.com',
            'date' => date('m/d/Y'),
            'Purchases' => $Purchases
        ];
        $pdf = PDF::loadView('pdf.shopPurchases', $data);
        return $pdf->download('shopPurchases.pdf');
    }



    public function uploadShopExcel(Request $request)
    {
        try{
            $request->validate([
                'file' => 'required|max:10000|mimes:xlsx,xls',
            ]);
            $path = $request->file('file')->getRealPath();

            Excel::import(new ImportShopProducts, $path);

            session()->flash('ExcelImported', 'Excel Imported Successfully!');
            return back();
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
