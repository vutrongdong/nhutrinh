@extends('admin.layout.index') 
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" style="margin-top: 10px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/slide/list">Slide</a></li>
                        <li class="breadcrumb-item">Thêm mới</li>
                    </ol>
                    <div class="col-lg-12" style="padding-bottom:120px">
                            @if(session('thongbao'))
                                <div class='alert alert-success'>
                                    {{session('thongbao')}}
                                </div>
                            @endif
                        <form action="admin/slide/add" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Tiêu đề</label>
                                    <input value="{{ old('title') }}" class="form-control" name="title" placeholder="Điền tên danh mục" />
                                    <div class="clearFix"></div>
                                    @if( $errors->has('title'))
                                         <p style="color: red;">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Hình ảnh</label>
                                        <input onchange="handerSelectImage($event)" class="form-control" type="file" name="image" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-info">Làm mới</button>
                            </div>
                        <form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
        function handerSelectImage (evt) {
            console.log('evt', evt)
            if (evt.target.files[0]) {
                // let formData = new FormData()
                // formData.append('file', evt.target.files[0])
                // try {
                //     let response = await axios.post('/api/slides/upload', formData, {params: {resize: 1, imageOld: this.slide.image }})
                //     if (response.data.code === 1) {
                //         this.slide.image = response.data.data.name
                //         this.slide.image_path = response.data.data.path
                //     } else {
                //         $.Notification.autoHideNotify('error', 'top right', 'Lỗi', 'Upload file thất bại')
                //     }
                // } catch(err) {
                //     if (err.status == 422) {
                //         let msg = []
                //         forIn(err.data, (err, idx) => {
                //             msg.push("&bullet; " + err[0])
                //         })
                //         $.Notification.autoHideNotify('error', 'top right', 'Thất bại', msg.join("<br>"))
                //     } else {
                //         $.Notification.autoHideNotify('error', 'top right', 'Lỗi', 'Upload file thất bại')
                //     }
                // }
            }
        }
    </script>
@endsection