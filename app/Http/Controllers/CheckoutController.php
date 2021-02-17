<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function redirct()
    {
        $shaOutSignature = '?SAFE&&%%burnnatulan?';

        $shaSign = isset($_GET['SHASIGN']) ? $_GET['SHASIGN'] : '';

        $postfinance = new PostFinance($shaOutSignature);

        $postfinance->setParamList($_GET);

        $isValid = $postfinance->getDigest() === $shaSign;

        if($isValid){
            if($_GET['STATUS'] == 5 || $_GET['STATUS'] == 4 || $_GET['STATUS'] == 9  ){
                $this->store_data( $_GET);
                Flash::info('Your payment is authorised');
                //return view('auth.dashboard.subscriber');
                // return redirect()->action('AdminController@subscriber');
            }else{
                // return view('auth.dashboard.subscriber.invoice_thanks');
            }
        }else{
            // return view('auth.dashboard.subscriber.invoice_thanks');
        }
    }

}
