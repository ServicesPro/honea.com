<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dump(Cart::count());
        return view('cart.index');
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
        $dupilcates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($dupilcates->isNotEmpty()) {
            return redirect()->route('cart.index');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');

        return redirect()->route('cart.index');
    }

    /**
     * Buy a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        $dupilcates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($dupilcates->isNotEmpty()) {
            return redirect()->route('cart.checkout');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');

        return redirect()->route('cart.checkout');
    }

    // public function empty()
    // {
    //     Cart::destroy();
    // }

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

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function checkout2(Request $request)
    {
        $request->validate([
            'shipping_fullname' => 'required|string',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string',
            'shipping_state' => 'required|string',
            'shipping_zipcode' => 'required|string',
            'shipping_phone' => 'required|digits:8',
        ]);

        $grand_total = ''. Cart::total() .'';

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'shipping_fullname' => $request->shipping_fullname,
            'shipping_address' =>  $request->shipping_address,
            'shipping_city' =>  $request->shipping_city,
            'shipping_state' =>  $request->shipping_state,
            'shipping_zipcode' =>  $request->shipping_zipcode,
            'shipping_phone' =>  $request->shipping_phone,
            'grand_total' => ''. Cart::total() .'',
            "item_count" => Cart::instance('default')->count(),
            'is_paid' => 0,
            'status' => 'pending'
        ]);

        $oderItems = [];

        foreach(Cart::instance('default')->content() as $item) {
            $orderItems[] = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'price' => $item->model->price,
                'quantity'=> $item->qty
            ]);
        }

        dump($orderItems);

        return redirect('/paygate');
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
        $validator= Validator::make($request->all(), [
            'quantity' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back();
    }
}
