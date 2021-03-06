@extends('admin.layouts.public')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>标签
                    <small>» 新增标签</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">新增标签</h3>
                    </div>
                    <div class="card-body">

                        @include('admin.layouts.errors')

                        <form role="form" method="POST" action="{{ route('tag.store') }}">
                            @csrf

                            @include('admin.tag._form')

                            <div class="form-group row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i>
                                        添加新标签
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop