<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Laravel Blog')</title>
    <meta name="keywords" content="@yield('keywords', 'Laravel Blog Keywords')">
    <meta name="description" content="@yield('description', 'Laravel Blog description...')">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">@yield('cfg.name', 'Laravel Blog')</a>
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item"><a class="nav-link" href="/about">关于</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">联系</a></li>
          <li class="nav-item" ><a class="nav-link" href="#">登录</a></li>
        </ul>
      </div>
    </nav>
    @yield('content')
    @extends('layouts.footer')
  </body>
</html>