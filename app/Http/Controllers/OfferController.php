<?php
namespace App\Http\Controllers;
use PDF;
use App\Models\Offer;
use App\Models\Coupon;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers.allOffers', compact('offers'));
    }


    public function ExportOffersPDF()
    {
        $offers = Offer::get();
        $data = [
            'title' => 'Welcome to N1 Restaurents System',
            'date' => date('m/d/Y'),
            'offers' => $offers
        ];
        $pdf = PDF::loadView('pdf.offers', $data);
        return $pdf->download('offers.pdf');
    }
}
