<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve items from cart session
        $items = session()->get('cart', []);
    
        // Calculate total price
        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
    
        // Pass items and total price to view
        return view('cart')->with([
            'barang' => $items,
            'totalPrice' => $totalPrice,
        ]);
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
            'quantity' => $itemQuantity
        ];
        session()->put('cart', $cart);
    
        // Redirect to cart page
        return redirect()->route('cart');
    }

    public function clear(Request $request)
    {
        // Clear cart session
        session()->forget('cart');

        // Redirect to cart page
        return redirect()->route('cart');
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
    public function update(Request $request)
    {
      // retrieve the new quantities from the request
      $quantities = $request->input('quantity');
    
      // update the cart with the new quantities
      $cart = session()->get('cart', []);
      foreach ($cart as $item) {
        $item->quantity = $quantities;
        $item->save();
      }
    
      // redirect back to the cart page
      return redirect('/cart');
    }

    public function checkout(Request $request)
    {
    // process the checkout

    // redirect to the confirmation page
    return redirect('/confirmation');
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
