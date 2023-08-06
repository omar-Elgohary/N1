<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->basic  = new \Vonage\Client\Credentials\Basic(env("Vonage_api_key"), env("Vonage_api_secret"));
        $this->client = new \Vonage\Client($this->basic);
    }



    public function register(Request $request)
    {
        try{
            $validateUser = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'country_code' => 'required',
                'phone' => 'required|unique:users,phone',
                'password' => 'required|min:8',
                'confirmed_password' => 'required_with:password|same:password|min:8',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'country_code' => $request->country_code,
                'phone' => $request->phone,
                'isVerified' => 0,
                'password' => Hash::make($request->password),
                'confirmed_password' => Hash::make($request->confirmed_password),
                'type' => 'user',
            ]);

            // $request = new \Vonage\Verify\Request("+201015696025", "N1 Project");
            // $response = $this->client->verify()->start($request);
            // $requestId = $response->getRequestId();

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully`',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
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

                return response()->json([
                    'status' => true,
                    'message' => 'User Registered Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid verification code',
                ], 200);
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }



    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),[
                'country_code' => 'required',
                'phone' => 'required',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            // if(!Auth::attempt($request->only(['country_code']))){
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'You Must Choose Your Correct Country Code.',
            //     ], 401);
            // }

            if(!Auth::attempt($request->only(['phone', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('phone', $request->phone)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => $user,
            ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }



    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
}
