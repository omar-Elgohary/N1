<?php
namespace App\Http\Controllers\admin;
use App\Models\Aboutus;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $infos = DB::table('about_us')->paginate(5);
        return view('Admin_Dashboard.parts.about_us', compact('infos'));
    }

    public function storeAboutUs(Request $request)
    {
        $this->validate($request, [
            'paragraph_ar' => 'required|unique:about_us|min:20',
            'paragraph_en' => 'required|unique:about_us|min:20',
        ],[
            'paragraph_ar.required' => 'يجب ادخال معلومات عن الموقع بالعربية',
            'paragraph_en.required' => 'يجب ادخال معلومات عن الموقع بالانجليزية',
            'paragraph_ar.unique' => 'معلومات الموقع العربية التي ادخلتها موجوده سابقا',
            'paragraph_en.unique' => 'معلومات الموقع الانجليزية التي ادخلتها موجوده سابقا',
            'paragraph.min' => 'يجب ادخال اكثر من 20 حرف لمعلومات الموقع',
        ]);

        $data = $request->only('paragraph_ar', 'paragraph_en');
        DB::table('about_us')->insert($data);

        session()->flash('storeAboutUs');
        return back();
    }


    
    public function updateAboutUs(Request $request, $id)
    {
        $this->validate($request, [
            'paragraph_ar' => 'required|min:20',
            'paragraph_en' => 'required|min:20',
        ],[
            'paragraph_ar.required' => 'يجب ادخال معلومات عن الموقع بالعربية',
            'paragraph_en.required' => 'يجب ادخال معلومات عن الموقع بالانجليزية',
            'paragraph_ar.unique' => 'معلومات الموقع العربية التي ادخلتها موجوده سابقا',
            'paragraph_en.unique' => 'معلومات الموقع الانجليزية التي ادخلتها موجوده سابقا',
            'paragraph.min' => 'يجب ادخال اكثر من 20 حرف لمعلومات الموقع',
        ]);
        $data = $request->only('paragraph_ar', 'paragraph_en');
        DB::table('about_us')->where('id', $id)->update($data);

        session()->flash('updateAboutUs');
        return back();
    }

    public function deleteAboutUs($id)
    {
        $info = DB::table('about_us')->where('id', $id);
        $info->delete();
        session()->flash('deleteAboutUs');
        return back();
    }




    public function usersMessages()
    {
        $usersMessages = DB::table('contact_us')->get();
        return view('Admin_Dashboard.parts.contact_us', compact('usersMessages'));
    }
}
