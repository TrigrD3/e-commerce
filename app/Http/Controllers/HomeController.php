<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = new Item();
        $data = [
            'items' => $items->getAllItems()
        ];
        return view('home', $data);
    }

    public function index2()
    {
        $items = new Item();
        $data = [
            'items' => $items->getAllItems()
        ];
        return view('welcome', $data);
    }

    public function add(Request $request)
    {
        // Retrieve item data from request
        $itemId = $request->input('id');
        $itemName = $request->input('name');
        $itemPrice = $request->input('price');
        $itemQuantity = $request->input('quantity');
    
        // Add item to cart session
        $cart = session()->get('cart', []);
        $cart[] = [
            'id' => $itemId,
            'name' => $itemName,
            'price' => $itemPrice,
            'stock' => --$itemQuantity
        ];
        session()->put('cart', $cart);
    
        // Redirect to cart page
        return redirect()->route('cart');
    }
    


    public function show($id)
    {
        $item = new Item();
        $item = Item::find($id);
        if ($item === null) {
            abort(404, "No book has been found.");
        }
        // use compact() to pass the variable to the view
        return view('home', compact('item'));
    }
}
