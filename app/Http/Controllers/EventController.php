<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventRepeat;
use App\Calendar;

class EventController extends Controller
{
  /**
     * Display a listing of the group.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //get all the users and use them as Leaders in groups
        $event = Event::where('ministry', auth()->user()->ministrys->id)->get();
        return view('dashboard.events', compact('event'));
    }

    /**
     * Store a newly created group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'event_date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'event_image' => 'sometimes',
            'description' => 'sometimes',
            'tickets' => 'sometimes',
            'attendance' =>'sometimes',
            'visibility' => 'sometimes',
        ]); 

        $event =  Event::create([
            'title'         => request('title'),
            'ministry'      => auth()->user()->ministrys->id,
            'user_id'       => auth()->user()->id,
            'from'          => request('from'),
            'to'            => request('to'),
            'event_date'    => request('event_date'),
            'event_image'   => request('event_image'),
            'tickets'       => request('tickets'),
            'attendance'    => request('attendance'),
            'visibility'    => request('visibility'),
            'description'   => request('description')
        ]);

        if($event){
            //save the events to display on the calendar
           $calendar =  Calendar::create([
                'title'     =>  request('title'),
                'event_id'  =>  $event->id,
                'start'     =>  request('event_date'),
                'end'       =>  request('event_date'),
            ]);

            return $event;
        }
        // if($event){
        //     $eventrep = EventRepeat::create([
        //     'repeat' => request('repeat'),
        //     'days'=> request(''),
        //     ]);
        // }
    }

    /**
     * Display the specified all groups.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Event::where('ministry', auth()->user()->ministrys->id)->paginate(20);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $id)
    {
            //$this->authorize('update', $thread);
    $this->validate($request,[
        'group_name'    => 'required',
        'user_id'       => 'required',
        'description'      => 'sometimes',
    ]);
    
    $update = $id->update($request->all());
        if($update){
            return ['message' => 'User updated successfully'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $id)
    {
        $event =  $id;
        $event->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Group deleted']);
        }

        return back();
    }

    /**
     * retrieve the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function upcoming()
    {   
        $date = now();
        return Event::where('ministry', auth()->user()->ministrys->id)
                        ->whereMonth('event_date', '>', $date->month)
                        ->orWhere(function($query)use($date){
                            $query->whereMonth('event_date', '=', $date->month)
                            ->whereDay('event_date', '>=', $date->day);
                        })->orderByRaw("DAYOFMONTH('event_date')", 'ASC')->take(4)
                        ->get();
    }

}
