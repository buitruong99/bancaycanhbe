@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection
@section('css')
    <link href="{{asset('adminAdd/product/add/add.css')}}" rel="stylesheet" />

@endsection
@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
    <script src="{{asset('admin/product/index/lists.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Setting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Example single danger button -->
                        <div style="float: right" class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle m-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add Setting
                            </button>
                            <div class="dropdown-menu">
                                <li><a style="color: red" class="dropdown-item" href="{{route('settings.create').'?type=Text'}}">Text</a></li>
                                <li><a style="color: red" class="dropdown-item" href="{{route('settings.create').'?type=Textarea'}}">Textarea</a></li>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($settings as $setting)

                                <tr>
                                    <th scope="row">{{$setting->id}}</th>
                                    <td>{{$setting->config_key}}</td>
                                    <td>{{$setting->config_value}}</td>
                                    <td>
                                        <a href="{{route('settings.edit',['id'=> $setting->id]).'?type='.$setting->type}}" class="btn btn-success">Edit</a>
                                        <a href=""
                                           data-url="{{route('settings.delete',['id'=>$setting->id])}}"
                                           class="btn btn-danger act-del action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{$settings->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection


