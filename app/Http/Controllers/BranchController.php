<?php
namespace App\Http\Controllers;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    public function allBranches()
    {
        $branches = Branch::all();
        return view('admin.branches.allBranches', compact('branches'));
    }




    public function createBranche(Request $request)
    {
        $request->validate([
            'branche_title' => 'required',
            'branche_location' => 'bail|nullable',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirmed_password' => 'required_with:password|same:password|min:6'
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        while(Branch::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        Branch::create([
            'random_id' => $random_id,
            'branche_title' => $request->branche_title,
            'branche_location' => $request->branche_location,
            'phone'=> $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmed_password' => Hash::make($request->confirmed_password),
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
            'branche_title' => $request->branche_title,
            'branche_location' => $request->branche_location,
            'email' => $request->email,
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
}
