<?php
 
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Minstry;
use App\Group;
use App\People;
use App\Followup;
use App\Event;
use App\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class adminUserController extends Controller
{
    protected $redirectTo = '/';
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'firstname' => 'required',
            'lastName' =>'required',
            'mobile_number'   => 'required',
            'role'  => 'required',

        ]);
    }

    public function registered()
    {
        return view('auth.registered');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request $request
     * @return User
     */
    protected function create(Request $request)
    {
        return  User::create([
            'email'     => request('email'),
            'password'  => Hash::make(request('password')),
            'firstname' => request('firstname'),
            'lastName'  => request('lastName'),
            'mobile_number' => request('mobile_number'),
            'role'          => request('role'),
            'ministry'      => Auth::user()->ministrys->id,
        ]);
     }

    //  Get all the users under this ministry
    public function index()
    { 
        $users = User::where('ministry', auth()->user()->ministrys->id)->paginate(20);
        //Return the view
        return $users;
    }

    public function users()
    {

        return view('dashboard.users');
    }

    public function destroy(User $id)       
    {
        //For Readability
        $user =  $id;
        $user->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Usser deleted']);
        }

        return back();
    }

        //update user
        //$id contains all the user details
    public function update(Request $request, User $id)    
    {
    //$this->authorize('update', $thread);
    $this->validate($request,[
        'email'         => 'required|email|max:255|unique:users,email,'.$id->id,
        'password'      => 'sometimes|min:8',
        'firstname'     => 'required',
        'lastName'      =>'required',
        'mobile_number' => 'required',
        'role'          => 'required',

    ]);

    $update = $id->update($request->all());
        if($update){
            return ['message' => 'User updated successfully'];
        }
    
    }
 public function profile(User $id)
 {
    $follow = Followup::where('user_id', $id->id)->get();
    $people = People::where('ministry', auth()->user()->ministrys->id)->get();
    $users = User::where('ministry', auth()->user()->ministrys->id)->get();
    
    $user = User::where('id', $id->id)->first();
    return view('dashboard.user', compact('user', 'follow', 'people', 'users'));
 }

 public function invite(Request $request)
 {
     return "Okay";
 }


}
