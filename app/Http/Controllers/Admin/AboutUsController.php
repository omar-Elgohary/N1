<?php
namespace App\Http\Controllers\admin;
use App\Models\AboutUs;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $infos = AboutUs::all();
        return view('dashboard.parts.about_us', compact('infos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'paragraph_ar' => 'required|unique:about_us|min:20',
            'paragraph_en' => 'required|unique:about_us|min:20',
        ],[
            'paragraph_ar.required' => 'يجب ادخال معلومات عن الموقع بالعربية',
            'paragraph_en.required' => 'يجب ادخال معلومات عن الموقع بالانجليزية',
            'paragraph_ar.unique' => 'معلومات الموقع العربية التي ادخلتها موجوده سابقا',
            'paragraph_en.unique' => 'معلومات الموقع الانجليزية التي ادخلتها موجوده سابقا',
            'paragraph.min' => 'يجب ادخال اكثر من 50 حرف لمعلومات الموقع',
        ]);

        $data = $request->only('paragraph_ar', 'paragraph_en');
        AboutUs::create($data);

        session()->flash('Add', 'تم اضافة معلومات الموقع بنجاح ');
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'paragraph_ar' => 'required|min:20',
            'paragraph_en' => 'required|min:20',
        ]);

        $data = $request->only('paragraph_ar', 'paragraph_en');
        AboutUs::find($id)->update($data);

        session()->flash('Edit', 'تم تعديل معلومات الموقع بنجاح ');
        return back();
    }

    public function destroy(Request $request, $id)
    {
        AboutUs::find($id)->delete();
        session()->flash('Delete', 'تم حذف معلومات الموقع بنجاح ');
        return back();
    }




    public function contact_us()
    {
        $contact_requests = ContactUs::all();
        return view('dashboard.parts.contact_us', compact('contact_requests'));
    }
}
