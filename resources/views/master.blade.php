<!DOCTYPE html>
<html lang="fa">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="حسین دیوان بیگی">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>آژانس تخصصی تبلیغات بستا</title>

    <!-- Google fonts -->
{{--    <link rel="preconnect" href="https://fonts.gstatic.com/">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">--}}

    <!-- Favicon -->
    <!-- <link rel="icon" sizes="16x16" href="images/favicon.png"> -->

{{--    <link rel="icon" href="images/favicon-32x32.png" sizes="32x32" type="image/png">--}}
{{--    <link rel="icon" href="images/favicon-16x16.png" sizes="16x16" type="image/png">--}}

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/tooltipster.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">

@yield('style')
    <!-- end inject -->
</head>
<body>

<!-- start cssload-loader -->
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>

<header class="header-menu-area bg-white">
    <div class="header-top pr-150px pl-150px border-bottom border-bottom-gray py-1">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-widget">
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                            <li class="d-flex align-items-center pr-3 mr-3 border-left border-left-gray"><i class="la la-phone mr-1"></i><a href="tel:00123456789">021-77116213</a></li>
                            <li class="d-flex align-items-center"><i class="la la-envelope-o mr-1"></i><a href="mailto:info@bestagroup.ir"> info@bestagroup.ir </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-widget d-flex flex-wrap align-items-center justify-content-end">
                        <div class="theme-picker d-flex align-items-center">
                            <button class="theme-picker-btn dark-mode-btn" title="حالت تاریک">
                                <svg id="moon" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                </svg>
                            </button>
                            <button class="theme-picker-btn light-mode-btn" title="حالت نور">
                                <svg id="sun" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="5"></circle>
                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                    <line x1="1" y1="12" x2="3" y2="12"></line>
                                    <line x1="21" y1="12" x2="23" y2="12"></line>
                                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                </svg>
                            </button>
                        </div>
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14 border-right border-right-gray pl-3 ml-3">
                            @if(Auth()->check())
                                <li class="d-flex align-items-center pr-3 mr-3 border-left border-left-gray">کاربر عزیز : {{auth()->user()->name}}</li>
                                <li class="d-flex align-items-center"><i class="la la-user mr-1"></i><a href="{{route('logout')}}">خروج</a></li>
                            @else
                            <li class="d-flex align-items-center pr-3 mr-3 border-left border-left-gray"><i class="la la-sign-in mr-1"></i><a href="{{route('login')}}">ورود</a></li>
                            <li class="d-flex align-items-center"><i class="la la-user mr-1"></i><a href="#"> ثبت نام</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu-content pr-150px pl-150px bg-white">
        <div class="container-fluid">
            <div class="main-menu-content">
                <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-box">
                            <a href="{{route('/')}}" class="logo">
                                <img src="{{asset($logos['file_link'])}}" alt="{{$logos['title']}}" style="width: 55%">
                            </a>
                            <div class="user-btn-action d-flex">
                                <div class="search-menu-toggle icon-element icon-element-sm shadow-sm mr-2" data-toggle="tooltip" data-placement="top" title="جستجو کردن">
                                    <i class="la la-search"></i>
                                </div>
                                <div class="off-canvas-menu-toggle cat-menu-toggle icon-element icon-element-sm shadow-sm mr-2" data-toggle="tooltip" data-placement="top" title="منوی دسته بندی">
                                    <i class="la la-th-large"></i>
                                </div>
                                <div class="off-canvas-menu-toggle main-menu-toggle icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="top" title="منوی اصلی">
                                    <i class="la la-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="menu-wrapper">
                            <nav class="main-menu">
                                <ul>
                                    @foreach($menus as $menu)
                                        @if($menu->submenu == 0)
                                            <li>
                                                <a href="{{url($menu->slug)}}">{{$menu->title}}</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{url($menu->slug)}}">{{$menu->title}}<i class="la la-angle-down fs-12"></i></a>
                                                <ul class="dropdown-menu-item">
                                                    @foreach($submenus as $submenu)
                                                        @if($menu->id == $submenu->menu_id)
                                                            <li><a href="{{url($menu->slug.'/'.$submenu->slug)}}">{{$submenu->title}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>

                        <div class="nav-left-button">
                            <a href="admission.html" class="btn theme-btn d-none d-lg-inline-block"><i class="la la-user-plus mr-1"></i> سفارش</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="off-canvas-menu custom-scrollbar-styled main-off-canvas-menu">
        <div class="off-canvas-menu-close main-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="right" title="بستن منو">
            <i class="la la-times"></i>
        </div><!-- end off-canvas-menu-close -->
        <ul class="generic-list-item off-canvas-menu-list pt-90px">
            <li>
            @foreach($menus as $menu)
                @if($menu->submenu == 0)
                    <li>
                        <a href="{{url($menu->slug)}}">{{$menu->title}}</a>
                    </li>
                @else
                    <li>
                        <a href="{{url($menu->slug)}}">{{$menu->title}}</a>
                        <ul class="sub-menu">
                            @foreach($submenus as $submenu)
                                @if($menu->id == $submenu->menu_id)
                                    <li><a href="{{url($submenu->slug)}}">{{$submenu->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
            </li>
        </ul>
    </div>

    <div class="mobile-search-form">
        <div class="d-flex align-items-center">
            <form method="post" class="flex-grow-1 mr-3">
                <div class="form-group mb-0">
                    <input class="form-control form--control pl-3" type="text" name="search" placeholder="هر چیزی را جستجو کنید">
                    <span class="la la-search search-icon"></span>
                </div>
            </form>
            <div class="search-bar-close icon-element icon-element-sm shadow-sm">
                <i class="la la-times"></i>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
</header>

@yield('main')

<section class="footer-area bg-gray pt-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <a href="{{route('/')}}">
                        <img src="{{asset($logos['file_link'])}}" alt="{{$logos['title']}}" class="footer__logo" style="width: 30%">
                    </a>
                    <ul class="generic-list-item pt-4 ">
                        <li> آژانس تخصصی تبلیغات بستا</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">بخش های سایت</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        @foreach($menus as $menu)
                            @if(in_array($menu->priority , [2,3,4,5]))
                            <li><a href="{{url($menu->slug)}}">{{$menu->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">بخش های آموزشی</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        @foreach($submenus as $submenu)
                            @if($submenu->menu_id == 9)
                                <li><a href="{{$submenu->slug}}">{{$submenu->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">شبکه های اجتماعی</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="social-icons social-icons-styled">
                        <li class="mr-r icon-social">
                            <a href="https://eitaa.com/hamahdzohoor" target="_blank" class="eitaa">
                                <img src="{{asset('site/images/eitaa.png')}}" alt="eitaa">
                            </a>
                        </li>
                    </ul>
                    <h3 class="fs-20 font-weight-semi-bold pt-4 pb-2">راه های ارتباطی</h3>
                    <ul class="generic-list-item pt-4">
                        <li><a href="tel:+989128119938">+989128119938</a></li>
                        <li><a href="tel:+982177116213">021-77116213</a></li>
                        <li><a href="mailto:info@bestagroup.ir">info@bestagroup.ir</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section-block"></div>
    <div class="copyright-content py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="copy-desc">کلیه حقوق مادی و معنوی وبسایت برای آژانس تخصصی تبلیغات بستا محفوظ می باشد</p>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end">
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                            <li class="mr-3"><a href="{{route('شرایط-ضوابط')}}">شرایط و ضوابط</a></li>
                            <li class="mr-3"><a href="#">سیاست حفظ حریم خصوصی</a></li>
                        </ul>
                        <div class="select-container select-container-sm">
                            <select class="select-container-select">
                                <option value="1">فارسی</option>
                                <option value="2">انگلیسی</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="scroll-top">
    <i class="la la-arrow-up" title="برو بالا"></i>
</div>

<script src="{{asset('site/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/isotope.js')}}"></script>
<script src="{{asset('site/js/waypoint.min.js')}}"></script>
<script src="{{asset('site/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('site/js/fancybox.js')}}"></script>
<script src="{{asset('site/js/datedropper.min.js')}}"></script>
<script src="{{asset('site/js/emojionearea.min.js')}}"></script>
<script src="{{asset('site/js/tooltipster.bundle.min.js')}}"></script>
<script src="{{asset('site/js/jquery.lazy.min.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>
@yield('script')
</body>
</html>
