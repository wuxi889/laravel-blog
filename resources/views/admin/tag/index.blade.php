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
                                <a href="/tag/{{ $tag->id }}/destroy" class="btn btn-xs btn-info">
                                    <i class="fa fa-times"></i> 删除
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#tags-table").DataTable({});
        });
    </script>
@stop