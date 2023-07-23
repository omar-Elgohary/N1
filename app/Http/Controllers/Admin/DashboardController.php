<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('Admin_Dashboard.dashboard');
    }


    public function categories()
    {
        $categories = Category::paginate(5);
        return view('Admin_Dashboard.categories.index', compact('categories'));
    }


    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
        ],[
            'name.required' => 'يجب ادخال اسم الفئة',
            'department_id.required' => 'يجب اختيار القسم',
        ]);

        Category::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
        ]);

        session()->flash('addCategory');
        return back();
    }



    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
        ]);
        session()->flash('updateCategory');
        return back();
    }

    public function deleteCategory(Request $request, $id)
    {
        Category::find($id)->delete();
        session()->flash('deleteCategory');
        return back();
    }
}
