<?php
namespace App\Http\Controllers;
use PDF;
use App\Models\Event;
use App\Models\Category;
use App\Models\EventOrder;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ReservationType;
use App\Imports\ImportEventProducts;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class EntertainmentController extends Controller
{
    public function entertainmentsMenu()
    {
        return view('admin.dashboards.Entertainments.menu');
    }


    public function events()
    {
        $events = Event::all();
        return view('admin.dashboards.Entertainments.events', compact('events'));
    }



    // Categories
    public function eventCategories()
    {
        $categories = Category::where('department_id', auth()->user()->department_id)->get();
        return view('admin.dashboards.Entertainments.allCategories', compact('categories'));
    }



    public function createEntertainmentCategory(Request $request)
    {
        Category::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'department_id' => auth()->user()->department_id,
        ]);

        session()->flash('addCategory');
        return back();
    }


    public function editEventCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
        ]);
        session()->flash('editCategory');
        return back();
    }


    public function deleteEventCategory($id)
    {
        Category::find($id)->delete();
        session()->flash('deleteCategory');
        return back();
    }



    public function filterEventPurchases($cat_id)
    {
        $orders = EventOrder::where('category_id', $cat_id)->get();
        return view('admin.purchases.EntertainmentPurchases.index', compact('orders'));
    }




    // SubCategories
    public function eventSubCategories($id)
    {
        $category = Category::find($id);
        $subCategories = SubCategory::where('category_id', $id)->get();
        return view('admin.dashboards.Entertainments.allSubCategories', compact('category', 'subCategories'));
    }


    public function createEventSubCategory(Request $request, $id)
    {
        if($request->name_en == ''){
            session()->flash('nameRequiredEn');
            return back();
        }

        if($request->name_ar == ''){
            session()->flash('nameRequiredAr');
            return back();
        }

        $category = Category::find($id);

        SubCategory::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'category_id' => $category->id,
        ]);
        session()->flash('addSubCategory');
        return back();
    }



    public function editEventSubCategory(Request $request, $id)
    {
        SubCategory::find($id)->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'category_id' => $request->category_id,
        ]);
        session()->flash('editSubCategory');
        return back();
    }



    public function deleteEventSubCategory($id)
    {
        SubCategory::find($id)->delete();
        session()->flash('deleteSubCategory');
        return back();
    }




    public function filterEventProducts($category_id)
    {
        $category = Category::find($category_id);
        $events = Event::where('department_id', auth()->user()->department_id)->where('category_id', $category_id)->get();
        return view('admin.dashboards.Entertainments.events', compact('category', 'events'));
    }





    public function createEvent()
    {
        $reservationTypes = ReservationType::all();
        return view('admin.dashboards.Entertainments.create', compact('reservationTypes'));
    }



    public function storeEvent(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_name' => 'required',
            'product_image' => 'required',
            'event_name' => 'required',
            'description' => 'required',
            'ticket_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'reservations_type_id' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required',
            'start_reservation_date' => 'required',
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        while(Event::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("product_image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("product_image")->move(public_path('assets/images/products/'), $image_name);

        $reservation_types = implode(',', $request->reservations_type_id);

        $subCatName = $request->sub_category_name;
        $element = SubCategory::where('name', $subCatName)->first()->id;

        Event::create([
            'random_id' => $random_id,
            'department_id' => auth()->user()->department_id,
            'product_image' => $image_name,
            'category_id' => $request->category_id,
            'sub_category_id' => $element,
            'event_name' => $request->event_name,
            'description' => $request->description,
            'ticket_price' => $request->ticket_price,
            'quantity' => $request->quantity,
            'remaining_quantity' => ($request->quantity - $request->sold_quantity),
            'reservations_type_id' => $reservation_types,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'start_reservation_date' => $request->start_reservation_date,
        ]);

        session()->flash('addEvent');
        return redirect()->route('events');
    }




    public function editEvent(Request $request, $id)
    {
        $event = Event::find($id);
        return view('admin.dashboards.Entertainments.edit', compact('event'));
    }




    public function updateEvent(Request $request, $id)
    {
        $event = Event::find($id);

        if($request->hasFile('product_image'))
        {
            $oldImage = 'assets/images/products/'.$event->image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }
            $file_extention = $request->file("product_image")->getCLientOriginalExtension();
            $newImage = time(). "." .$file_extention;
            $request->file("product_image")->move(public_path('assets/images/products/'), $newImage);
            $event->product_image = $newImage;
        }

        $reservation_types = implode(',', $request->reservations_type_id);
        $subCatName = $request->sub_category_name;

        $event->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $subCatName,
            'product_image' => $event->product_image,
            'event_name' => $request->event_name,
            'description' => $request->description,
            'ticket_price' => $request->ticket_price,
            'quantity' => $request->quantity,
            'sold_quantity' => $request->sold_quantity,
            'remaining_quantity' => ($request->quantity - $request->sold_quantity),
            'reservations_type_id' => $reservation_types,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'start_reservation_date' => $request->start_reservation_date,
        ]);
        session()->flash('editEvent');
        return redirect()->route('events');
    }




    public function eventDetails($id)
    {
        $event = Event::find($id);
        return view('admin.dashboards.Entertainments.eventDetails', compact('event'));
    }





    public function deactivationEvent($id)
    {
        Event::find($id)->update(['status' => 'متوقف']);
        session()->flash('deactivationEvent');
        return redirect()->route('events');
    }




    public function activationEvent($id)
    {
        Event::find($id)->update(['status' => 'متاح']);
        session()->flash('activationEvent');
        return redirect()->route('events');
    }





    public function deleteEvent($id)
    {
        Event::find($id)->delete();
        session()->flash('deleteEvent');
        return redirect()->route('events');
    }






    // EntertainmentPurchases
    public function entertainmentPurchases()
    {
        $orders = EventOrder::all();
        return view('admin.purchases.EntertainmentPurchases.index', compact('orders'));
    }




    public function eventOrderDetails($id)
    {
        $order = EventOrder::find($id);
        return view('admin.purchases.EntertainmentPurchases.details', compact('order'));
    }






    // Entertainment Branch Admin
    public function eventsBranchAdmin()
    {
        $events = Event::all();
        return view('admin.branches.admins.Entertainment.index', compact('events'));
    }



    public function eventAdminDetails($id)
    {
        $event = Event::find($id);
        return view('admin.branches.admins.Entertainment.details', compact('event'));
    }





    // PDF
    public function ExportEventPDF()
    {
        $events = Event::get();
        $data = [
            'title' => 'Welcome to N1.com',
            'date' => date('m/d/Y'),
            'events' => $events
        ];
        $pdf = PDF::loadView('pdf.eventProducts', $data);
        return $pdf->download('eventProducts.pdf');
    }




    public function ExportEventPurchasesPDF()
    {
        $Purchases  = EventOrder::get();
        $data = [
            'title' => 'Welcome to N1.com',
            'date' => date('m/d/Y'),
            'Purchases' => $Purchases
        ];
        $pdf = PDF::loadView('pdf.eventPurchases', $data);
        return $pdf->download('eventPurchases.pdf');
    }



    public function ExportEventPurchasesDetailsPDF($event_id)
    {
        $order  = EventOrder::find($event_id);
        $data = [
            'title' => 'Welcome to N1.com',
            'date' => date('m/d/Y'),
            'order' => $order
        ];
        $pdf = PDF::loadView('pdf.eventPurchaseDetails', $data);
        return $pdf->download('eventPurchaseDetails.pdf');
    }



    // Excel
    public function uploadEventExcel(Request $request)
    {
        try{
            $request->validate([
                'file' => 'required|max:10000|mimes:xlsx,xls',
            ]);
            $path = $request->file('file')->getRealPath();

            Excel::import(new ImportEventProducts, $path);

            session()->flash('ExcelImported', 'Excel Imported Successfully!');
            return back();
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
