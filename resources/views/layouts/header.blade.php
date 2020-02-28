<!DOCTYPE html>
<html>
  <head>
    <title>{{ $title ?? 'Laravel Blog'}} - {{ config('blog.title') }}</title>
    <meta name="keywords" content="{{ config('blog.keywords') }}">
    <meta name="description" content="{{ config('blog.description') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">{{ config('blog.title') }}</a>
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item"><a class="nav-link" href="/about">关于</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">联系</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ env('APP_ADMIN_URL') }}">登录</a></li>
        </ul>
      </div>
    </nav>
    @yield('content')
    @extends('layouts.footer')
  </body>
</html>