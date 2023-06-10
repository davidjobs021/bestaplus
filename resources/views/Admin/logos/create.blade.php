@extends('Admin.admin')
@section('title')
    <title> ایجاد برند </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
@endsection
@section('main')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت برند</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/logomanage')}}">مدیریت برند</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ایجاد برند</li>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ورود اطلاعات سلاید</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('logomanage.store')}}" method="POST" enctype="multipart/form-data" id="form">
{{--                                    <div class="row row-sm">--}}
                                        {{csrf_field()}}
{{--                                        <div class="col-md-12">--}}
{{--                                            @include('error')--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <p class="mg-b-10">عنوان برند</p>--}}
{{--                                                <input type="text" name="title" id="title" placeholder="عنوان برند را وارد کنید" class="form-control" />--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                            <p class="mg-b-10">لینک برند</p>--}}
{{--                                            <input type="text" name="file_link" placeholder="لینک برند را وارد کنید" class="form-control" />--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <p class="mg-b-10">انتخاب موقعیت برند</p>--}}
{{--                                                <select name="position" class="form-control select-lg select2" id="position">--}}
{{--                                                    <option value="1">برند اصلی</option>--}}
{{--                                                    <option value="2">برند تبلیغاتی چپ بالا</option>--}}
{{--                                                    <option value="3">برند تبلیغاتی چپ پایین</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <p class="mg-b-10">انتخاب نوع برند</p>--}}
{{--                                                <select name="type" class="form-control select-lg select2" id="type">--}}
{{--                                                    <option value="">انتخاب کنید</option>--}}
{{--                                                    <option value="external">لینک خارجی</option>--}}
{{--                                                    <option value="technical">تعمیرگاه</option>--}}
{{--                                                    <option value="supplier">فروشگاه</option>--}}
{{--                                                    <option value="product">کالا</option>--}}
{{--                                                    <option value="offer">آگهی</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                    <p class="mg-b-10">ارتباط برند</p>--}}
{{--                                                    <select name="type_id" class="form-control select-lg select2" id="type_id">--}}

{{--                                                    </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <p class="mg-b-10">تصویر برند</p>--}}
{{--                                                <input type="file" name="file_link" id="file_link" class="dropify" data-height="200">--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <p class="text-danger font-weight-bold">سایز تصاویر برند اصلی 1024x512 پیکسل </p>--}}
{{--                                                <p class="text-danger font-weight-bold">سایز تصاویر برند سمت چپ 856x428 پیکسل </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-12 mg-b-10 text-center">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <button type="submit" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </form>
                                <div class="mg-t-10">
                                    <input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png," multiple="">
                                </div>
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
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
{{--    <script>--}}
{{--        jQuery(document).ready(function(){--}}
{{--            jQuery('#submit').click(function(e){--}}
{{--                e.preventDefault();--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--                swal({--}}
{{--                        title: "Are you sure to delete this  of ?",--}}
{{--                        text: "Delete Confirmation?",--}}
{{--                        type: "warning",--}}
{{--                        showCancelButton: false,--}}
{{--                        confirmButtonColor: "#DD6B55",--}}
{{--                        confirmButtonText: "Delete",--}}
{{--                        closeOnConfirm: false--}}
{{--                    },--}}
{{--                    jQuery.ajax({--}}
{{--                        url: "{{ route('slides.store') }}",--}}
{{--                        method: 'POST',--}}
{{--                        data: {--}}
{{--                            "_token": "{{ csrf_token() }}",--}}
{{--                            title       : jQuery('#title').val(),--}}
{{--                            file_link   : jQuery('#file_link').val()--}}
{{--                        },--}}
{{--                        success: function (data) {--}}
{{--                            if(data.success == true){--}}
{{--                                swal(data.subject, data.message, data.flag);--}}
{{--                                $('#form')[0].reset();--}}
{{--                            } else {--}}
{{--                                swal(data.subject, data.message, data.flag);--}}
{{--                            }--}}
{{--                        },--}}
{{--                    }));--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function($) {
            //fancyfileuplod
            $('#demo').FancyFileUpload({
                params : {
                    "_token": "{{ csrf_token() }}",
                    action : 'fileuploader',
                },
                maxfilesize : 10000000
            });
        })(jQuery);

    </script>
{{--    <script>--}}
{{--        $(function(){--}}
{{--            $('#type').change(function(){--}}
{{--                $("#type_id option").remove();--}}
{{--                var id = $('#type').val();--}}

{{--                $.ajax({--}}
{{--                    url : '{{ route( 'slidetype' ) }}',--}}
{{--                    data: {--}}
{{--                        "_token": "{{ csrf_token() }}",--}}
{{--                        "id": id--}}
{{--                    },--}}
{{--                    type: 'post',--}}
{{--                    dataType: 'json',--}}
{{--                    success: function( result )--}}
{{--                    {--}}
{{--                        $.each( result, function(k, v) {--}}
{{--                            $('#type_id').append($('<option>', {value:k, text:v}));--}}
{{--                        });--}}
{{--                    },--}}
{{--                    error: function()--}}
{{--                    {--}}
{{--                        //handle errors--}}
{{--                        alert('error...');--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection
