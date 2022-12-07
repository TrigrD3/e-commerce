<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = new Item();

        $data = [
            'items' => $items->getAllItems()
        ];
        return view('admin.items.index', $data);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();
        return view('admin.items.create', compact('item'));
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
        $item = new Item();
        $item = Item::find($id);
        if ($item === null) {
            abort(404, "No item has been found.");
        }

        return view('admin.items.edit', compact('item'));
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
        $item = new Item();
        $item = Item::find($id);
        if ($item === null) {
            abort(404, "No item has been found.");
        }

        $item->delete();
        return redirect()->route('items');
    }
}
