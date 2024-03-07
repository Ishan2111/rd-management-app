<!DOCTYPE html>
<html lang="en">

<head>
    <title>RD Management App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{ asset('js/min.js') }}"></script>

</head>

<body>

    <div class="container-fluid">
        @yield('content')
    </div>

</body>

</html>
