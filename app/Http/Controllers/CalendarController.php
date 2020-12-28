<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class CalendarController extends Controller
{

    /**
     * Display a listing of the group.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.calendar');
    }

    /**
     * Store a newly created group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified all groups.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
     return Calendar::get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Followup $id)
    {
            //$this->authorize('update', $thread);
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Followup $id)
    {
       //
    }

   


}
