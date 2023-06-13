<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Interfaces\SellerRepositoryInterface;

class SellerController extends Controller
{
    private SellerRepositoryInterface $sellerRepository;

    public function __construct(SellerRepositoryInterface $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }



    public function editSellerPage($id)
    {
        $user = User::find($id);
        return view('admin.parts.editPersonalInfo', compact('user'));
    }




    public function editSellerInfo(Request $request, $id)
    {
        $this->sellerRepository->editSellerInfo($request, $id);
        session()->flash('editSellerInfo');
        return redirect()->route('personalInfo');
    }
}
