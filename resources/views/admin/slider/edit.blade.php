


@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link href="{{asset('admin/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=> 'Slider','key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-5">
                        <form action="{{route('slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thêm slider </label>
                                <input type="text" value="{{$slider->name}}" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="nhập tên ">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả slider </label>

                                <textarea
                                    class="form-control  @error('description') is-invalid @enderror"
                                    name="description" rows="4">{{$slider->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh </label>
                                <input type="file"  name="image_path" class="form-control-file  " >
                                <div class="col-md-4">
                                    <div class="row">
                                            <img class="detail_images" src="{{"../../../"  . $slider->image_path}}">
                                    </div>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection


