@extends('admin.layouts.public')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>文章
                    <small>» 列表</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('article.create') }}" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新增文章
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.layouts.errors')
                @include('admin.layouts.success')

                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>分类</th>
                        <th>作者</th>
                        <th>原创</th>
                        <th>更新时间</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td class="hidden-sm"><a href="{{ route('article.content', ['id' => $article->id]) }}" target="_blank">{{ $article->title }}</a></td>
                            <td class="hidden-md">{{ $article->category->name ?? ''}}</td>
                            <td class="hidden-md">{{ $article->author }}</td>
                            <td class="hidden-md">@if ($article->original) 是 @else 否 @endif</td>
                            <td class="hidden-sm">{{ $article->updated_at }}</td>
                            <td>
                                <a href="{{ route('article.edit', ['article' => $article->id]) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete" onclick="changeId({{ $article->id }})">
                                    <i class="fa fa-times"></i>
                                    删除
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 确认删除 --}}
        <div class="modal fade" id="modal-delete" tabIndex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            ×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            <i class="fa fa-question-circle fa-lg"></i>
                            确定要删除这篇文章吗?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" id="form-delete" action="">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-times-circle"></i> 确认
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#tags-table").DataTable({});
        });

        function changeId(id) {
            $("#form-delete").attr('action', '/admin/article/' + id)
        }
    </script>
@stop