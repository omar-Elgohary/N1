<?php
namespace App\Http\Controllers;
use App\Models\Meal;
use App\Models\Offer;
use App\Models\Coupon;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Interfaces\PackageRepositoryInterface;

class PackageController extends Controller
{
    private PackageRepositoryInterface $packageRepository;

    public function getAllPackages()
    {
        $this->packageRepository->getAllPackages();
        // $this->packageRepository->getAllPackages();
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
            'first_meal_id' => 'required',
            'second_meal_id' => 'required',
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
            'department_id' => auth()->user()->department_id,
            'image' => $image_name,
            'first_meal_id' => $request->first_meal_id,
            'second_meal_id' => $request->second_meal_id,
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
            'department_id' => auth()->user()->department_id,
        ]);

        session()->flash('addPackage');
        return redirect()->route('alloffers');
    }






    public function editPackage ($id)
    {
        $meals = Meal::all();
        $package = Package::find($id);
        return view('admin.packages.editPackage', compact('package', 'meals'));
    }




    public function updatePackage(Request $request, $id)
    {
        $package = Package::find($id);
        if($request->hasFile('image'))
        {
            $oldImage = 'assets/images/offers/'.$package->image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }
            $file_extention = $request->file("image")->getCLientOriginalExtension();
            $newImage = time(). "." .$file_extention;
            $request->file("image")->move(public_path('assets/images/offers/'), $newImage);
            $package->image = $newImage;
        }

        $package->update([
            'department_id' => auth()->user()->department_id,
            'first_meal_id' => $request->first_meal_id,
            'second_meal_id' => $request->second_meal_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'users_count' => $request->users_count,
            'how_many_times_user_use_this_coupon' => $request->how_many_times_user_use_this_coupon,
        ]);

        $offer = Offer::where('package_id', $id)->first();
        $offer->update([
            'offer_type' => 'package',
            'status' => 'مفعل',
            'users_count' => $request->users_count,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'coupon_id' => null,
            'package_id' => $id,
            'department_id' => auth()->user()->department_id,
        ]);

        session()->flash('editPackage');
        return redirect()->route('alloffers');
    }




    public function packageDetails($id)
    {
        $package = Package::find($id);
        return view('admin.packages.packageDetails', compact('package'));
    }



    public function deactivationPackage($id)
    {
        $package = Package::find($id);
        $package->update([
            'status' => 'غير مفعل',
        ]);

        $offer = Offer::where('package_id', $id)->first();
        $offer->update([
            'status' => 'غير مفعل',
        ]);

        session()->flash('deactivationPackage');
        return redirect()->route('alloffers');
    }


    public function activationPackage($id)
    {
        $package = Package::find($id);
        $package->update([
            'status' => 'مفعل',
        ]);

        $offer = Offer::where('package_id', $id)->first();
        $offer->update([
            'status' => 'مفعل',
        ]);

        session()->flash('activationPackage');
        return redirect()->route('alloffers');
    }





    public function deletePackage($id)
    {
        $package = Package::find($id)->delete();
        $offer = Offer::where('package_id', $id)->delete();

        session()->flash('deleteOffer');
        return back();
    }
}

