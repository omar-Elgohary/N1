<?php
namespace App\Http\Controllers;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PackageRepositoryInterface;

class PackageController extends Controller
{
    private PackageRepositoryInterface $packageRepository;

    public function getAllPackages()
    {
        $this->packageRepository->getAllPackages();
    }

    public function create()
    {
        return view('admin.packages.addPackage');
    }



    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin.packages.editPackage', compact('package'));
    }




//     public function store(Request $request)
//     {
//         $this->validate($request, [
//             'image' => 'required',
//             'discount_coupon' => 'required',
//             'discount_percentage' => 'required',
//             'start_date' => 'required|date',
//             'end_date' => 'required|date',
//             'users_count' => 'required|numeric',
//             'number_of_uses' => 'required|numeric',
//         ]);

//         $file_extention = $request->file("image")->getCLientOriginalExtension();
//         $image = time(). "." .$file_extention;
//         $request->file("image")->move(public_path('assets/images/offers/'), $image);


//         Package::create([
//             'image' => $image,
//             'discount_coupon' => $request->discount_coupon,
//             'discount_percentage' => $request->discount_percentage,
//             'start_date' => $request->start_date,
//             'end_date' => $request->end_date,
//             'users_count' => $request->users_count,
//             'number_of_uses' => $request->number_of_uses,
//         ]);

//         $coupon_id = Coupon::latest()->first()->id;
//         Offer::create([
//             'offer_type' => 'coupon',
//             'status' => 'مفعل',
//             'users_count' => $request->users_count,
//             'start_date' => $request->start_date,
//             'end_date' => $request->end_date,
//             'coupon_id' => $coupon_id,
//             'package_id' => null,
//         ]);

//         session()->flash('Add', 'تم اضافة الكوبون بنجاح ');
//         return redirect()->route('alloffers');
//     }




//     public function update(Request $request, $id)
//     {
//         $this->validate($request, [
//             'title_en' => 'required',
//             'title_ar' => 'required',
//             'logo' => 'sometimes|image',
//         ]);

//         $data = $request->only('title_en', 'title_ar');
//         if($request->hasFile('logo')){
//             $data['logo'] = Storage::disk('public')->put('logos', $request->file('logo'));
//         }
//         Coupon::find($id)->update($data);
//         session()->flash('Edit', 'تم تعديل الكوبون بنجاح ');
//         return redirect()->route('alloffers');
//     }




    public function packageDetails($id)
    {
        $package = Package::find($id);
        return view('admin.packages.packageDetails', compact('package'));
    }
}

