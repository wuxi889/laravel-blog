<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Laravel Blog')</title>
    <meta name="keywords" content="@yield('keywords', 'Laravel Blog Keywords')">
    <meta name="description" content="@yield('description', 'Laravel Blog description...')">
  </head>
  <body>
    @yield('content')
    @extends('layouts.footer')
  </body>
</html>