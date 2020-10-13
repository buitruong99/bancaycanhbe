


@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

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

            <a href="{{route('categories.create')}}" class="btn btn-primary m-2  float-right ">Add</a>
          </div>
          <div class="col-md-12 ">
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $category)
                  <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{$category->name}}</td>
                      <td>
                        <a href="{{route('categories.edit',['id'=>$category->id])}}" class="btn btn-success">Edit</a>
                        <a href="{{route('categories.delete',['id'=>$category->id])}}"  class="btn btn-danger">Delete</a>
                      </td>

                  </tr>
                @endforeach
                </tbody>
            </table>
          </div>
        </div>
          {{$data->links()}}
      </div>
    </div>
  </div>

@endsection



