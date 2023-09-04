<?php
namespace App\Http\Controllers\Api;
use App\Models\Like;
use App\Models\Event;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\EventRate;
use App\Models\EventOrder;
use App\Models\BrancheRate;
use Illuminate\Http\Request;
use App\Models\ReservationType;
use App\Models\RestaurentOrder;
use App\Models\TableReservation;
use App\Models\RestaurentProduct;
use App\Http\Controllers\Controller;

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
                $event['rate'] = EventRate::where('event_id', $newest->id)->avg('rate');

            }

            $highRates = Event::where('branche_id', $branche->id)->get();
            foreach($highRates as $highRate){
                $highRate['product_image'] = asset('assets/images/products/'.$highRate->product_image);
                $highRate['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $highRate->reservations_type_id)->get();
                $event['rate'] = EventRate::where('event_id', $highRate->id)->avg('rate');

            }


            if($branche->department_id == 3){
                return response()->json([
                    'status' => 200,
                    'message' => 'Event Returned Successfully',
                    'branche' => $branche,
                    'newests' => $newests,
                    'highRates' => $highRates,
                ]);
            }else{
                return response()->json([
                    'status' => 200,
                    'message' => 'Event Not Found',
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
        $event['rate'] = EventRate::where('event_id', $id)->avg('rate');

        $like = Like::where('likesable_id', $id)->where('user_id', auth()->user()->id)->first();
        if($like){
            $isLiked = true;
        }else{
            $isLiked = false;
        }

        $branche = Branch::select('id', 'department_id', 'name', 'image', 'branche_location', 'latitude', 'longitude')->find($event->branche_id);
        $branche['image'] = asset('assets/images/branches/'.$branche->image);
        if($branche->rate){
            $branche['rate'] = BrancheRate::where('branche_id', $branche->id)->first()->rate;
        }else{
            $branche['rate'] = 0;
        }

        $similarEvents = Event::where('category_id', $event->category_id)
        ->where('branche_id', $event->branche_id)
        ->where('id', '!=', $event->id)->get();
        foreach($similarEvents as $similarEvent){
            $similarEvent['product_image'] = asset('assets/images/products/'.$similarEvent->product_image);
            $similarEvent['reservations_type_id'] = ReservationType::select('id', 'name')->where('id', $similarEvent->reservations_type_id)->get();
        }

        if($event){
            return response()->json([
                'status' => 200,
                'message' => 'Event Product Returned Successfully',
                'isLiked' => $isLiked,
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




    public function addOrRemoveEventProductLikes($id)
    {
        try{
        $event = Event::findOrFail($id);

        if($event->likes->where('likesable_type', Event::class)->where("user_id", auth()->user()->id)->count() == 0 && $event->department_id == 3){
            $event->likes()->create([
                "user_id" => auth()->user()->id,
                'likesable_type' => Event::class,
                'likesable_id' => $event->id,
            ]);
        }else{
            $event->likes()->where('likesable_type', Event::class)->where("user_id", auth()->user()->id)
            ->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Remove Like Successfully',
            ]);
        }
            $flag = true;
            return response()->json([
                'status' => 200,
                'message' => 'Add Like Successfully',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 200,
                'message' => 'Event Not Found',
            ]);
        }
    }










    public function EventReservations()
    {
        $reservations = EventOrder::where('user_id', auth()->user()->id)->get();

        foreach ($reservations as $reservation) {
            $reservation['branche_id'] = Branch::where('id', $reservation->branche_id)->get();
        }

        return response()->json([
            'status' => 200,
            'message' => 'Event Reservations Returned Successfully',
            'reservations' => $reservations,
        ]);
    }




    public function reservationEvent(Request $request, $id)
    {
        $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        while(Event::where('random_id', $random_id )->exists()){
            $random_id = strtoupper('#'.substr(str_shuffle(uniqid()),0,4));
        }

        $event = Event::find($id);
        if($event){
            if($event->coupon_id){
                $coupon = Coupon::find($event->coupon_id);
                $price_before_discount = $event->ticket_price * $request->tickets_count;
                $price_after_discount = $price_before_discount - ($price_before_discount * $coupon->discount_percentage /100);

                EventOrder::create([
                    'random_id' => $random_id,
                    'user_id' => auth()->user()->id,
                    'department_id' => 3,
                    'category_id' => $event->category_id,
                    'event_id' => $id,
                    'reservations_type_id' => $request->reservations_type_id,
                    'tickets_count' => $request->tickets_count,
                    'reservation_date' => $request->reservation_date,
                    'reservation_time' => $request->reservation_time,
                    'total_price' => $price_after_discount,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'Reservation Event Successfully',
                    'Event' => $event,
                    'price_before_discount' => $price_before_discount,
                    'price_after_discount' => $price_after_discount,
                ]);

            }else{
                $price_before_discount = $event->ticket_price * $request->tickets_count;
                $price_after_discount = $event->ticket_price * $request->tickets_count;

                EventOrder::create([
                    'random_id' => $random_id,
                    'user_id' => auth()->user()->id,
                    'department_id' => 3,
                    'category_id' => $event->category_id,
                    'event_id' => $id,
                    'reservations_type_id' => $request->reservations_type_id,
                    'tickets_count' => $request->tickets_count,
                    'reservation_date' => $request->reservation_date,
                    'reservation_time' => $request->reservation_time,
                    'total_price' => $price_after_discount,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'Reservation Event Successfully',
                    'Event' => $event,
                    'price_before_discount' => $price_before_discount . 'There is no discount',
                    'price_after_discount' => $price_after_discount,
                ]);
            }
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Event Not Found',
            ]);
        }
    }



    public function eventsOfCategory($cat_id)
    {
        $category = Category::find($cat_id);
        if($category->department_id != 3){
            return response()->json([
                'status' => 201,
                'message' => 'Category Not Found',
            ]);
        }
        $events = Event::where('category_id', $cat_id)->get();
        foreach($events as $event){
            $event['product_image'] = asset('assets/images/products/'.$event->product_image);
            $event['rate'] = EventRate::where('event_id', $event->id)->avg('rate');

            if($event->coupon_id){
                $coupon = Coupon::where('id', $event->coupon_id)->first();
                $event['coupon_id'] = Coupon::where('id', $event->coupon_id)->select('discount_percentage', 'status')->first();
                if($coupon->status == 'مفعل'){
                    $event['price_after_discount'] = $event->ticket_price  - ($event->ticket_price * $coupon->discount_percentage)/ 100;
                }
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'All Events Returned Successfully',
            'category' => $category,
            'events' => $events,
        ]);
    }
}
