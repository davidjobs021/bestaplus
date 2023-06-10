@extends('master')
@section('main')
    <?php $x = 0 ?>
    @if($x == 1)
    <section class="about-area section--padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pb-5">
                        <div class="section-heading">
                            <h2 class="section__title pb-3 lh-50">جامعه جهانی اسلام و خانواده سالم</h2>
                            <p class="section__desc">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته
                            </p>
                        </div>
                        <!-- end section-heading -->
                        <ul class="generic-list-item pt-3">
                            <li><i class="la la-check-circle mr-2 text-success"></i>دوره های آنلاین با سیستم های تخفیف کامل.</li>
                            <li><i class="la la-check-circle mr-2 text-success"></i>گواهینامه های آنلاین که در سراسر جهان قابل استفاده هستند.</li>
                            <li><i class="la la-check-circle mr-2 text-success"></i>یک برنامه توسعه رهبری آنلاین در وبسایت.</li>
                        </ul>
                    </div>
                    <!-- end about-content -->
                </div>

                <div class="col-lg-6">
                    <div class="generic-img-box generic-img-box-layout-2">
                        <div class="img__item img__item-1">
                            <img class="lazy" src="images/img-loading.png" data-src="images/img15.jpg" alt="درباره تصویر" />
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">55 </h3>
                                <span>اساتید</span>
                            </div>
                        </div>
                        <div class="img__item img__item-2">
                            <img class="lazy" src="images/img-loading.png" data-src="images/img16.jpg" alt="درباره تصویر" />
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">6900+</h3>
                                <span>دوره های آموزشی</span>
                            </div>
                        </div>
                        <div class="img__item img__item-3">
                            <img class="lazy" src="images/img-loading.png" data-src="images/img17.jpg" alt="درباره تصویر" />
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">4000 </h3>
                                <span>دانشجویان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="get-started-area pt-30px pb-120px position-relative">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item hover-s text-center">
                        <div class="card-body">
                            <img src="images/img-loading.png" data-src="images/small-img-2.jpg" alt="تصویر کارت" class="img-fluid lazy rounded-full" />
                            <h5 class="card-title pt-4 pb-2">یادگیری سریع</h5>
                            <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item hover-s text-center">
                        <div class="card-body">
                            <img src="images/img-loading.png" data-src="images/small-img-3.jpg" alt="تصویر کارت" class="img-fluid lazy rounded-full" />
                            <h5 class="card-title pt-4 pb-2">محتوای قابل اعتماد</h5>
                            <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item hover-s text-center">
                        <div class="card-body">
                            <img src="images/img-loading.png" data-src="images/small-img-4.jpg" alt="تصویر کارت" class="img-fluid lazy rounded-full" />
                            <h5 class="card-title pt-4 pb-2">توانمندسازی خانواده ها</h5>
                            <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
            </div>
            <!-- end row -->
            <p class="text-center">می خواهید به ما بپیوندید؟ <a href="careers.html" class="text-color hover-underline">دروس مورد نیاز </a> جذب اساتید<a href="careers.html" class="text-color hover-underline"></a></p>
        </div>
        <!-- end container -->
    </section>

    <section class="our-mission-area section--padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row pb-5">
                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box">
                                <img src="images/img-loading.png" data-src="images/img8.jpg" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>

                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box my-3">
                                <img src="images/img-loading.png" data-src="images/img10.jpg" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>

                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box">
                                <img src="images/img-loading.png" data-src="images/img11.jpg" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>

                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box my-3">
                                <img src="images/img-loading.png" data-src="images/img12.jpg" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content pl-4">
                        <div class="section-heading">
                            <h2 class="section__title pb-3 lh-50">ماموریت ما</h2>
                            <p class="section__desc pb-3">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                            <p class="section__desc text-black">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="story-area section--padding">
        <div class="container">
            <div class="story-content text-center">
                <div class="section-heading">
                    <h2 class="section__title pb-3 lh-50">داستان ما</h2>
                    <p class="section__desc">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                        متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                    </p>
                </div>
                <!-- end section-heading -->
            </div>
            <!-- end story-content -->
            <div class="row pt-60px">
                <div class="col-lg-4 responsive-column-half">
                    <div class="story-img-item">
                        <img class="lazy" src="images/img-loading.png" data-src="images/img37.jpg" alt="تصویر داستان" />
                    </div>
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="story-img-item mt-90px">
                        <img class="lazy" src="images/img-loading.png" data-src="images/img38.jpg" alt="تصویر داستان" />
                        <a href="#" class="video-play-btn" data-fancybox="" data-src="https://www.youtube.com/watch?v=cRXm1p-CNyk">
                            <span class="icon-element icon-element-md"><i class="la la-play"></i></span>
                        </a>
                    </div>
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="story-img-item">
                        <img class="lazy" src="images/img-loading.png" data-src="images/img39.jpg" alt="تصویر داستان" />
                    </div>
                </div>
                <!-- end col-lg-4 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="team-member-area section--padding">
        <div class="container">
            <div class="team-member-heading-content text-center">
                <div class="section-heading">
                    <h2 class="section__title lh-50">مدیران وبسایت</h2>
                </div>
                <!-- end section-heading -->
            </div>
            <!-- end team-member-heading-content -->
            <div class="row pt-60px">
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-1.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">امیر محمدی</a></h5>
                            <p class="card-text">موسس و مدیر عامل</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-2.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">محمد امیری</a></h5>
                            <p class="card-text">رئیس و مدیرعامل</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-3.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">محمد حسین دیوان بیگی</a></h5>
                            <p class="card-text">مدیر ارشد فناوری</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-4.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">علی محبی نیا</a></h5>
                            <p class="card-text">افسر ارشد بازاریابی</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-5.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">مصطفی زمانیان</a></h5>
                            <p class="card-text">معاون محصول</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-6.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">ارمان حیدری</a></h5>
                            <p class="card-text">معاون خدمات</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-7.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">منوچهر احمدی</a></h5>
                            <p class="card-text">معاون، عملیات</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item member-card text-center">
                        <div class="card-image">
                            <img class="card-img-top" src="images/small-avatar-1.jpg" alt="عضو تیم" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">احد میرزایی</a></h5>
                            <p class="card-text">مدیر ارشد مالی</p>
                            <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                                <li>
                                    <a href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="la la-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <section class="about-area section--padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-xl-center">
                    <div class="about-content pb-5">
                        <div class="section-heading">
                            <h2 class="section__title pb-3 lh-50">صفحه مورد نظر در دسترس نمی باشد</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endif
@endsection
