@extends('layouts.header')
@section('content')
<div class="container">
    <h1 style="margin: 20px 0;">{{ $article->title }}</h1>
    <h5>
      @if ($article->original)
      原创作者：
      @else
      转载自：
      @endif
      {{ $article->author }}
    </h5>
    <h5>发布时间： {{ $article->created_at }}</h5>
    <h5>文章分类： <a href="{{ route('index.category.index', ['id' => $article->category_id]) }}">{{ $article->category->name }}</a></h5>
    <hr>
    文章摘要: {{ $article->description }}
    <hr>
    <h5>
      文章内容
    </h5>
    {!! nl2br(e($article->content->content)) !!}
    <hr>
    <h5>
      标签
    </h5>
      @foreach ($article->tags as $tag)
        <a href="{{ route('index.tag.index', ['id' => $tag->id]) }}">{{ $tag->name }}</a> &nbsp;
      @endforeach
    <hr>
    <h5>
      评论
    </h5>
      <div class="card" style="margin-bottom: 10px;">
          <div class="card-header">当前IP {{ $ip }}</div>
          <div class="card-body">
            <div id="reply-box" style="margin-bottom: 10px;">
            </div>
            <div>
              @include('admin.layouts.errors')
              @include('admin.layouts.success')
            </div>
            <form role="form" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $article->id }}" />
              <input type="hidden" name="parent_id" id="parent_id" value="0" />
              <div class="form-group">
                <input type="text" class="form-control" name="comment" placeholder="请输入您想说的话..." maxlength="255">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">提交</button>
              </div>
            </form>
          </div>
      </div>
      @foreach ($comments as $comment)
      <div class="card" style="margin-bottom: 10px;">
        <div class="card-header">来自 <span id="ip-{{ $comment['id'] }}">{{ $comment['ip'] }}</span> 的评论: <span style="float: right"><a href="javascript:reply({{ $comment['id'] }})">回复Ta</a></span></div>
        <div class="card-body" id="comment-{{ $comment['id'] }}">
          <p><b>{{ $comment['comment'] }}</b></p>
          <p style="color: #666;"><i> {{ $comment['created_at'] }} </i></p>
        </div>
        
        @if (isset($comment['children']))
        <ul class="list-group" style="margin: 0 20px 20px;">
          @foreach ($comment['children'] as $replay)
          <li class="list-group-item">
            <p>来自 {{ $replay['ip'] }} 的回复: </p>
            <p><b>{{ $replay['comment'] }}</b> (<i style="color: #666;"> {{ $replay['created_at'] }} </i>)</p>
          </li>
          @endforeach
        </ul>
        @endif
      </div>
      @endforeach
    <hr>
    <button class="btn btn-primary" onclick="history.go(-1)">
        « 上一页
    </button>
</div>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script>
  // 回复他人评论
  function reply(id) {
    var comment = $("#comment-" + id).text().substr(0, 20) + '...';
    $("#reply-box").html("回复: " + comment + cancelBtn());
    $("#parent_id").val(parseInt(id))
  }

  // 取消回复按钮的html代码
  function cancelBtn()
  {
    return "<a style='margin-left: 20px;' href='javascript:cancelReply()'>取消回复</a>";
  }

  // 取消回复
  function cancelReply()
  {
    $("#reply-box").html('');
    $("#parent_id").val(0)
  }
</script>
@stop