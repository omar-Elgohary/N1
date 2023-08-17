<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $signedup = 1;
        return view('front.home', compact('signedup'));
    }



    public function index()
    {
        return view('front.contact');
    }



    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required',
        ],[
            'email.required' => __('messages.emailrequired'),
            'email.email' => __('messages.emailtype'),
            'name.required' => __('messages.namerequired'),
            'message.required' => __('messages.messagerequired'),
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
