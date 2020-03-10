<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Documents;
use Carbon\Carbon;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $opts = Documents::$options;
        $avatar = Storage::url($user->avatar);
        return view('participant.index', ['user' => $user, 'avatar' => $avatar, 'options' => $opts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function uploadDocuments(Request $request)
    {

        $participant = \Auth::user();
        $first_name = explode(" ", $participant->name)[0];
        $birthd = Carbon::parse($participant->birthdate)->format('d-m-Y');

        foreach ($request->file() as $opt => $item) {
            $old_doc = $participant->documents()->where('types', $opt)->first();

            if ($old_doc) {
                Storage::delete($old_doc->name);
                $old_doc->delete();
            }
            $new_doc = new Documents;
            $filename = $birthd . '-' . $first_name . '-' . $opt . '.' . $item->getClientOriginalExtension();
            $new_doc->name = $filename;
            $new_doc->types = $opt;
            $new_doc->old_name = $item->getClientOriginalName();
            Storage::putFileAs($opt, $item, $filename);
            $participant->documents()->save($new_doc);
        }
        return redirect('/peserta');

        // foreach ($request->file() as $type => $item) {

        //     $filename = Carbon::parse($participant->birthdate)->format('d-m-Y') . '_' . $first_name . '_' . date('d-m-Y') . '_' . $type . '.' . $item->getClientOriginalExtension();

        //     if ($participant->documents->firstWhere('types', $type)) {
        //         $old_doc = Documents::where('user_id', $participant->id)->where('types', $type)->first();
        //         if (Storage::exists($type . '/' . $old_doc->name)) {
        //             Storage::delete($type . '/' . $old_doc->name);
        //         }

        //         $old_doc->update([
        //             'name' => $filename,
        //             'types' => $type,
        //             'old_name' => $item->getClientOriginalName()
        //         ]);

        //         $request->file($type)->storeAs($type, $filename);
        //     } else {
        //         $new_doc = new Documents();
        //         $new_doc->name = $filename;
        //         $new_doc->types = $type;
        //         $new_doc->old_name = $item->getClientOriginalName();
        //         $request->file($type)->storeAs($type, $filename);
        //         $participant->documents()->save($new_doc);
        //     }
        // }
        // return redirect('/peserta');
    }
}
