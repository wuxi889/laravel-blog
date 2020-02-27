@extends('layouts.header')
@section('content')
<div class="container">
    <h1 style="margin: 20px 0;"><i>{{ $category->name }}</i> 分类</h1>
    <h5>第 {{ $articles->currentPage() }} 页，共计 {{ $articles->lastPage() }}页</h5>
    <hr>
      <ul class="list-group">
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('article.content', ['id' => $article->id]) }}"><h5>{{ $article->title }}</h5></a>
                <span class="badge">{{ $article->created_at }}</span>
                  <p class="list-group-item-text">
                      {{ $article->description }}
                  </p>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $articles->render() !!}
</div>
@stop
