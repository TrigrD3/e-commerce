<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if the authenticated user is logged in...
        if (Auth::check()) {
            // Check if the authenticated user is also in the pegawai table...
            $user = Auth::user();
            $pegawai = Pegawai::where('user_id', $user->id)->first();
            if ($pegawai) {
                $items = new Item();
    
                $data = [
                    'items' => $items->getAllItems()
                ];
                // The authenticated user is in the pegawai table, so show the page...
                return view('admin.items.index', $data);
            } else {
                // The authenticated user is not in the pegawai table, so set flash session variables and redirect to the login page...
                Session::flash('message', 'You must be a pegawai to view this page.');
                Session::flash('alert-type', 'warning');
                
                return redirect()->route('login');
                ?>
                <script>
                    Swal.fire({
                    title: 'Warning',
                    text: '<%= session[:message] %>',
                    icon: 'warning'
                    });
                </script>
                <?php
            }
        }
    
        // The user is not authenticated, so redirect to the login page...
        return redirect()->route('login');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::check()) {
            // Check if the authenticated user is also in the pegawai table...
            $user = Auth::user();
            $pegawai = Pegawai::where('user_id', $user->id)->first();
            if ($pegawai) {

                // The authenticated user is in the pegawai table, so show the page...
                $item = new Item();
                return view('admin.items.create', compact('item'));
            }
        }
        Session::flash('message', 'You must be a pegawai to view this page.');
        Session::flash('alert-type', 'warning');
        // The user is not authenticated or is not in the pegawai table, so redirect to the login page...
        return redirect()->route('login');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
        $item->name = request('name');
        $item->price = request('price');
        $item->stock = request('stock');
        $item->img = request('img');
        $item->description = request('description');
        $item->save();

        return redirect('/admin/items/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = new Item();
        $item = Item::find($id);
        if ($item === null) {
            abort(404, "No book has been found.");
        }
        // use compact() to pass the variable to the view
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    if (Auth::check()) {
        // Check if the authenticated user is also in the pegawai table...
        $user = Auth::user();
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        if ($pegawai) {

            // The authenticated user is in the pegawai table, so show the page...
            $item = new Item();
            $item = Item::find($id);
            if ($item === null) {
                abort(404, "No item has been found.");
            }
    
            return view('admin.items.edit', compact('item'));
        }
    }
    Session::flash('message', 'You must be a pegawai to view this page.');
    Session::flash('alert-type', 'warning');
    // The user is not authenticated or is not in the pegawai table, so redirect to the login page...
    return redirect()->route('login');

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
        // update item
        $item = new Item();
        $item = Item::find($id);
        if ($item === null) {
            abort(404, "No item has been found.");
        }

        $item->name = request('name');
        $item->price = request('price');
        $item->stock = request('stock');
        $item->description = request('description');
        $item->save();

        return redirect()->route('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    if (Auth::check()) {
        // Check if the authenticated user is also in the pegawai table...
        $user = Auth::user();
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        if ($pegawai) {

            // The authenticated user is in the pegawai table, so show the page...
            $item = new Item();
            $item = Item::find($id);
            if ($item === null) {
                abort(404, "No item has been found.");
            }
    
            $item->delete();
            return redirect()->route('items');
        }
    }
    Session::flash('message', 'You must be a pegawai to view this page.');
    Session::flash('alert-type', 'warning');
    // The user is not authenticated or is not in the pegawai table, so redirect to the login page...
    return redirect()->route('login');

    }
}
