@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <div class="btn-group pull-right m-t-15">
                    <a href="admin/blog/add" class="btn btn-success btn-sm" style="color: #fff; text-decoration: none;margin-left: 10px">Thêm mới bài viêt</a>
                </div>
                <h4 class="page-title">
                    Bài viêt
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active">Bài viêt</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-header">
                    <form action="/admin/blog/list" method="get">
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
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center">Danh mục cha</th>
                                        <th class="text-center">Hiển thị</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$blog->title}}</td>
                                            <td>{{$blog->category->title}}</td>
                                            <td>
                                                @if($blog->active)
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
                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/blog/delete/{{$blog->id}}">Xóa</a></td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/blog/edit/{{$blog->id}}">Sửa</a></td>
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
    <div style="float: right;">{!! $blogs->links() !!}</div>
@endsection