<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->check()){
            return redirect(route('login'));
        }
        $this->makePagseguroSession();

        $total = session()->get('total');
        return view('checkout', compact('total'));
    }

    private function makePagseguroSession(){

        if (!session()->has('pagseguro_session_code')){

            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            session()->put('pagseguro_session_code', $sessionCode->getResult());
            return $sessionCode->getResult();
        }

        return null;
    }
}
