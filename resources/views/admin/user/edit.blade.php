


@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link href="{{asset('admin/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=> 'User','key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-5">
                        <form action="{{route('user.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name user </label>
                                <input type="text" value="{{$user->name}}" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="nhập tên ">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input type="text" value="{{$user->email}}" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="nhập tên ">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label>Password </label>--}}
{{--                                <input type="text" value="{{$user->password}}" name="name" class="form-control  @error('password') is-invalid @enderror" placeholder="nhập tên ">--}}
{{--                                @error('password')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}

{{--                            </div>--}}


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection



