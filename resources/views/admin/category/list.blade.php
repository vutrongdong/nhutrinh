@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <div class="btn-group pull-right m-t-15">
                    <a href="admin/category/add" class="btn btn-success btn-sm" style="color: #fff; text-decoration: none;margin-left: 10px">Thêm mới danh mục</a>
                </div>
                <h4 class="page-title">
                    Danh mục
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active">Danh mục</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-header">
                    <form action="/admin/category/list" method="get">
                        <div class="form-group has-search">
                            <input value="{{ $search }}" name="search" type="search" class="form-control" placeholder="Tìm kiếm...">
                        </div>
                    </form>
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
                                        <th class="text-center">Tên</th>
                                        <th class="text-center">Danh mục cha</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $cate)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$cate->title}}</td>
                                            @if($cate->parent)
                                                <td>{{$cate->parent->title}}</td>
                                            @else
                                                <td> Đây là danh mục cấp 1</td>
                                            @endif
                                            @if($cate->slug !='blog')
                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{$cate->id}}">Xóa</a></td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$cate->id}}">Sửa</a></td>
                                            @else
                                                <td class="center" style="cursor:no-drop;"><i class="fa fa-trash-o  fa-fw"></i>Xóa</td>
                                                <td class="center" style="cursor:no-drop;"><i class="fa fa-pencil fa-fw"></i>Sửa</td>
                                            @endif
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
    <div style="float: right;">{!! $category->links() !!}</div>
@endsection