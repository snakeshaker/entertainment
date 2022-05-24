<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    private $terminalID   = '67e34d63-102f-4bd1-898e-370781d0074d';
    private $clientID     = 'test';
    private $clientSecret = 'yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG';
    private $url          = 'https://testoauth.homebank.kz/epay2/oauth2/token';

    public function getTokenForPayment(Request $request)
    {
        $response = Http::asForm()->post('https://testoauth.homebank.kz/epay2/oauth2/token', [
            'grant_type'       => "client_credentials",
            'scope'            => "payment",
            'client_id'        => $this->clientID,
            'client_secret'    => $this->clientSecret,
            'invoiceID'        => $request->order,
            'amount'           => $request->amount,
            'currency'         => "KZT",
            'terminal'         => $this->terminalID,
            'postLink'         => "",
            'failurePostLink'  => ""
        ]);

        return json_decode($response);
    }

}
