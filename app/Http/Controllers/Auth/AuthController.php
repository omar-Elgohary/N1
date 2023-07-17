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
    public function verifyForm($id)
    {
        $user = User::find($id);
        return view('front.layouts.confirmNumber', compact('user'));
    }


    public function register(Request $request)
    {
        try{
            $request->validate([
                'company_name' => 'required',
                'department_id' => 'required',
                'commercial_registration_number' => 'required',
                'commercial_registration_image' => 'required',
                'phone' => 'required|unique:users,phone',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6',
                'confirmed_password' => 'required_with:password|same:password|min:6'
            ]);

            $user = User::create([
                'name' => $request->company_name,
                'company_name' => $request->company_name,
                'department_id' => $request->department_id,
                'phone'=> $request->phone,
                'country_code'=> $request->country_code,
                'isVerified'=> 0,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'confirmed_password' => Hash::make($request->confirmed_password),
                'commercial_registration_number' => $request->commercial_registration_number,
                'commercial_registration_image' => public_path('asset/images/commercial/'.$request->commercial_registration_image),
                'type' => 'seller',
            ]);

            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $otp = rand(100000, 999999);
            Session::put('verification_code', $otp);
            Session::put('user_data', $request->all());

            $client = new Client($account_id, $auth_token);
            $client->messages->create("+20 1156513661", [
                'from' => $twilio_number,
                'body' => $otp,
            ]);

            // info("OTP Sent Successfully");
            return view('front.layouts.confirmNumber', compact('user'));
        }catch(\Exception $e){
            info("Error: ".$e->getMessage());
        }
    }




    public function verify(Request $request, $id)
    {
        try{
            $user = User::find($id);
            $phoneNumber = $request->input('phone');
            $userEnteredVerificationCode = $request->input('verification_code');
            $savedVerificationCode = Session::get('verification_code');
            if ($userEnteredVerificationCode == $savedVerificationCode) {
                User::where('phone', $phoneNumber)->update(['isVerified' => true]);
                Auth::login($user);
                Session::forget('verification_code');

                session()->flash('login');
                return redirect()->route('admin');
            }else{
                dd('Invalid verification code');
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
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
