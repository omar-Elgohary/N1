<?php
namespace App\Repositories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\SellerRepositoryInterface;

class SellerRepository implements SellerRepositoryInterface
{
    public function editSellerInfo(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $image_name = $user->commercial_registration_image;
        if($request->hasFile("commercial_registration_image")) {
            $file_extention = $request->file("commercial_registration_image")->getCLientOriginalExtension();
            $image_name = time(). ".".$file_extention;
            $request->file("commercial_registration_image")->move(public_path('assets/images/users/'), $image_name);
        }

        $user->update([
            'company_name' => $request->company_name,
            'activity_type' => $request->activity_type,
            'commercial_registration_number' => $request->commercial_registration_number,
            'commercial_registration_image' => $image_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return $user;
    }

}
