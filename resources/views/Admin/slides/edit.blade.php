@extends('Admin.admin')
@section('title')
    <title> ویرایش  اسلاید ها </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت اسلاید</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}">مدیریت اسلاید</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش اسلاید</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات اسلاید</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $slides->id)}}" method="post" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="slide_id" id="slide_id" data-required="1" value="{{$slides->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تیتر1</p>
                                                    <input type="text" name="title1" id="title1" value="{{$slides->title1}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div  class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تیتر2</p>
                                                    <input type="text" name="title2" id="title2" value="{{$slides->title2}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div  class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تیتر3</p>
                                                    <input type="text" name="title3" id="title3" value="{{$slides->title3}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" style="position: absolute;">
                                                    <p class="mg-b-10">تصویر اسلاید</p>
                                                    <input type="file" id="file_link" name="file_link" class="dropify" data-height="200">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" style="position: absolute;">
                                                    <p class="mg-b-10">تصویر اسلاید</p>
                                                    <img src="{{asset('storage/'.$slides->file_link)}}" width="200px" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status" id="status" class="form-control select-lg select2">
                                                        <option value="0" {{$slides->status == 0 ? 'selected' : '' }}>عدم نمایش</option>
                                                        <option value="4" {{$slides->status == 4 ? 'selected' : '' }}>در حال نمایش</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب منو</p>
                                                    <select name="menu_id" id="menu_id" class="form-control select-lg select2">
                                                        <option value="">انتخاب منو</option>
                                                        @foreach($menus as $menu)
                                                            <option value="{{$menu->id}}" {{$menu->id == $slides->menu_id ? 'selected' : ''}}>{{$menu->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-top: 65px;">
                                                    <p class="mg-b-10"> توضیحات</p>
                                                    <textarea name="text" id="editor" cols="30" rows="5" class="form-control" >{{$slides->text}}</textarea>
                                                </div>
                                            </div>
                                            <div  class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="button" id="submit" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                let    text             = CKEDITOR.instances.editor.getData();
                let    _token           = jQuery('input[name="_token"]').val();
                let    title1           = jQuery('#title1').val();
                let    title2           = jQuery('#title2').val();
                let    title3           = jQuery('#title3').val();
                let    menu_id          = jQuery('#menu_id').val();
                let    status           = jQuery('#status').val();
                let    file_link        = jQuery('#file_link')[0].files[0];

                let formData = new FormData();
                formData.append('title1'    , title1);
                formData.append('title2'    , title2);
                formData.append('title3'    , title3);
                formData.append('menu_id'   , menu_id);
                formData.append('status'    , status);
                formData.append('text'      , text);
                formData.append('file_link' , file_link);
                formData.append('_token'    , _token);

                jQuery.ajax({
                    url: "{{route(request()->segment(2).'.'.'update', $slides->id)}}",
                    method: 'PATCH',
                    data  : formData,
                    success: function (data) {
                        swal(data.subject, data.message, data.flag);
                    },
                    error: function (data) {
                        swal(data.subject, data.message, data.flag);
                    }
                });
            });
        });
    </script>

@endsection

