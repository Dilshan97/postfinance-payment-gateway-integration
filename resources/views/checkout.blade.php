@extends('layouts.app')

@section('content')

<!--
    The mandatory parameters include
    PSPID,
    ORDERID,
    AMOUNT,
    CURRENCY
    LANGUAGE.
 -->

<?php

    $shaInSignature = 'abcdefghij12345!';

    $params = [
        'PSPID'        => 'ctrlhelpTEST',
        'ORDERID'      => 'INV-' . mt_rand(100000, 999999),
        'AMOUNT'       => (int) 2000 * 100,
        'CURRENCY'     => 'CHF',
        'LANGUAGE'     => 'en_US',
        'CN'           => 'Dilshan Ramesh',
        'EMAIL'        => 'dilshanramesh81@gmail.com',
        'OWNERADDRESS' => '529/2/B Jaya Mawatha, Battaramulla',
        'TITLE'        => 'Invoice',
        'ACCEPTURL'    => env('APP_URL', 'http://localhost') . '/redirct',
        'DECLINEURL'   => env('APP_URL', 'http://localhost') . '/redirct',
        'EXCEPTIONURL' => env('APP_URL', 'http://localhost') . '/redirct',
        'CANCELURL'    => env('APP_URL', 'http://localhost') . '/redirct',
    ];

    $postfinance = new Offline\PaymentGateways\PostFinance($shaInSignature);
    $postfinance->setParamList($params);
?>

<div class="container mt-5">
    <form method="POST" action="https://e-payment.postfinance.ch/ncol/test/orderstandard.asp">
        <?= $postfinance->getFormFields(); ?>

        <div class="row justify-content-center">

            <table class="table">

               <tr>
                   <h3>{{$params['TITLE']}}</h3>
               </tr>

                <tr>
                    <td>Customer Name</td>
                    <td>{{$params['CN']}}</td>
                </tr>

                <tr>
                    <td>Customer E-mail</td>
                    <td>{{$params['EMAIL']}}</td>
                </tr>

                <tr>
                    <td>Customer Address</td>
                    <td>{{$params['OWNERADDRESS']}}</td>
                </tr>

                <tr>
                    <td>PSPID</td>
                    <td>{{$params['PSPID']}}</td>
                </tr>

                <tr>
                    <td>ORDERID</td>
                    <td>{{$params['ORDERID']}}</td>
                </tr>

                <tr>
                    <td>AMOUNT</td>
                    <td>CHF {{$params['AMOUNT'] / 100}}</td>
                </tr>

                <tr>
                    <td>CURRENCY</td>
                    <td>{{$params['CURRENCY']}}</td>
                </tr>

                <tr>
                    <td>LANGUAGE</td>
                    <td>{{$params['LANGUAGE']}}</td>
                </tr>
            </table>

            <button type="submit" class="btn btn-primary">Pay Now</button>
        </div>
    </form>
</div>

@endsection
