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
                <img src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1537151698/website/logo.png" alt="logo">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                <h4>Vers :</h4>
                <address>
                    <strong>{{ $user->firstname }} {{ $user->lastname }}</strong><br>
                    <span>{{ $user->email }}</span> <br>
                    <span>123 Address St.</span>
                </address>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Numéro de facture :</th>
                            <td class="text-right">56</td>
                        </tr>
                        <tr>
                            <th>Date : </th>
                            <td class="text-right">Oct 1, 2018</td>
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
                            <td style="padding: 5px" class="text-right"><strong>600 €</strong></td>
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
                <tr>
                    <td>
                        <div><strong>Fifa 20</strong></div>
                        <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt maiores
                            placeat similique nisi. Nisi ratione, molestias exercitationem illo reiciendis cumque?</p>
                    </td>
                    <td></td>
                    <td class="text-right">300€</td>
                </tr>
                <tr>
                    <td>
                        <div><strong>Fifa 19</strong></div>
                        <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt maiores
                            placeat similique nisi. Nisi ratione, molestias exercitationem illo reiciendis cumque?</p>
                    </td>
                    <td></td>
                    <td class="text-right">300€</td>
                </tr>
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
                            <td style="padding: 5px" class="text-right"><strong>600 €</strong></td>
                        </tr>
                    </tbody>
                </table>
                Merci pour votre achat
            </div>
        </div>
    </div>
</body>

</html>