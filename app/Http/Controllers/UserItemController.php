<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Item;
use App\UserItem;
use App\User;
use DB;

class UserItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_items = DB::table('user_items')
        ->join('items', 'user_items.item_id', '=', 'items.id')
        ->get(['user_items.id', 'items.name', 'user_items.price', 'user_items.thumbnail']);

        return view('me.profile', ['user_items' => $user_items]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // Method pluck neemt alle values van 1 column
        // Zet deze list btw in ALFABETISCHE volgorde
        // Ook maak van deze input een "search input" zoals bij legum.
        $item_names = Item::orderBy('name', 'asc')->pluck('name');
        return view('item.create', ['item_names' => $item_names]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // TODO: Make all optional fields in table nullable (for example description)
        // TODO: Make a form validation method and input all our fields in it
        // TODO get category id if category input is not empty, otherwise obviously leave null
        $input_name = $request->input('item_names');
        $input_description = $request->input('description');
        $input_price = $request->input('price');
        $input_image = $request->file('thumbnail');

        // Get name of image and move ACTUAL image
        $image_name = time()."-".$input_image->getClientOriginalName();
        $input_image->move('uploads/user-items', $image_name);
        $image_path = asset('uploads/user-items') . '/' . $image_name;

        // Get item name id by name
        $item_id = Item::where('name', $input_name)->pluck('id')->first();

        UserItem::create([
            'description' => $input_description,
            'thumbnail' => $image_path, // TODO: Verander dit naar echte img
            'price' => $input_price,
            'item_id' => $item_id, 
            'user_id' => Auth::user()->id
            ]);

        // Redirect to page where personal items are
        return redirect(url('me/profile'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        echo "Here comes the show page!";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        echo "Here comes the edit page!";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // TODO: DELETE ACTUAL IMAGE IN UPLOAD FOLDER (SO GET THE IMAGE NAME AND DELETE THAT ONE)
        // ANDERS GAAT ONZE SERVER BINNEN DE KORSTE KEREN NATUURLIJK VOL STAAN
        UserItem::find($id)->delete();
        return ['redirect' => url('me/profile')];
    }
}