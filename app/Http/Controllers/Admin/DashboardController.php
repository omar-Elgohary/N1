<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
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



    public function adminInfo()
    {
        $admin = Auth::user();
        return view('Admin_Dashboard.parts.adminInfo', compact('admin'));
    }



    public function editAdminInfo(Request $request)
    {
        $admin = Auth::user();

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        session()->flash('editAdmin');
        return back();
    }



    public function users()
    {
        $users = User::where('type', 'user')->get();
        return view('Admin_Dashboard.User.users', compact('users'));
    }


    public function sellers()
    {
        $sellers = User::where('type', 'seller')->get();
        return view('Admin_Dashboard.User.sellers', compact('sellers'));
    }




    public function upgradeAccountsPage()
    {
        $users = User::where('type', 'user')->get();
        return view('Admin_Dashboard.parts.upgradeAccounts', compact('users'));
    }





    public function upgradeAccounts()
    {

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
