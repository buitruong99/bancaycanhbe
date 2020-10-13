

@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admin/product/index/list.css')}}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admin/product/index/lists.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Sliders','key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <a href="{{ route('slider.create') }}" class="btn btn-primary m-2 float-right ">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$slider->id}}</th>
                                    <td> {{$slider->name}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{".." .$slider->image_path}}">
                                    </td>
                                    <td>
                                        <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="btn btn-success">Edit</a>

                                        <a   data-url=" {{route('slider.delete',['id'=>$slider->id])}} }}"
                                            href=""  class="btn btn-danger action_delete">Delete</a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$sliders->links()}}
            </div>
        </div>
    </div>

@endsection



