<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
  @stack('styles')
</head>

<body>
  <noscript>You need to enable JavaScript to run this app.</noscript>
  @yield('content')
  <script src="{{ mix('/js/app.js') }}" defer></script>
  @stack('scripts')
</body>

</html>
