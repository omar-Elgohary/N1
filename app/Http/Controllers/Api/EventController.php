<?php
namespace App\Http\Controllers\Api;
use App\Models\Event;
use App\Models\Branch;
use App\Models\BrancheRate;
use App\Models\ReservationType;
use App\Http\Controllers\Controller;
use App\Models\EventRate;

class EventController extends Controller
{
    public function getEventById($id)
    {
        try{
            $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($id);
            $branche['image'] = asset('assets/images/branches/'.$branche->image);
            if($branche->rate){
                $branche['rate'] = BrancheRate::where('branche_id', $id)->first()->rate;
            }else{
                $branche['rate'] = 0;
            }

            $newests = Event::where('branche_id', $branche->id)->orderby('created_at', 'desc')->get();
            foreach($newests as $newest){
                $newest['product_image'] = asset('assets/images/products/'.$newest->product_image);
                $newest['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $newest->reservations_type_id)->get();
                $event['rate'] = EventRate::where('event_product_id', $newest->id)->avg('rate');

            }

            $highRates = Event::where('branche_id', $branche->id)->get();
            foreach($highRates as $highRate){
                $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
                $highRate['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $highRate->reservations_type_id)->get();
                $event['rate'] = EventRate::where('event_product_id', $highRate->id)->avg('rate');

            }


            if($branche->department_id == 3){
                return response()->json([
                    'status' => 200,
                    'message' => 'Branche Returned Successfully',
                    'branche' => $branche,
                    'newests' => $newests,
                    'highRates' => $highRates,
                ]);
            }else{
                return response()->json([
                    'status' => 200,
                    'message' => 'Branche Returned Failed Is Not Event Store',
                ]);
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }




    public function getEventProductById($id)
    {
        $event = Event::find($id);
        $event['product_image'] = asset('assets/images/products/'.$event->product_image);
        $event['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $event->reservations_type_id)->get();
        $event['rate'] = EventRate::where('event_product_id', $id)->avg('rate');



        $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($event->branche_id);
        $branche['image'] = asset('assets/images/branches/'.$branche->image);
        if($branche->rate){
            $branche['rate'] = BrancheRate::where('branche_id', $branche->id)->first()->rate;
        }else{
            $branche['rate'] = 0;
        }

        $similarEvents = Event::where('branche_id', $event->branche_id)->get();
        foreach($similarEvents as $similarEvent){
            $similarEvent['product_image'] = asset('assets/images/products/'.$similarEvent->product_image);
            $similarEvent['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $similarEvent->reservations_type_id)->get();
        }

        if($event){
            return response()->json([
                'status' => 200,
                'message' => 'Event Product Returned Successfully',
                'event' => $event,
                'branche' => $branche,
                'similarEvents' => $similarEvents,
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => "Event Product Not Found",
            ]);
        }
    }
}
