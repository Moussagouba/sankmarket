<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sankmarket Admin</title>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .colorinput {
            color: black;
        }

        .center {
            margin: auto;
            text-align: center;
            width: 50%;
            margin-top: 20px;
            border: 3px solid white;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
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
            <div class="div_center">
                <h2 class="h2font">ajouter un produit</h2>
                <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="title">Nom du Produit : </label>
                        <input type="text" class="border-rounded-3  colorinput" name="title" placeholder="écrivez le nom de votre produit" required="">

                    </div>
                    <div class="div_design">
                        <label for="description">Description du Produit : </label>
                        <input type="text" class="border-rounded-3  colorinput" name="description" placeholder="décrivez le produit" required="">

                    </div>

                    <div class="div_design">
                        <label for="price">Prix du Produit : </label>
                        <input type="number" class="border-rounded-3  colorinput" name="price" placeholder="prix du produit" required="">

                    </div>
                    <div class="div_design">
                        <label for="discount_price">Prix du Discount : </label>
                        <input type="number" class="border-rounded-3  colorinput" name="discount_price" placeholder="prix du discount pour le produit">

                    </div>
                    <div class="div_design">
                        <label for="price">Quantité du Produit : </label>
                        <input type="number" class="border-rounded-3  colorinput" min="0" name="quantity" placeholder="entrez le stock du produit" required="">

                    </div>
                    <div class="div_design">
                        <label for="categorie">Catégorie du produit : </label>
                        <select class="border-rounded-3  colorinput" name="categorie" id="" required="">

                            <option value="" selected="">ajouter une categorie</option>
                            @foreach ($category as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="div_design">
                        <label for="price">Image du Produit : </label>

                        <input type="file" class="border-rounded-3  colorinput" min="0" name="image" placeholder="selectioner une image" required="">
                    </div>
                    <div class="div_design">
                        <input type="submit" value="enregistrer le produit" class="btn btn-primary">
                    </div>
                </form>
            </div>


        </div>

    </div>

    </div>

    @include('admin.js')

</body>

</html>