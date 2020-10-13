


@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admin/product/index/list.css')}}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admin/product/index/lists.js')}}"></script>
@endsection
@include('partials.content-header',['name'=> 'product','key' => 'list'])
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12">

                        <a href="{{route('product.create')}}" class="btn btn-primary m-2  float-right ">Add</a>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">giá</th>
                                <th scope="col">số lượng</th>
                                <th scope="col">hình ảnh</th>
                                <th scope="col">danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $productItem)

                                <tr>
                                    <th scope="row">{{$productItem->id}}</th>
                                    <td>{{$productItem->name}}</td>
                                    <td>{{  number_format($productItem->price) }}</td>
{{--                                    //--}}
                                    <td>{{$productItem->content2}}</td>
                                    <td class="product_image_150_100" ><img
                                             src="{{ ".." . $productItem->feature_image_path}}" alt=""></td>
                                    <td>{{ $productItem->category->name}}</td>
                                    <td>
                                        <a href="{{route('product.edit',['id'=>$productItem->id])}}"
                                           class="btn btn-success">Edit</a>

                                        <a href=""
                                           data-url=" {{ route('product.delete',['id'=>$productItem->id]) }}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>

@endsection



