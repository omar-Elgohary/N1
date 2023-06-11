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
        // dd($request->validated());
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

        // dd($request->phone);

        $user = User::create([
            'name' => $request->company_name,
            'company_name' => $request->company_name,
            'activity_type' => $request->activity_type,
            'phone'=> $request->phone,
            'country_code'=> $request->country_code,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmed_password' => Hash::make($request->confirmed_password),
            'commercial_registration_number' => $request->commercial_registration_number,
            'commercial_registration_image' => public_path('asset/images/commercial/'.$request->commercial_registration_image),
            'type' => 'seller',
        ]);

        Auth::login($user);
    }


    // public function verify(Request $request)
    // {
    //     try{
    //         $data = $request->validate([
    //             'phone' => ['required'],
    //             'verification_code' => ['required'],
    //         ]);

    //         /* Get credentials from .env */
    //         $twilio_sid = getenv("TWILIO_SID");
    //         $token = getenv("TWILIO_TOKEN");
    //         $twilio_verify_sid = getenv("TWILIO_FROM");
    //         $twilio = new Client($twilio_sid, $token);
    //         $verification = $twilio->verify->v2->services($twilio_verify_sid)
    //         ->verificationChecks
    //         ->create(['code' => $data['verification_code'], 'to' => $data['phone']]);

    //         if ($verification->valid) {
    //             $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
    //             /* Authenticate user */
    //             $user = Auth::login($user->first());
    //             session()->flash('login');
    //             return redirect()->route('admin');
    //         }
    //     }catch(\Exception $e){
    //         echo $e;
    //         session()->flash('Invalid verification code entered!');
    //         return back();
    //     }
    // }

    public function verify(Request $request)
    {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $senderNumber = getenv("TWILIO_FROM");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create("+20 115 651 3661", // to
                [
                    "body" => "Welcome From N1 Project",
                    "from" => $senderNumber,
                ]);

        dd("OTP Sent Successfully");
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
