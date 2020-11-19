<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
        'user_id' => 'required',
        'note' => 'required'
    ]); 

    return  Note::create([
        'user_id'  => request('user_id'),
        'note'    =>  request('note'),
        'creator' => auth()->user()->id
    ]);

    }

    public function index($id)
    {
        return Note::where('user_id', $id)->get();
    }

    public function update(Request $request, Note $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
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
    public function destroy(Note $id)
    {
        $note =  $id;
        $note->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Note deleted']);
        }

        return back();
    }
}
