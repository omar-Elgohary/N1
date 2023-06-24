<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order;
use Twilio\Rest\Client;
use App\Models\Department;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function sendOtpSms($receiverNumber)
    {
        $otp = 'Login Otp is' . $this->otp;
        try{
            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_id, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $otp,
            ]);

            info("OTP Sent Successfully");

        }catch(\Exception $e){
            info("Error: ".$e->getMessage());
        }
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function department()
    {
        return $this->hasOne(Department::class);
    }



    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
