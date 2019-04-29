@extends('admin.layout.index') 
@section('content')
    <div class="row">
        <div class="col-12 container">
            <div style="margin-left: 15px;">
                <h4 class="page-title">
                    Tạo mới slide
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin/">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="admin/slide/list">Slide</a></li>
                    <li class="breadcrumb-item active">Tạo mới slide</li>
                </ol>
                <p class="clearfix"></p>
            </div>
            <div class="card">
                <div class="card-body">
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
                                    <input id="displayImages" class="form-control" type="file" name="image" />
                                </div>
                            </div>
                            <img class="displayImages" src='' width="100%" style="margin: 5px auto;" />
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
    // $(document).ready(function(){
    //     $("#displayImages").change(function(e){
    //         let formData = new FormData();
    //         formData.append('resize', '1');
    //         formData.append('imageOld', e.target.files[0].name);
    //         formData.append('file', e.target.files[0]);
    //         console.log(formData);
    //         $.ajax({
    //             type: 'POST',
    //             url:"/slide/upload",
    //             data: formData,
    //             processData: false, 
    //             contentType: false, 
    //             headers:
    //             {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(returnval) {
    //                 console.log(returnval.data.path);
    //                 $(".displayImages").attr("src", returnval.data.path);
    //             }
    //         });
    //     });
    // });
</script>
@endsection