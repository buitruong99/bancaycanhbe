@extends('layouts.admin')
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>tìm thấy {{count($products)}} sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="col-md-12">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('product.create')}}" class="btn btn-primary m-2  float-right ">Add</a>
                </div>
                <div class="col-md-12 ">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">giá</th>
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
                                <td class="product_image" ><img
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

        </div>
        </div>
    </div>
    </section>
@endsection
