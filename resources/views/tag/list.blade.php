@extends('layouts.header')
@section('content')
<div class="container">
  <h1>{{ $tag->name }}</h1>
  <h5>第 {{ $articles->currentPage() }} 页，共计 {{ $articles->lastPage() }}页</h5>
  <hr>
  <ul>
    @foreach ($articles as $article)
      <li>
        <a href="{{ route('article.content', ['id' => $article->id]) }}">{{ $article->title }}</a>
        <em>({{ $article->created_at }})</em>
        <p>
          {{ $article->description }}
        </p>
      </li>
    @endforeach
  </ul>
  <hr>
  {!! $articles->render() !!}
</div>
@stop