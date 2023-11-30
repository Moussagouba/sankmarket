<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sankmarket Admin</title>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">

        @include('admin.sidebar')

        @include('admin.navbar')

        <div class="main-panel">
            @include('admin.content')

            @include('admin.footer')

        </div>

    </div>

    </div>

    @include('admin.js')

</body>

</html>