<?php
namespace App\Http\Controllers;
use PDF;
use App\Models\Extra;
use App\Models\Without;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RestaurentOrder;
use App\Models\RestaurentProduct;
use App\Models\RestaurentPurchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportRestaurentProducts;

class RestaurantController extends Controller
{
    public function restaurantMenu()
    {
        return view('admin.dashboards.restaurants.menu');
    }


    // Categories
    public function restaurentCategories()
    {
        $categories = Category::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.restaurants.allCategories', compact('categories'));
    }



    public function createCategory(Request $request)
    {
        Category::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'department_id' => auth()->user()->department_id,
        ]);

        session()->flash('addCategory');
        return back();
    }


    public function editCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
        ]);
        session()->flash('editCategory');
        return back();
    }


    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        session()->flash('deleteCategory');
        return back();
    }



    // SubCategories
    public function allSubCategories($id)
    {
        $category = Category::find($id);
        $subCategories = SubCategory::where('category_id', $id)->get();
        return view('admin.dashboards.restaurants.allSubCategories', compact('category', 'subCategories'));
    }


    public function createSubCategory(Request $request, $id)
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



    public function editSubCategory(Request $request, $id)
    {
        SubCategory::find($id)->update([
            'name' => $request->name,
        ]);
        session()->flash('editSubCategory');
        return back();
    }



    public function deleteSubCategory($id)
    {
        SubCategory::find($id)->delete();
        session()->flash('deleteSubCategory');
        return back();
    }







    public function foodMenu()
    {
        $categories = Category::where('department_id', auth()->user()->department_id)->get();
        $products = RestaurentProduct::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.restaurants.FoodMenu', compact('categories', 'products'));
    }





    public function filterProducts(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $products = RestaurentProduct::where('department_id', auth()->user()->department_id)->where('category_id', $category_id)->get();
        return view('admin.dashboards.restaurants.FoodMenu', compact('category', 'products'));
    }




    public function filterRestaurantPurchases()
    {        
        $purchases = RestaurentOrder::whereMonth('created_at', '06')->get();
        return view('admin.purchases.RestaurantPurchases.index', compact('purchases'));
    }





    public function createRestaurentProduct()
    {
        $categories = Category::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.restaurants.create', compact('categories'));
    }




    public function storeRestaurentProduct(Request $request)
    {
        // try{
            $this->validate($request, [
                'category_id' => 'required',
                'sub_category_name' => 'required',
                'product_image' => 'required',
                'name_ar' => 'required',
                'name_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'price' => 'required|numeric',
                'calories' => 'required|numeric',
                'branche_id' => 'bail|nullable|sometimes',
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

            $subCatName = $request->sub_category_name;
            $element = SubCategory::where('id', $subCatName)->first()->id;    // to get sub category name

            if($request->has('extra_id') || $request->has('without_id'))
            {
                $extra = implode(',', $request->extra_id);
                $without = implode(',', $request->without_id);
                $branche = implode(',', $request->branche_id);
            }else{
                $extra = '';
                $without = '';
                $branche = '';
            }

            if($request->status == 'on')
            {
                RestaurentProduct::create([
                    'random_id' => $random_id,
                    'department_id' => auth()->user()->department_id,
                    'product_image' => $image_name,
                    'category_id' => $request->category_id,
                    'sub_category_id' => $element,
                    'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar
                    ],
                    'description' => [
                        'en' => $request->description_en,
                        'ar' => $request->description_ar
                    ],
                    'price' => $request->price,
                    'status' => 'متوفر',
                    'calories' => $request->calories,
                    'extra_id' => $extra,
                    'without_id' => $without,
                    'branche_id' => $branche,
                    'quantity' => $request->quantity,
                    'sold_quantity' => 0,
                    'remaining_quantity' => ($request->quantity - $request->sold_quantity),
                ]);
            }else{
                RestaurentProduct::create([
                    'random_id' => $random_id,
                    'department_id' => auth()->user()->department_id,
                    'product_image' => $image_name,
                    'category_id' => $request->category_id,
                    'sub_category_id' => $element,
                    'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar
                    ],
                    'description' => [
                        'en' => $request->description_en,
                        'ar' => $request->description_ar
                    ],                    'price' => $request->price,
                    'status' => 'غير متوفر',
                    'calories' => $request->calories,
                    'extra_id' => $extra,
                    'without_id' => $without,
                    'branche_id' => $branche,
                    'quantity' => $request->quantity,
                    'sold_quantity' => 0,
                    'remaining_quantity' => ($request->quantity - $request->sold_quantity),
                ]);
            }
            session()->flash('addRestaurentProduct');
            return redirect()->route('foodMenu');
        // }catch(\Exception $e){
        //     dd($e->getMessage());
        // }
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
        // try{
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

            $subCatName = $request->sub_category_name;
            // $element = SubCategory::where('name', $subCatName)->first()->id;    // to get sub category name

            if($request->has('extra_id') || $request->has('without_id'))
            {
                $extra = implode(',', $request->extra_id);
                $without = implode(',', $request->without_id);
                $branche = implode(',', $request->branche_id);
            }else{
                $extra = '';
                $without = '';
                $branche = '';
            }

            if($request->status == 'off')
            {
                $product->update([
                    'category_id' => $request->category_id,
                    'sub_category_id' => $subCatName,
                    'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar
                    ],
                    'description' => [
                        'en' => $request->description_en,
                        'ar' => $request->description_ar
                    ],
                    'price' => $request->price,
                    'status' => 'غير متوفر',
                    'calories' => $request->calories,
                    'extra_id' => $extra,
                    'without_id' => $without,
                    'branche_id' => $branche,
                    'quantity' => $request->quantity,
                    'sold_quantity' => $request->sold_quantity,
                    'remaining_quantity' => ($request->quantity - $request->sold_quantity),
                ]);
            }else{
                $product->update([
                    'category_id' => $request->category_id,
                    'sub_category_id' => $subCatName,
                    'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar
                    ],
                    'description' => [
                        'en' => $request->description_en,
                        'ar' => $request->description_ar
                    ],
                    'price' => $request->price,
                    'status' => 'متوفر',
                    'calories' => $request->calories,
                    'extra_id' => $extra,
                    'without_id' => $without,
                    'branche_id' => $branche,
                    'quantity' => $request->quantity,
                    'sold_quantity' => $request->sold_quantity,
                    'remaining_quantity' => ($request->quantity - $request->sold_quantity),
                ]);
            }

            session()->flash('editRestaurentProduct');
            return redirect()->route('foodMenu');
        // }catch(\Exception $e){
        //     dd($e->getMessage());
        // }
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
        $purchases = RestaurentOrder::all();

        return view('admin.purchases.RestaurantPurchases.index', compact('purchases'));
    }


    public function restaurantPurchasesDetails($id)
    {
        $purchase = RestaurentOrder::find($id);
        return view('admin.purchases.RestaurantPurchases.details', compact('purchase'));
    }


    public function changePurchaseStatus($id)
    {
        $order = RestaurentOrder::find($id);

        if($order->order_status == 'جديد'){
            $order->update([
                'order_status' => 'قيد التجهيز'
            ]);
        }elseif($order->order_status == 'قيد التجهيز'){
            $order->update([
                'order_status' => 'تم الاستلام'
            ]);
        }
        return back();
    }




    // RestaurantAdmin
    public function RestaurantAdmin()
    {
        $products = RestaurentProduct::all();
        return view('admin.branches.admins.Restaurant.index', compact('products'));
    }



    public function RestaurantAdminDetails($id)
    {
        $product = RestaurentProduct::find($id);

        $extra   = explode(',', $product->extra_id);
        $extras = Extra::whereIn('id', $extra)->get();

        $without   = explode(',', $product->without_id);
        $withouts = Without::whereIn('id', $without)->get();

        return view('admin.branches.admins.Restaurant.details', compact('product', 'extras', 'withouts'));
    }



    public function changeStatus($id)
    {
        $product = RestaurentProduct::find($id);
        $extra   = explode(',', $product->extra_id);
        $extras = Extra::whereIn('id', $extra)->get();

        $without   = explode(',', $product->without_id);
        $withouts = Without::whereIn('id', $without)->get();

        if($product->status == 'متوفر'){
            $product->update([
                'status' => 'غير متوفر'
            ]);
        return view('admin.branches.admins.Restaurant.details', compact('product', 'extras', 'withouts'));
        }else{
            $product->update([
                'status' => 'متوفر'
            ]);
        return view('admin.branches.admins.Restaurant.details', compact('product', 'extras', 'withouts'));
        }
    }



    //PDF
    public function ExportrestaurentPDF()
    {
        $products = RestaurentProduct::get();
        $data = [
            'title' => 'Welcome to N1 Restaurents System',
            'date' => date('m/d/Y'),
            'products' => $products
        ];
        $pdf = PDF::loadView('pdf.restaurentProducts', $data);
        return $pdf->download('restaurentProducts.pdf');
    }

    public function ExportrestaurantPurchasesPDF()
    {
        $Purchases = RestaurentOrder::get();
        $data = [
            'title' => 'Welcome to N1 Restaurents System',
            'date' => date('m/d/Y'),
            'Purchases' => $Purchases
        ];
        $pdf = PDF::loadView('pdf.restaurentPurchases', $data);
        return $pdf->download('restaurentPurchases.pdf');
    }


    // Excel
    public function uploadtrestaurentExcel(Request $request)
    {
        try{
            $request->validate([
                'file' => 'required|max:10000|mimes:xlsx,xls',
            ]);
            $path = $request->file('file')->getRealPath();

            Excel::import(new ImportRestaurentProducts, $path);

            session()->flash('ExcelImported', 'Excel Imported Successfully!');
            return back();
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
