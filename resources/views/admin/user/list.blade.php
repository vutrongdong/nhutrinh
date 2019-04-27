@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div style="margin-left: 15px;">
                <div class="btn-group pull-right m-t-15">
                    <a href="admin/user/add" class="btn btn-success btn-sm" style="color: #fff; text-decoration: none;margin-left: 10px">Thêm mới người dùng</a>
                </div>
                <h4 class="page-title">
                    Người dùng
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active">Người dùng</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-header">
                    <form action="/admin/user/list" method="get">
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
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="text-center">Tên</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img width="40px" src="/admin_assets/images/avata.jpg" alt="user"></td>
                                            <td>{{$user->name}}</td>
                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$user->id}}">Xóa</a></td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$user->id}}">Sửa</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="float: right;">{!! $users->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection