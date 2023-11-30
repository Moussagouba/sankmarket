<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sankmarket Admin</title>
    @include('admin.css')
    <style type="text/css">
        .center {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
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
    </style>
</head>

<body>
    <div class="container-scroller">

        @include('admin.sidebar')

        @include('admin.navbar')

        <div class="main-panel">
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                {{ session()->get('message') }}
            </div>
            @endif
            <div>
                <h2 class="font">Tout les produits</h2>
                <table class="center">
                    <tr class="bg">
                        <th class="th_deg">Nom </th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Catégorie</th>
                        <th class="th_deg">Prix</th>
                        <th class="th_deg">Quantité en stock</th>
                        <th class="th_deg">Prix du discount</th>
                        <th class="th_deg">Image </th>
                        <th class="th_deg">Modifier</th>
                        <th class="th_deg">Supprimer</th>

                    </tr>
                    @foreach ($product as $product )


                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->categorie}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="imagex" src="/product/{{$product->image}}" alt="{{$product->title}}" srcset="">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('êtes-vous sûre de supprimer ce produit?')" href="{{url('supprimer',$product->id)}}">supprimer</a>
                        </td>
                        <td><a class="btn btn-primary" href="{{url('update_product', $product->id)}}">éditer</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

    </div>

    @include('admin.js')

</body>

</html>