<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->basic  = new \Vonage\Client\Credentials\Basic(env("Vonage_api_key"), env("Vonage_api_secret"));
        $this->client = new \Vonage\Client($this->basic);
    }



    public function register(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'department_id' => 'required',
            'commercial_registration_number' => 'required',
            'commercial_registration_image' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'confirmed_password' => 'required_with:password|same:password|min:8',
        ],[
            'company_name' => __('messages.CompanyNameRequired'),
            'department_id' => __('messages.DepartmnetRequired'),
            'commercial_registration_number' => __('messages.registration_number_required'),
            'commercial_registration_image' => __('messages.registration_image_required'),
            'phone' => __('messages.phone_required'),
            'email' => __('messages.emailrequired'),
            'password' => __('messages.password_required'),
            'password' => __('messages.password_min'),
            'confirmed_password' => __('messages.confirmed_password_required'),
            'confirmed_password' => __('messages.confirmed_password_same'),
        ]);


        $file_extention = $request->file("commercial_registration_image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("commercial_registration_image")->move(public_path('assets/images/commercial/'), $image_name);

        $user = User::create([
            'name' => $request->company_name,
            'company_name' => $request->company_name,
            'department_id' => $request->department_id,
            'phone' => $request->phone,
            'country_code' => $request->country_code,
            'isVerified' => 0,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmed_password' => Hash::make($request->confirmed_password),
            'commercial_registration_number' => $request->commercial_registration_number,
            'commercial_registration_image' => $image_name,
            'type' => 'seller',
        ]);

        $request = new \Vonage\Verify\Request("+201015696025", "N1 Project");
        $response = $this->client->verify()->start($request);
        $requestId = $response->getRequestId();

        return view('front.layouts.confirmNumber', compact('user', 'requestId'));
    }



    public function check(Request $request)
    {
        try{
            $user = User::orderBy('id', 'desc')->first();
            $phoneNumber = $user->phone;
            $userEnteredVerificationCode = $request->input('verification_code');
            $savedVerificationCode = $request->input('verification_code');

            if ($userEnteredVerificationCode == $savedVerificationCode) {
                User::where('phone', $phoneNumber)->update(['isVerified' => 1]);
                Auth::login($user);
                Session::forget('verification_code');

                session()->flash('login');
                return redirect()->route('admin');
            }else{
                session()->flash('Invalid verification code');
                return back();
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($request->only('email', 'password'), $request->get('remember'))){
            if(Auth()->user()->type == 'admin'){
                return view('Admin_Dashboard.dashboard');
            }
            session()->flash('login');
            return redirect()->route('admin');
        }
        session()->flash('ErrorLogin');
        return back();
    }



    public function logOut()
    {
        Auth::logout();
        session()->flash('logout');
        return redirect()->route('home');
    }
}
