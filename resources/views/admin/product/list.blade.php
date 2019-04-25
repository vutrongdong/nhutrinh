@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <div class="btn-group pull-right m-t-15">
                    <a href="admin/product/add" class="btn btn-success btn-sm" style="color: #fff; text-decoration: none;margin-left: 10px">Thêm mới sản phẩm</a>
                </div>
                <h4 class="page-title">
                    Sản phẩm
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active">Sản phẩm</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="form-group has-search">
                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                    </div>
                </div>
                @if(session('thongbao'))
                    <div class='alert alert-success'>
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Tên sản phẩm</th>
                                        <th class="text-center">Mã</th>
                                        <th class="text-center">Giá bán</th>
                                        <th class="text-center">Hiển thị</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->code}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                @if($product->active)
                                                    <div class="checkbox checkbox-success">
                                                        <input id="active" type="checkbox" checked>
                                                        <label for="active">
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox checkbox-success">
                                                        <input id="active" type="checkbox">
                                                        <label for="active">
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$product->id}}">Xóa</a></td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$product->id}}">Sửa</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="float: right;">{!! $products->links() !!}</div>
@endsection