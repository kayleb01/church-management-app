<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;

class ActionController extends Controller
{
    public function store(Request $request)
    {
       $this->validate($request,[
           'title' => 'required'
       ]);
       return Action::create([
           'action' => request('title')
       ]);
    }

    /*
    *Get all the actions to be displayed
    */
    public function index()
    {
        return Action::get();
    }
}
