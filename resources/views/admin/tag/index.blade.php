@extends('admin.layouts.public')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>标签
                    <small>» 列表</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/tag/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新增标签
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
                        <th>标签</th>
                        <th>文章数目</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->articles_count }}</td>
                            <td>
                                <a href="/tag/{{ $tag->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete" onclick="changeId({{ $tag->id }})">
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
                            确定要删除这个标签吗?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" id="form-delete" action="/article/">
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
            $("#form-delete").attr('action', '/tag/' + id)
        }
    </script>
@stop