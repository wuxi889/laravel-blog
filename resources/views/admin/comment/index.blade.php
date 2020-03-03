@extends('admin.layouts.public')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>评论
                    <small>» 列表</small>
                </h3>
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
                        <th>所属IP</th>
                        <th>评论内容</th>
                        <th>审核状态</th>
                        <th>提交时间</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->ip }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>@if ($comment->status == 1) 通过 @elseif ($comment->status == 2) 拒绝 @else 未审核 @endif </td>
                            <td>{{ $comment->created_at }}</td>
                            <td>
                                <a href="{{ route('comment.edit', ['comment' => $comment->id]) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete" onclick="changeId({{ $comment->id }})">
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
                            确定要删除这个评论吗?
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
            $("#form-delete").attr('action', '/admin/comment/' + id)
        }
    </script>
@stop