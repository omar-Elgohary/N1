<?php
namespace App\Http\Controllers;
use App\Models\Meal;
use App\Models\Offer;
use App\Models\Coupon;
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


    public function index()
    {
        $meals = Meal::all();
        return view('admin.packages.addPackage', compact('meals'));
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




    public function addPackage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'first_meal' => 'required',
            'second_meal' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'price' => 'required|numeric',
            'users_count' => 'required|numeric',
            'how_many_times_user_use_this_coupon' => 'required|numeric',
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,6));
        while(Package::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("image")->move(public_path('assets/images/offers/'), $image_name);


        Package::create([
            'random_id' => $random_id,
            'image' => $image_name,
            'first_meal' => $request->first_meal,
            'second_meal' => $request->second_meal,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'users_count' => $request->users_count,
            'how_many_times_user_use_this_coupon' => $request->how_many_times_user_use_this_coupon,
            'status' => 'مفعل',
        ]);

        $package_id = Package::latest()->first()->id;
        Offer::create([
            'offer_type' => 'package',
            'users_count' => $request->users_count,
            'status' => 'مفعل',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'coupon_id' => null,
            'package_id' => $package_id,
        ]);

        session()->flash('addPackage');
        return redirect()->route('alloffers');
    }






    public function editPackage ($id)
    {
        $package = Package::find($id);
        return view('admin.packages.editPackage', compact('package'));
    }







    // public function editPackage(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'title_en' => 'required',
    //         'title_ar' => 'required',
    //         'logo' => 'sometimes|image',
    //     ]);

    //     $data = $request->only('title_en', 'title_ar');
    //     if($request->hasFile('logo')){
    //         $data['logo'] = Storage::disk('public')->put('logos', $request->file('logo'));
    //     }
    //     Coupon::find($id)->update($data);
    //     session()->flash('Edit', 'تم تعديل الكوبون بنجاح ');
    //     return redirect()->route('alloffers');
    // }




    public function packageDetails($id)
    {
        $package = Package::find($id);
        return view('admin.packages.packageDetails', compact('package'));
    }




    public function deletePackage($id)
    {
        Package::find($id)->delete();
        $offer = Offer::where('package_id', $id)->delete();

        session()->flash('deleteOffer');
        return back();
    }
}

