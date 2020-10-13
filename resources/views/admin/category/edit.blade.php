


@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=> 'category','key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-5">
                        <form action="{{ route('categories.update',['id' => $category->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Thêm danh mục</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục sản phẩm</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $htmlOption!!}
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection



