@extends('Admin.admin')
@section('title')
    <title> ویرایش  اسلاید ها </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/sumoselect/sumoselect-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h3 class="text-center mb-5"><span class="badge badge-light">ویرایش اطلاعات اسلاید</span></h3>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                                @foreach($slides as $slide)
                                    <form action="{{route('slides.update', $slide->id)}}" method="POST" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}

                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نام اسلاید</p>
                                                    <input type="text" name="title" value="{{$slide->title}}"  class="form-control" />
                                                </div>
{{--                                                <div class="form-group">--}}
{{--                                                    <p class="mg-b-10">لینک اسلاید</p>--}}
{{--                                                    <input type="text" name="link" value="{{$slide->link}}" class="form-control" />--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="col-md-3">
{{--                                                <div class="form-group">--}}
{{--                                                    <p class="mg-b-10">انتخاب مکان اسلاید</p>--}}
{{--                                                    <select name="position" class="form-control select-lg select2" id="position">--}}
{{--                                                        <option value="">مکان اسلاید</option>--}}
{{--                                                        <option value="1" {{$slide->position == 1 ? 'selected' : ''}}>اسلاید اصلی</option>--}}
{{--                                                        <option value="2" {{$slide->position == 2 ? 'selected' : ''}}>اسلاید تبلیغاتی چپ بالا</option>--}}
{{--                                                        <option value="3" {{$slide->position == 3 ? 'selected' : ''}}>اسلاید تبلیغاتی چپ پایین</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status_id" class="form-control select-lg select2">
                                                        <option value="0" {{$slide->status == 0 ? 'selected' : '' }}>عدم نمایش</option>
                                                        <option value="4" {{$slide->status == 4 ? 'selected' : '' }}>در حال نمایش</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
{{--                                                <div class="form-group">--}}
{{--                                                    <p class="mg-b-10">انتخاب نوع اسلاید</p>--}}
{{--                                                    <select name="type" class="form-control select-lg select2" id="type">--}}
{{--                                                        <option value="">انتخاب کنید</option>--}}
{{--                                                        <option value="external"  {{$slide->type == 'external' ? 'selected' : ''}}  >لینک خارجی</option>--}}
{{--                                                        <option value="technical" {{$slide->type == 'technical'? 'selected' : ''}}  >تعمیرگاه</option>--}}
{{--                                                        <option value="supplier"  {{$slide->type == 'supplier' ? 'selected' : ''}}  >فروشگاه</option>--}}
{{--                                                        <option value="product"   {{$slide->type == 'product'  ? 'selected' : ''}}  >کالا</option>--}}
{{--                                                        <option value="offer"     {{$slide->type == 'offer'    ? 'selected' : ''}}  >آگهی</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <p class="mg-b-10">ارتباط اسلاید</p>--}}
{{--                                                    <select name="type_id" class="form-control select-lg select2" id="type_id">--}}
{{--                                                        @if($slide->type == 'supplier')--}}
{{--                                                            @foreach($suppliers as $supplier)--}}
{{--                                                                <option value="{{ $supplier->id }}">{{ $supplier->title }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @elseif($slide->type == 'technical')--}}
{{--                                                            @foreach($technicals as $technical_unit)--}}
{{--                                                                <option value="{{ $technical_unit->id }}">{{ $technical_unit->title }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @elseif($slide->type == 'product')--}}
{{--                                                            @foreach($products as $product)--}}
{{--                                                                <option value="{{ $product->id }}">{{ $product->title }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @elseif($slide->type == 'offer')--}}
{{--                                                            @foreach($offers as $offer)--}}
{{--                                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @endif--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="col-md-3">
{{--                                                <div class="form-group">--}}
{{--                                                    <p class="mg-b-10">انتخب استان</p>--}}
{{--                                                    <select multiple="multiple" name="state_id[]" onchange="console.log($(this).children(':selected').length)" class="selectsum2">--}}
{{--                                                        @foreach(\App\State::all() as $state)--}}
{{--                                                            <option value="{{ $state->id }}" {{ in_array(trim($state->id) , $slide->stateslide->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $state->title }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تصویر اسلاید</p>
                                                    <input type="file" id="input-file-events" class="dropify" data-default-file="{{asset($slide->file_link)}}" data-height="200">
                                                </div>
                                                <div>
                                                    <p class="text-danger font-weight-bold">سایز تصاویر اسلاید اصلی 1024x512 پیکسل </p>
                                                    <p class="text-danger font-weight-bold">سایز تصاویر اسلاید سمت چپ 856x428 پیکسل </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="submit"  class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
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
    <script src="{{asset('admin/assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        var drEvent = $('.dropify').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.filename + "\" ?");
        });
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

