<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'activity_type' => 'required',
            'commercial_registration_number' => 'required',
            'commercial_registration_image' => 'required',
            'phone' => 'required|exists:users,email',
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6',
            // 'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        session()->flash('Success', 'Registered Successfully');
        return redirect()->route('admin');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            // session()->flash('Success', 'Login Successfully');
            return redirect()->route('admin');
            // return redirect()->route('admin')->with('Success', 'Login Successfully');
        }
        session()->flash('Error', 'Login details are not valid');
        return back();
        // return back()->with('Error', 'Login details are not valid');
    }


    public function logOut()
    {
        Auth::logout();
        session()->flash('Success', 'Logout Successfully');
        return redirect()->route('home');
        // return redirect()->route('home')->with('Success', 'Logout Successfully');
    }
}
