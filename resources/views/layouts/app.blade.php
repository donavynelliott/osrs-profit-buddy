<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Runescape Profit Buddy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>    

    <!-- Styles -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <main class="d-flex flex-nowrap">
        @include('layouts.sidebar')

        <div class="container-fluid navbar-container">
            @include('layouts.navbar')
            <div class="container-fluid">
                <h2 class="pb-2 border-bottom pt-2">@yield('title')</h2>
                @yield('content')
            </div>
        </div>
    </main>
</body>

</html>