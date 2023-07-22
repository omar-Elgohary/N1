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
        return $request;
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
        ]);

        session()->flash('addCategory');
        return back();
    }
}
