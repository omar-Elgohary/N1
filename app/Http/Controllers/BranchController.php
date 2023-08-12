<?php
namespace App\Http\Controllers;
use PDF;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    public function allBranches()
    {
        $branches = Branch::where('department_id', auth()->user()->department_id)->get();
        return view('admin.branches.allBranches', compact('branches'));
    }




    public function createBranche(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'branche_location' => 'bail|nullable',
            'phone' => 'required',
            'email' => 'required|email',
            'image' => 'required',
            'password' => 'required|min:8',
            'confirmed_password' => 'required_with:password|same:password'
        ],[
            'name.required' => __('messages.name_required'),
            'phone.required' => __('messages.phone_required'),
            'email.required' => __('messages.emailrequired'),
            'email.email' => __('messages.emailtype'),
            'image.required' => __('messages.imageRequired'),
            'password.required' => __('messages.password_required'),
            'password.min' => __('messages.password_min'),
            'confirmed_password.required' => __('messages.confirmed_password_required'),
            'confirmed_password.same' => __('messages.confirmed_password_same'),
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        while(Branch::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("image")->move(public_path('assets/images/branches/'), $image_name);

        Branch::create([
            'random_id' => $random_id,
            'department_id' => auth()->user()->department_id,
            'name' => [
                'en'=> $request->name_en,
                'ar'=> $request->name_ar,
            ],
            'branche_location' => $request->branche_location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'phone'=> $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmed_password' => Hash::make($request->confirmed_password),
            'image' => $image_name,
        ]);

        session()->flash('addBranch');
        return redirect()->route('allBranches');
    }



    public function EditBranchPage(Request $request, $id)
    {
        $branch = Branch::find($id);
        return view('admin.branches.EditBranchDetails', compact('branch'));
    }




    public function updateBranch(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'delivery' => 'required',
        ]);

        $branch = Branch::find($id);
        $branch->update([
            'name' => [
                'en'=> $request->name_en,
                'ar'=> $request->name_ar,
            ],
            'branche_location' => $request->branche_location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,            'email' => $request->email,
            'phone' => $request->phone,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'delivery' => $request->delivery,
        ]);

        session()->flash('editBranch');
        return redirect()->route('allBranches');
    }





    public function deleteBranch($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        session()->flash('deleteBranch');
        return redirect()->route('allBranches');
    }




    public function exportBranchePdf()
    {
        $branches  = Branch::where('department_id', auth()->user()->department_id)->get();
        $data = [
            'title' => 'Welcome to N1.com',
            'date' => date('m/d/Y'),
            'branches' => $branches
        ];
        $pdf = PDF::loadView('pdf.branches', $data);
        return $pdf->download('branches.pdf');
    }
}

