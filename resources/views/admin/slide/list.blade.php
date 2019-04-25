@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <div class="btn-group pull-right m-t-15">
                    <a href="admin/slide/add" class="btn btn-success btn-sm" style="color: #fff; text-decoration: none;margin-left: 10px">Thêm mới slide</a>
                </div>
                <h4 class="page-title">
                    Slide
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active">Slide</li>
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
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slides as $slide)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$slide->title}}</td>
                                            <td><img width="200px" src="/assets/images/user.jpeg" alt="user"></td>
                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/{{$slide->id}}">Xóa</a></td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$slide->id}}">Sửa</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="float: right;">{!! $slides->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection