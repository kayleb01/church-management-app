<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventRepeat;

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
        $event = Event::where('ministry', auth()->user()->ministry)->get();
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

        return  Event::create([
            'title'  => request('title'),
            'ministry'      => auth()->user()->ministry,
            'user_id'       => auth()->user()->id,
            'from'          => request('from'),
            'to'            => request('to'),
            'event_date'   => request('event_date'),
            'event_image'   => request('event_image'),
            'tickets'       => request('tickets'),
            'attendance'    => request('attendance'),
            'visibility'    => request('visibility'),
            'description'   => request('description')
        ]);
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
        return Event::where('ministry', auth()->user()->ministry)->paginate(20);
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
        $group =  $id;
        $group->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Group deleted']);
        }

        return back();
    }

}
