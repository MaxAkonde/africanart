<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\SendMail;
use App\Models\Country;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Order\StoreOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(15);
        return view('admin.orders.index', [
            'orders' => $orders,
            'active' => 'orders',
        ]);
    }

    public function confirmation($codepin)
    {
        $order = Order::where('pincode', '=', $codepin)->firstOrFail();
        return view('pages.order.confirmation', [
            'order' => $order,
        ]);
    }



    public function tracking()
    {
        return view('pages.order.tracking');
    }

    public function findOrder(Request $request)
    {
        //dd($request);
        $order = DB::table('orders')
            ->where('pincode', $request->order)
            ->where('email', $request->email)
            ->get();
        if (count($order)) {
            return redirect()->route('confirmation', $request->order);
        }

        return redirect()->route('tracking')->with('status', 'Veuillez entrer des informations');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payments = Payment::all();
        $countries = Country::all();
        return view('pages.checkout', [
            'countries' => $countries,
            'payments' => $payments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $cart_content = Cart::content();

        $array = [];
        foreach ($cart_content as $item) {
            $array[$item->id] = ['qty' => $item->qty, 'total' => $item->price * $item->qty];
        }

        $amout = str_replace(' ', '', Cart::total());

        $data = [];

        $data['products'] = Cart::content();

        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $shipping = 0;

        Cart::destroy();


        $order = new Order;

        $order->pincode = uniqid();
        $data['pincode'] = $order->pincode;
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->company = $request->company;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->message = $request->message;
        $order->status = 0;
        $order->country_id = $request->country;
        $order->amount = $amout;

        $order->subtotal = $subtotal;
        $order->tax = $tax;
        $order->shipping = $shipping;

        $order->payment_id = $request->payment;

        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
        }

        $order->save();

        $order->products()->attach($array);

        $data['order'] = $order;

        Mail::to('support@africanart.fr')->send(new SendMail($data));

        return redirect()->route('confirmation', $order->pincode);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', [
            'order' => $order,
            'active' => 'orders',
            'active' => 'orders'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
