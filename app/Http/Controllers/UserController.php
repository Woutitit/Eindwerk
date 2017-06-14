<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\UserItem;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    public function details() {
        $user_details = User::find(Auth::id())->first();

        return view('profile.details', ['user_details' => $user_details]);
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
    public function store(Request $request) {



        // TODO: Here we only have to validate the values but we should only check on the
        // name and email fields wether they are legit or not empty
        // The tel and adres can be null so if they are we simply store there value which would be null
        // (So we have to make those fields nullable tho)
        // TODO: Actually we should do a "PUT" request, but since we're in a form this shouldn't be too hard
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user_details = User::find($id);

        $user_items =  UserItem::where("user_id", $id)
        ->join('items', 'user_items.item_id', '=', 'items.id')
        ->get(["items.name", "user_items.thumbnail", "user_items.id"]);
        return view('user.show', ['user_details' => $user_details, 'user_items' => $user_items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user_details = User::find($id)->first();

        return view('user.edit', ['user_details' => $user_details]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $messages = [
        'name.required' => 'Vul een naam in.',
        'email.required' => 'Vul een email in.',
        'email.email' => 'Jou email moet geldig zijn.',
        'tel.regex' => 'Jou telefoonnummer moet geldig zijn.'
        ];

        // Note: tel is not required but if filled in make sure it's correct
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
            'tel' => 'regex:/^(\+32)[0-9]{9}$/'
            ],$messages);

        if ($validator->fails()) {
            return redirect(url('profile/details'))
            ->withErrors($validator)
            ->withInput();

        } else {
            $user_name = $request->input('name');
            $user_email = $request->input('email');
            $user_tel = $request->input('tel');
            $user_streetName = $request->input('streetName');
            $user_houseNumber = $request->input('houseNumber');
            $user_locality = $request->input('locality');
            $user_zip = $request->input('zip');

        // So what we could do is just check which fields are not empty and ony validate those
            $user = User::find($id);

            $user->name = $user_name;
            $user->email = $user_email;
            $user->tel = $user_tel;
            $user->street = $user_streetName;
            $user->number = $user_houseNumber;
            $user->locality =  $user_locality;
            $user->zip = $user_zip;
            $user->save();

        // If errors redirect to edit screen, otherwise return to profile again
        // return redirect(url('user/' . Auth::id() . '/edit'));
            return redirect(url('profile/details'));

        }   
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
}
