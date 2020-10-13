


@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=> 'menus','key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-5">
                        <form action="{{ route('menus.update',['id' => $menu->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Thêm menus</label>
                                <input type="text" name="name" class="form-control" value="{{ $menu->name }}" placeholder="nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label>Chọn menus</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $optionSelect!!}
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



