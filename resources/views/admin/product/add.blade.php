


@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=> 'product','key' => 'list'])
{{--        <div class="col-md-12">--}}
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-5">

                            @csrf
                            <div class="form-group ">
                                <label>Tên sản phẩm</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="nhập tên sản phẩm">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label>giá sản phẩm</label>
                                <input type="text" name="price" value="{{old('price')}}" class="form-control  @error('price') is-invalid @enderror " placeholder="nhập giá sản phẩm">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>số lượng sản phẩm</label>
                                <input name="content2s" rows="8" class="form-control @error('content2s') is-invalid @enderror " placeholder="nhập số lượng sản phẩm">
                                {{old('content2s')}}
                                @error('content2s')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group ">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="feature_image_path" class="form-control-file" >
                            </div>

                            <div class="form-group ">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple name="image_path[]" class="form-control-file" >
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục </label>
                                <select class="form-control select2-init  @error('category_id') is-invalid @enderror
                                " value="{{old('category_id')}}" name="category_id">

                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption!!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm </label>
                            <select  name="tags[]" class="form-control tags_select_choose"  multiple="multiple">

                            </select>
                            </div>
                    </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nhập nội dung header</label>
                                    <textarea name="contents" rows="8" class="form-control @error('contents') is-invalid @enderror "  id="editor1" >
                                        {{old('contents')}}
                                    </textarea>
                                    @error('contents')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
