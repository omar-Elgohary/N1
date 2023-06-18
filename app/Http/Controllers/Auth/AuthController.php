<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Twilio\Rest\Client;
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
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'confirmed_password' => 'required_with:password|same:password|min:6'
        ]);

        $user = User::create([
            'name' => $request->company_name,
            'company_name' => $request->company_name,
            'activity_type' => $request->activity_type,
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

        return $this->verify($user);
    }



    public function verify($user)
    {
        try{
            /* Get credentials from .env */
            $twilio_sid = getenv("TWILIO_SID");
            $token = getenv("TWILIO_TOKEN");
            $twilio_verify_sid = getenv("TWILIO_FROM");
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create(['code' => $user['verification_code'], 'to' => $user['phone']]);

            if ($verification->valid) {
                $user = tap(User::where('phone', $user['phone']))->update(['isVerified' => true]);
                /* Authenticate user */
                $user = Auth::login($user->first());
                session()->flash('login');
                return redirect()->route('admin');
            }
        }catch(\Exception $e){
            echo $e;
            session()->flash('Invalid verification code entered!');
            return back();
        }
    }





    // public function verify(Request $request)
    // {
    //     $user = User::where('phone', $request->phone)->first();
    //     $user->update(['isVerified', 1]);
    //     Auth::login($user);
    //     session()->flash('register');
    //     return redirect()->route('admin');
    // }








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
