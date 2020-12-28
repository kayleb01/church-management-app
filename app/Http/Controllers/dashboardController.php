<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\People;
use App\Followup;
use App\Event;
use App\Group;


class dashboardController extends Controller
{


public function index()
{		//get the total number of people under the ministry of the loggedIn user
	$people = People::where('ministry', auth()->user()->ministrys->id)->get();
	$people = count($people);

	$group = Group::where('ministry', auth()->user()->ministrys->id)->get();
	$group = count($group);
	 
	$date = now();
	$people_birth = People::where('ministry', auth()->user()->ministrys->id)
					->whereMonth('date_of_birth', '=', $date->month)
					->orWhere(function($query)use($date){
						$query->whereDay('date_of_birth', '=', $date->day)
						->whereDay('date_of_birth', '=', $date->day);
					})->orderByRaw("DAYOFMONTH('date_of_birth')", 'ASC')
					->get();

	$followups = Followup::where('ministry', auth()->user()->ministrys->id)
							->where('status', '=', NULL)
							->where('user_id', '=', auth()->user()->id)
							->WhereMonth('date', '=', $date->month)
							->get();

	return view('dashboard.dashboard', compact('people', 'group', 'people_birth', 'followups'));
}

public function userNew()
{
  return view('dashboard.newUser');
}

public function users()
{
    return view('dashboard.users');
}
public function user()
{
	return view('dashboard.user');
}

public function group()
{
	return view('dashboard.group');
}
public function newGroup()
{
	return view('dashboard.newGroup');
}
 
public function edit_group()
{
	return view('dashboard.edit_group');
}

public function events()
{
	return view('dashboard.events');
}

public function newEvent()
{
	return view('dashboard.add_event');
}

public function followup()
{
	return view('dashboard.followup');
}

public function followupAdd()
{
	return view('dashboard.followupAdd');
}

public function form()
{
	return view('dashboard.forms');
}
 
public function contribution()
{
	return view('dashboard.contribution');
}

public function Addcontri()
{
	return view('dashboard.Addcontribution');
}


}
