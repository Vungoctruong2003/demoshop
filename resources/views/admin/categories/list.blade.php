@extends('admin.master')
@section('content-admin')
    <div class="col-12 card-body" >
        <div class="row">
            <div class="col-12">
                <h1>Danh sách thể loại</h1>
            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Số sản phẩm</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) === 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{$category ->name }}</td>
                            <td>{{count($category->products)}}</td>

                            <td><a href="{{route('category.edit', $category->id)}}">sửa</a></td>
                            <td><a href="{{route('category.delete', $category->id)}}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('category.create')}}">Thêm mới</a>
        </div>
    </div>
@endsection
