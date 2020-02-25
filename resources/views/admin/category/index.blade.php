@extends('admin.layouts.public')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>分类
                    <small>» 列表</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/category/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新增分类
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
                        <th>分类</th>
                        <th>文章数目</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->articles_count }}</td>
                            <td>
                                <a href="/category/{{ $category->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <a href="/category/{{ $category->id }}/destroy" class="btn btn-xs btn-info">
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