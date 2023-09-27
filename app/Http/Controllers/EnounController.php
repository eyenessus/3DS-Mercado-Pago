<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use MercadoPago\Payment;
use MercadoPago\SDK;

class EnounController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //realizacao de pagamento
        SDK::setAccessToken(env('MERCADDOPAGOA_ACESS_TOKEN'));
        $payment = new Payment();
        $payment->transaction_amount = $request->transactionAmount;
        $payment->token = $request->token;
        $payment->description = $request->description;
        $payment->installments = $request->installments;
        $payment->payment_method_id = $request->paymentMethodId;
        $payment->payer = array(
          "email" => $request->email
        );
        $payment->three_d_secure_mode = "optional";
        $payment->save();
        $response = array(
            'three_ds_info' => $payment->three_ds_info,
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
        return response()->json($response);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
