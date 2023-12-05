<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <style type="text/css">
        .center,
        .cent {
            margin: auto;
            width: 70%;
            text-align: center;
            margin-top: 30px;
        }

        .centero {
            margin: auto;
            width: 70%;
            text-align: center;
            margin-bottom: 10px;
        }

        .font {
            font-size: 40px;
            text-align: center;
            padding-top: 20px;
        }

        .imagex {
            width: 94px;
            height: 103px;
        }

        .bg {
            background: skyblue;
        }

        .th_deg {
            padding: 20px;
        }

        table,
        th,
        td {
            border: 1px solid gray;
        }

        .total {
            font-size: 20px;
            padding: 40px;
        }
    </style>
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">

        @include('home.header')

        <div class="center">
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div>
            <table class="center">
                <tr class="bg">
                    <th class="th_deg">Nom du produit </th>
                    <th class="th_deg">Prix</th>
                    <th class="th_deg">Quantité</th>
                    <th class="th_deg">Image </th>
                    <th class="th_deg">Action</th>
                </tr>
                <?php $totalprice = 0; ?>
                @foreach ($cart as $cart)


                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->price}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>
                        <img class="imagex" src="/product/{{$cart->image}}" alt="{{$cart->product_title}}" srcset="">
                    </td>
                    <td><a class="btn btn-danger" onclick="return confirm('êtes-vous sûre de rétirer ce produit?')" href="{{url('remove_cart', $cart->id)}}">Supprimer</a></td>

                </tr>
                <?php $totalprice = $totalprice + $cart->price; ?>

                @endforeach
            </table>
            <div class="cent">
                <h1 class="total"> Somme Total :{{ $totalprice }} Fcfa </h1>
            </div>
            <div class="centero">
                <h1 style="font-size: 25px;padding-bottom : 15px;">Proceder au payment</h1>
                <a href="{{url('cash_order')}}" class="btn btn-danger">Payer à la livraison</a>
                <a href="{{url('stripe', $totalprice)}}" class="btn btn-danger">Payer par carte bancaire</a>

            </div>



        </div>



        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>