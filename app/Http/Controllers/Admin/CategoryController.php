<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        // return $request;
        $categories = $request->validate([
            'title_ar' => 'required|unique:categories',
            'title_en' => 'required|unique:categories',
        ],[
            'title_ar.required' =>'يرجي ادخال اسم القسم العربي',
            'title_en.required' =>'يرجي ادخال اسم القسم الانجليزي',
            'title_ar.unique' =>'اسم القسم العربي مسجل مسبقا',
            'title_en.unique' =>'اسم القسم الانجليزي مسجل مسبقا',
        ]);

        $data = $request->only('title_en', 'title_ar');
        Category::create($data);

        session()->flash('Add', 'تم اضافة القسم بنجاح ');
        return back();
    }


    public function update(Request $request, $id)
    {
        $data = $request->only('title_en', 'title_ar');
        Category::find($id)->update($data);

        session()->flash('Edit', 'تم تعديل القسم بنجاح ');
        return back();
    }


    public function destroy(Request $request, $id)
    {
        Category::find($id)->delete();
        session()->flash('Delete' , 'تم حذف القسم بنجاج');
        return back();
    }



    public function getCategorySubs($id)
    {
        $subCategories = DB::table('sub_categories')->where('category_id' , $id)->pluck('name' , 'id');
        return json_encode($subCategories);
    }



    public function addSubCategory(Request $request)
    {
        try{
            $this->validate($request, [
                'category_id' => 'required',
                'name' => 'required',
            ]);

            SubCategory::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
            ]);

            session()->flash('addSubCategory');
            return redirect()->route('foodMenu');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}

