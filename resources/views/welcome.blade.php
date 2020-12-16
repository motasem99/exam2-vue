<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel and Vue</title>

        <!-- Fonts -->
        <!-- Styles -->
        <link rel="stylesheet" href="/css/AppTest.css">
    </head>
    <body>
    <header>
        <p>product table</p>
    </header>

       <div id="app">
        <app-test></app-test>
       </div>

       <footer>Footer</footer>

    </body>

    <script src="{{ mix('/js/app.js') }}"></script>

</html>
