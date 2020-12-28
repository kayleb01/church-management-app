<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;

class GroupController extends Controller
{
    
    /**
     * Display a listing of the group.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //get all the users and use them as Leaders in groups
        $users = User::where('ministry', auth()->user()->ministrys->id)->get();
        return view('dashboard.group', compact('users'));
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
            'group_name' => 'required',
            'user_id' => 'required',
            'description' =>'sometimes',
        ]); 

        return  Group::create([
            'group_name'  => request('group_name'),
            'ministry'    => auth()->user()->ministrys->id,
            'user_id'     => request('user_id'),
            'description' => request('description')
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
        return Group::where('ministry', auth()->user()->ministrys->id)->paginate(20);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $id)
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
    public function destroy(Group $id)
    {
        $group =  $id;
        $group->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Group deleted']);
        }

        return back();
    }


}