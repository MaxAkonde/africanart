<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Http\Requests\Payment\UpdatePaymentRequest;

class PaymentController extends Controller
{
    private $active;

    public function __construct()
    {
        $this->middleware('auth');
        $this->active = "payments";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->get();
        return view('admin.payments.index', [
            'payments' => $payments,
            'active' => $this->active,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payments.create', [
            'active' => $this->active,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $payment = new Payment();
        $payment->name = $request->name;
        $payment->slug = Str::slug($payment->name);

        $payment->save();

        return redirect()->route('admin.payments.index')->with('status', $request->name . ' a été enregistrer avec succes !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', [
            'payment' => $payment,
            'active' => $this->active
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('admin.payments.index')->with('status', $request->name . ' a été modifier avec success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $name = $payment->name;

        $payment->delete();

        return redirect()->route('admin.countries.index')->with('status', "Le pays " . $name . " vient d'être supprimer !");
    }
}
