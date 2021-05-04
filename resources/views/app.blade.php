<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" >

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
    
    <!-- Scripts -->
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body class="antialiased">
    @inertia
  </body>
</html>