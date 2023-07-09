<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\ContactUs;
use App\Models\ShopProduct;
use Illuminate\Http\Request;
use App\Models\RestaurentProduct;

class MainController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create([
            'email' => $request->email,
            'name' => $request->name,
            'message' => $request->message,
        ]);

        session()->flash('contactMessage');
        return back();
    }
}
