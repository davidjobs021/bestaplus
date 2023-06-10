@extends('admin')
@section('main')
        <div class="dashboard-heading mb-5">
            <h3 class="fs-22 font-weight-semi-bold">پروفایل من</h3>
        </div>
        <div class="profile-detail mb-5">
            <ul class="generic-list-item generic-list-item-flash">
                @foreach($users as $user)
                <li><span class="profile-name">تاریخ ثبت نام: </span><span class="profile-desc">{{jdate($user->created_at)->format('%A, %d %B %Y')}} </span></li>
                <li><span class="profile-name">نام و نام خانوادگی: </span><span class="profile-desc">{{($user->name)}}</span></li>
                <li><span class="profile-name">نام کاربری: </span><span class="profile-desc">{{($user->username)}}</span></li>
                <li><span class="profile-name">ایمیل: </span><span class="profile-desc">{{($user->email)}}</span></li>
                <li><span class="profile-name">شماره تلفن: </span><span class="profile-desc">{{($user->phone)}}</span></li>
                <li>
                    <span class="profile-name">بیو: </span>
                    <span class="profile-desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</span>
                </li>
                @endforeach
            </ul>
        </div>
@endsection
