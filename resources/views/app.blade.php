<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}" defer></script>

        <title>Trello Clone</title>

    </head>
    <body class="h-screen text-gray-800">
        <div id="app" class="h-full">
            <Board></Board>
        </div> 
    </body>
</html>
