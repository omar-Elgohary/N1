<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Paytabs\Paytabs;


class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        // Initialize PayTabs
        $paytabs = Paytabs::getInstance(config('services.paytabs.merchant_id'), config('services.paytabs.secret_key'));

        // Create a payment request
        $payment = $paytabs->createPayPage(array(
            'title' => 'Your Product Name',
            'amount' => 100.00, // Replace with the actual amount
            'currency' => 'USD', // Replace with the desired currency
            // Add other required parameters
        ));

        // Redirect to the payment page
        return redirect($payment->payment_url);
    }
}
