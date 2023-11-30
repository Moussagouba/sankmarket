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
                <h2 class="h2font">ajouter une catégorie</h2>
                <form action="{{url('/add_categorie')}}" method="post">
                    @csrf
                    <input type="text" class="border-rounded-3  colorinput" name="name" placeholder="écrivez le nom de la catégorie">
                    <input type="submit" class="btn btn-primary" name="submit" value="ajouter catégorie">
                </form>
            </div>

            <table class="center">

                <tr>
                    <td>Nom de la Catégorie</td>
                    <td>Action</td>
                </tr>
                @foreach ($data as $data )


                <tr>
                    <td>{{$data->name}}</td>
                    <td><a onclick="return confirm('êtes-vous sûre de supprimer cette categorie?')" class="btn btn-danger" href="{{url('delete_categorie',$data->id)}}">Supprimer</a></td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

    </div>

    @include('admin.js')

</body>

</html>