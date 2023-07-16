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




    public function createEntertainmentCategory(Request $request)
    {
        if(!$request->name){
            session()->flash('ErrorName');
            return redirect()->route('events');
        }else{
            Category::create([
                'name' => $request->name,
                'department_id' => auth()->user()->department_id,
            ]);
        }

        session()->flash('addCategory');
        return redirect()->route('events');
    }




    public function events()
    {
        $events = Event::all();
        return view('admin.dashboards.Entertainments.events', compact('events'));
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
            'event_image' => 'required',
            'event_name' => 'required',
            'description' => 'required',
            'ticket_price' => 'required|numeric',
            'tickets_quantity' => 'required|numeric',
            'reservations_type_id' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required',
            'start_reservation_date' => 'required',
        ]);

        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        while(Event::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $file_extention = $request->file("event_image")->getCLientOriginalExtension();
        $image_name = time(). ".".$file_extention;
        $request->file("event_image")->move(public_path('assets/images/products/'), $image_name);

        $reservation_types = implode(',', $request->reservations_type_id);

        $subCatName = $request->sub_category_name;
        $element = SubCategory::where('name', $subCatName)->first()->id;

        Event::create([
            'random_id' => $random_id,
            'department_id' => auth()->user()->department_id,
            'event_image' => $image_name,
            'category_id' => $request->category_id,
            'sub_category_id' => $element,
            'event_name' => $request->event_name,
            'description' => $request->description,
            'ticket_price' => $request->ticket_price,
            'tickets_quantity' => $request->tickets_quantity,
            'tickets_remaining_quantity' => ($request->tickets_quantity - $request->tickets_sold_quantity),
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

        if($request->hasFile('event_image'))
        {
            $oldImage = 'assets/images/products/'.$event->image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }
            $file_extention = $request->file("event_image")->getCLientOriginalExtension();
            $newImage = time(). "." .$file_extention;
            $request->file("event_image")->move(public_path('assets/images/products/'), $newImage);
            $event->event_image = $newImage;
        }

        $reservation_types = implode(',', $request->reservations_type_id);
        $subCatName = $request->sub_category_name;

        $event->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $subCatName,
            'event_image' => $event->event_image,
            'event_name' => $request->event_name,
            'description' => $request->description,
            'ticket_price' => $request->ticket_price,
            'tickets_quantity' => $request->tickets_quantity,
            'tickets_sold_quantity' => $request->tickets_sold_quantity,
            'tickets_remaining_quantity' => ($request->tickets_quantity - $request->tickets_sold_quantity),
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
