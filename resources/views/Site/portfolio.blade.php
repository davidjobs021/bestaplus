@extends('master')
@section('main')

    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">گالری</h2>
                </div>
                <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">صفحه اصلی</a></li>
                    <li>صفحات</li>
                    <li>گالری</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="gallery-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="section__title">پروژه های غرور آفرینی که ما را متمایز می کند</h2>
                    </div>
                    <ul class="portfolio-filter pt-40px pb-40px">
                        <li data-filter="*" class="active">همه</li>
                        @foreach($services as $service)
                            <li data-filter=".{{$service->service_name}}">{{$service->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="generic-portfolio-list row">
                        @foreach($portfolios as $portfo)
                            <div class="generic-portfolio-item col-lg-4 {{$portfo->service_name}} all">
                                <div class="generic-portfolio-content">
                                    <a class="portfolio-link" href="{{asset('storage/'.$portfo->file_link)}}" data-fancybox="gallery" data-caption="Image {{$portfo->id}}">
                                        <img src="{{asset('storage/'.$portfo->file_link)}}" alt="{{$portfo->title}}" />
                                        <div class="icon-element icon-element-md">
                                            <i class="la la-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
