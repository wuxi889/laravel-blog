@extends('layouts.header')
@section('content')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <h5>
      @if ($article->original)
      原创作者：
      @else
      转载自：
      @endif
      {{ $article->author }} / {{ $article->created_at }}
    </h5>
    <p>文章分类：<a href="{{ route('category.index', ['id' => $article->category_id]) }}">{{ $article->category->name }}</a></p>
    <hr>
    {!! nl2br(e($article->content->content)) !!}
    <hr>
      标签：
      @foreach ($article->tags as $tag)
        <a href="{{ route('tag.index', ['id' => $tag->id]) }}">{{ $tag->name }}</a> &nbsp;
      @endforeach
    <hr>
    <button class="btn btn-primary" onclick="history.go(-1)">
        « 上一页
    </button>
</div>
@stop