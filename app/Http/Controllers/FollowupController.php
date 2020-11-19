<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\People;
use App\Followup;

class FollowupController extends Controller
{
      /**
     * Display a listing of the group.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //get all the users and use them as Leaders in groups
        $follow = Followup::where('ministry', auth()->user()->ministry)->get();
        $people = People::where('ministry', auth()->user()->ministry)->get();
        $users = User::where('ministry', auth()->user()->ministry)->get();
        return view('dashboard.followup', compact('follow', 'people', 'users'));
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
            'person_id'       => 'required',
            'user_id'       => 'required',
            'date'          => 'required',
            'type'          => 'required',
            'from'          => 'required',
            'to'            => 'required',
            'action_id'     => 'required',
            'note'          => 'sometimes'

        ]); 

    return Followup::create([
            'person_id'     => request('person_id'),
            'user_id'       => request('user_id'),
            'ministry'      => auth()->user()->ministry,
            'date'          => request('date'),
            'type'          => request('type'),
            'from'          => request('from'),
            'to'            => request('to'),
            'action_id'     => request('action_id'),
            'status'        => request('status'),
            'note'          => request('note')
        ]);

        
    }

    /**
     * Display the specified all groups.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Followup::where('ministry', auth()->user()->ministry)->paginate(20);
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
    $this->validate($request,[
         'user_id'       => 'required',
        'person_id'   => 'required',
        'date'          =>'required',
        'type'          => 'required',
        'from'          => 'required',
        'to'            => 'required',
        'action_id'     => 'required',
    ]);
    
    $update = $id->update($request->all());
    if($update){
        return ['message' => 'Followup updated successfully'];
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Followup $id)
    {
        $group =  $id;
        $group->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Followup deleted']);
        }

        return back();
    }

    public function mark(Followup $id)
    {
        $mark = $id->update([
                'status' => 1
                ]);  
                
                if (request()->expectsJson()) {
                    return response(['status' => 'Marked']);
                }
        
                return back();
    }
}
