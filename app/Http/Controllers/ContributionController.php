<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\methods;
use App\Funds;
use App\Contribution;
use Carbon\Carbon;

class ContributionController extends Controller
{
    public function contribution()
    {   $contribution = Contribution::get();
        return view('dashboard.contribution', compact('contribution'));
    }
    
    public function Addcontribution()
    {
        return view('dashboard.Addcontribution');
    }

    public function batches()
    {
        return view('dashboard.batches');
    }

    public function funds()
    {
        return view('dashboard.funds');
    }

    public function methods()
    {
        return view('dashboard.methods');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|unique:methods'
        ]);

        return methods::create([
            'title' => request('title')
        ]);
    }

    public function getMethod()
    {
        return methods::get();

    }

    public function updateMethod(Request $request, methods $id)
    {
        $this->validate($request, ['title' =>'required']);
        $update =  $id->update(request()->all());

        if ($update) {
          return ['message' => 'Update successful'];
        }
       
    }

    public function destroyMethod(Request $request, methods $id)
    {
         //For Readability
         $method =  $id;
         $method->delete();
 
         if (request()->expectsJson()) {
             return response(['status' => 'Usser deleted']);
         }
 
         return back();
    }


    //Funds
    public function storeFund(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|unique:funds',
            'tax' => 'required'
        ]);

        return Funds::create([
            'title' => request('title'),
            'tax' => request('tax')
        ]);
    }

    public function getFund()
    {
        return Funds::get();

    }

    public function updateFund(Request $request, Funds $id)
    {
        $this->validate($request, ['title' =>'required', 'tax' => 'required']);
        $update =  $id->update(request()->all());
        
        if ($update) {
          return ['message' => 'Update successful'];
        }
       
    }

    public function destroyFund(Request $request, Funds $id)
    {
         //For Readability
         $fund =  $id;
         $fund->delete();
 
         if (request()->expectsJson()) {
             return response(['status' => 'Fund deleted']);
         }
 
         return back();
    }

    public function save(Request $request)
    {
        $this->validate($request,
        [
            'people_id' => 'required',
            'fund_id'   => 'required',
            'method'    => 'required',
            'amount'    => 'required',
            'date'      => 'required',
            'note'      => 'sometimes'
            ]);

        return Contribution::create([
            'person_id' => request('people_id'),
            'funds'     => request('fund_id'),
            'method_id' => request('method'),
            'amount'    => request('amount'),
            'date'      => request('date'),
            'note'      => request('note')
        ]);
    }

}
