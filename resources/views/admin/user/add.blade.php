@extends('layouts.admin')

@section('title')
    <title>thêm tài khoản</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm sản phẩm</h1>
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
            <div class="col-md-12">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên tài khoản</label>
                                <input
                                    type="text"
                                    class="form-control "
                                    name="name"

                                    placeholder="Nhập tên tài khoản">

                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="email"

                                    placeholder="Nhập email">

                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="password"

                                    placeholder="Nhập mật khẩu">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
