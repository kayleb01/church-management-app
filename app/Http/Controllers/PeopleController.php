<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\User;
    use App\Group;
    use App\People;
    use App\People_notes;
    use Image;
    use Illuminate\Support\Facades\Storage;


    class PeopleController extends Controller
    {
    /**
         * Display a listing of the people.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $groups = Group::get();
            return view('dashboard.people', compact('groups'));

        }

        /**
         * Store a newly created people in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request,[
                'image' => 'sometimes',
                'first_name' => 'sometimes',
                'last_name' => 'sometimes',
                'middle_name'  => 'sometimes',
                'email' => 'required|unique:peoples',
                'date_of_birth'  => 'sometimes',
                'address' => 'sometimes',
                'state' => 'sometimes',
                'city' => 'sometimes',
                'gender' => 'sometimes',
                'mobile_number'  => 'sometimes',
                'group_id'  => 'sometimes',
                'job_title' => 'sometimes',
                'employer'  => 'sometimes',
                'talent'  => 'sometimes',
                'school'  => 'sometimes',
                'grade' => 'sometimes',
                'marital_status' => 'sometimes',
                'join_date' => 'sometimes'
            ]);
            //upload the avatar using Intervention
            // $originalImage  = $request->file('image');
            // $avatar         = Image::make($originalImage);
            // $path           = public_path()."/storage/img/";
            // $avatar->resize(200,200, function($constraint){
            //     $constraint->aspectratio();
            //     $constraint->upsize();
            // });
            // $file_name = $path.time().$originalImage->getClientOriginalName();
            // $avatar->save($file_name);
            // $file = $request->file;
            // return ($file);
            // $file->store('media/'.now()->format('Y').'/'.now()->format('m'), 'public');
            //then save the data
            return  People::create([
                'first_name'    => request('first_name'),
                'ministry'      => auth()->user()->ministrys->id,
                'last_name'     => request('last_name'),
                'middle_name'   => request('middle_name'),
                'email'         => request('email'),
                'date_of_birth' => request('date_of_birth'),
                'address'       => request('address'),
                'state'         => request('state'),
                'city'          => request('city'),
                'group_id'      => request('group_id'),
                'gender'        => request('gender'),
                'mobile_number' => request('mobile_number'),
                'group_id'      => request('group_id'),
                'job_title'     => request('job_title'),
                'employer'      => request('employer'),
                'talent'        => request('talent'),
                'school'        => request('school'),
                'grade'         => request('grade'),
                'marital_status' => request('marital_status'),
                'join_date'     => request('join_date')
            ]);
        }

        /**
         * Display the specified people.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show()
        {
            return People::where('ministry', auth()->user()->ministrys->id)->paginate(30);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, People $id)
        {
                    //$this->authorize('update', $thread);
        $this->validate($request,[
            'first_name'    => 'sometimes',
            'last_name'     => 'sometimes',
            'middle_name'   => 'sometimes',
            'email'         => 'required|unique:peoples',
            'date_of_birth'  => 'sometimes',
            'address'       => 'sometimes',
            'state'         => 'sometimes',
            'city'          => 'sometimes',
            'group_id'       => 'sometimes',
            'gender'        => 'sometimes',
            'mobile_number'  => 'sometimes',
            'facebook'      => 'sometimes',
            'group_id'      => 'sometimes',
            'job_title'     => 'sometimes',
            'employer'      => 'sometimes',
            'talent'        => 'sometimes',
            'school'        => 'sometimes',
            'grade'         => 'sometimes',
            'marital_status' => 'sometimes',
            'join_date'     => 'sometimes'
        ]);
        $update = $id->update($request->all());
            if($update){
                return ['message' => 'person updated successfully'];
            }
        }

        public function details($id)
        {
            //for readability
            $person = People::with('ministri')->where('id', $id)->first();

            return view('dashboard.person', compact('person'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(People $id)
        {
            //For readability
            $people =  $id;
            $people->delete();

            if (request()->expectsJson()) {
                return response(['status' => 'Group deleted']);
            }

            return back();
        }



        //Persons Note

    public function put(Request $request)
    {
        $this->validate($request,[
        'note_peep_id' => 'required',
        'note' => 'required'
    ]);

    return  People_notes::create([
        'people_id'  => request('note_peep_id'),
        'note'    =>  request('note'),
        'creator' => auth()->user()->id
    ]);

    }

    public function notes($id)
    {
        return People_notes::where('people_id', $id)->get();
    }

    public function update_note(Request $request, Note $id)
    {
        $this->validate($request, [
            'people_id' => 'required',
            'note' => 'required',
        ]);

        $update = $id->update($request->all());

        if($update){
            return ['message' => 'Note updated successfully'];
        }
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy_note(People_notes $id)
    {
        $note =  $id;
        $note->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Note deleted']);
        }

        return back();
    }

/**
 * upload image to the dir and input the name to database.
 *
 * @param  File  $file
 * @return \Illuminate\Http\Response
 */
public function imageUpload(Request $request)
{
    //
}

}
