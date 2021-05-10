<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FullStack Blog</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
        <script>
            (function() {
                window.Laravel = {
                  csrfToken: '{{ csrf_token() }}'  
                };
            })();

            // --- Setting user detail in local storage
            var userDetail;
            @if(Auth::check())
                userDetail =  @json(Auth::user())
            @endif

            localStorage.setItem("user", JSON.stringify(userDetail));
        </script>
    </head>
    <body>
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
