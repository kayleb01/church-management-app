<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
class dashboardController extends Controller
{


public function index()
{
	return view('dashboard.dashboard');
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
