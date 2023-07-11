<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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



    public function changePasswordPage()
    {
        return view('admin.parts.changePassword');
    }


    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->password1 == $request->password2){
            $user->update([
                'password' => Hash::make($request->password1),
                'confirmed_password' => Hash::make($request->password1),
            ]);
            session()->flash('passwordCorrect');
            return redirect()->route('personalInfo');
        }else{
            session()->flash('passwordInCorrect');
            return view('admin.parts.changePassword');
        }
    }




}
