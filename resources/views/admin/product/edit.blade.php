


@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admin/product/index/list.css')}}">
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=> 'product','key' => 'Edit'])
        <form action="{{ route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-5">

                            @csrf
                            <div class="form-group ">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{$product->name}}">
                            </div>
                            <div class="form-group ">
                                <label>giá sản phẩm</label>
                                <input type="text" name="price" class="form-control" placeholder="nhập giá sản phẩm"
                                       value="{{$product->price}}">
                            </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>số lượng sản phẩm</label>
                                <input name="content2s" class="form-control" value="{{$product->content2}}">

                            </div>
                        </div>
                            <div class="form-group ">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="feature_image_path" class="form-control-file" >
                                <div class="col-md-12">
                                    <div  class="row ">
                                        <img class="product_image_150_100" src="{{  "/.." . $product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group ">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple name="image_path[]" class="form-control-file" >
                                <div class="col-ma-12 container_detail">
                                    <div class="row ">
                                        @foreach($product->productImages as $productImageItem)
                                        <div class="col-md-3">
                                            <img class="detail_images" src="{{"../../.." .   $productImageItem->image_path }}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục </label>
                                <select class="form-control select2-init"  name="category_id">
                                    <option value="">Chọn danh mục</option>

                                    {!! $htmlOption!!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm </label>
                            <select  name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach($product->tags as $tagItem)
                                <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                @endforeach
                            </select>
                            </div>
                    </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nhập nội dung</label>
                                    <textarea name="contents" class="form-control" id="editor1" rows="8">
                                        {{$product->content}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{ asset('admin/product/add/add.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );


    </script>



@endsection
