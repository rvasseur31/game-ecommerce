<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Facture</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>

<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <h4>Depuis :</h4>
                <strong>Trackmania Inc.</strong><br>
                22 Impasse Charles Fourier<br>
                France, Toulouse - 31200<br>
                P: 0 800 60 06 33 <br>
                E: trackmania@ynov.com <br>

                <br>
            </div>

            <div class="col-xs-4">
                <img src="{{ asset('assets/logo2.png') }}" alt="logo">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                <h4>Vers :</h4>
                <address>
                    <strong>{{ $user->firstname }} {{ $user->lastname }}</strong><br>
                    <span>{{ $user->email }}</span><br>
                    <span>{{ $order->address }}, {{ $order->sub_address }}</span><br>
                    <span>{{ $order->country }}, {{ $order->state }}, {{ $order->zip }}</span>
                </address>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Numéro de facture :</th>
                            <td class="text-right">{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Date : </th>
                            <td class="text-right">{{ $order->created_at }}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

                <table style="width: 100%; margin-bottom: 20px">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px">
                                <div>Total (€) :</div>
                            </th>
                            <td style="padding: 5px" class="text-right"><strong>{{ $totalPrice }} €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>Produits :</th>
                    <th></th>
                    <th class="text-right">Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activationKeys as $activationKey)
                <tr>
                    <td>
                        <div><strong>{{ $activationKey->title }}</strong></div>
                        <p>{{ $activationKey->description }}</p>
                        <p>Clé d'activation : {{ $activationKey->activation_key }}</p>
                    </td>
                    <td></td>
                    <td class="text-right">{{ $activationKey->price }}€</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-xs-6"></div>
            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px">
                                <div>Total (€) :</div>
                            </th>
                            <td style="padding: 5px" class="text-right"><strong>{{ $totalPrice }} €</strong></td>
                        </tr>
                    </tbody>
                </table>
                Merci pour votre achat
            </div>
        </div>
    </div>
</body>

</html>