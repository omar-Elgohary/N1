<?php
namespace App\Repositories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\SellerRepositoryInterface;

class SellerRepository implements SellerRepositoryInterface
{
    public function editSellerInfo(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->hasFile('commercial_registration_image'))
        {
            $oldImage = 'assets/images/users/'.$user->commercial_registration_image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }
            $file_extention = $request->file("commercial_registration_image")->getCLientOriginalExtension();
            $newImage = time(). "." .$file_extention;
            $request->file("commercial_registration_image")->move(public_path('assets/images/users/'), $newImage);
            $user->commercial_registration_image = $newImage;
        }

        $user->update([
            'company_name' => $request->company_name,
            'department_id' => $request->department_id,
            'commercial_registration_number' => $request->commercial_registration_number,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return $user;
    }

}
