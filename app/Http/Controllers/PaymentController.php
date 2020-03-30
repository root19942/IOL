<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Paiement;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * store transaction
     *
     * @param Json $details
     * @return Response
     */
    public function store($details)
    {
        $transaction = Transaction::create([
            "details" => $details
        ]);
        $payment = Paiement::create([
            "user_id" => Auth::user()->id,
            "transaction" => $transaction->id,
            "status" => $details->status
        ]);

         return redirect()->route('accueilVide');
    }

}
