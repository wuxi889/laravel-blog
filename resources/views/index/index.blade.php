@extends('layouts.header')
@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-9">
      <h1 style="margin: 20px 0;">最新文章</h1>
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
    </div>
    <div class="col-md-3" style="margin-top: 20px">
    <a href="javascript:;" class="list-group-item active">
      文章分类
    </a>
    @foreach ($categories as $category)
    <a href="{{ route('category.list', ['id' => $category->id]) }}" class="list-group-item">{{ $category->name }} ({{ $category->articles_count }})</a>
    @endforeach
    </div>
  </div>
  </div>
@stop