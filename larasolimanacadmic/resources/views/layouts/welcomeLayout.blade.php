<!DOCTYPE html>
<html lang="en">
<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- set the apple mobile web app capable -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- set the HandheldFriendly -->
    <meta name="HandheldFriendly" content="True">
    <!-- set the apple mobile web app status bar style -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- set the description -->
    <meta name="rahman" content="rahman - Acadmic">
    <meta name="rahman" content="rahman - Acadmic">
    <!-- Page Title -->
    <title>Official site</title>
    <!-- include the site stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700%7cRaleway:400,700" rel="stylesheet">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/main/bootstrap.min.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/welcomeCss/fonts-icons.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{asset('css/welcomeCss/plugin-resets.css')}}">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{asset('css/welcomeCss/welcome.css')}}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{asset('css/welcomeCss/responsive.css')}}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{asset('css/welcomeCss/color.css')}}">
</head>
<body>
<!-- start of page header -->
<header id="header" data-scroll-index="0">
    <div class="holder">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="logo pull-left"><a href="../"><img src="{{asset('img/welcomeImages/logo2.png')}}"
                                                                   alt="academy" class="img-responsive"
                                                                   style="width: 160px;height: 35px"></a></div>
                    <a href="#" class="nav-opener pull-right"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <!-- page navigation start here -->
                    <nav id="nav">
                        <ul class="list-inline text-right">
                            @if(Route::has('login'))
                                @auth
                                    <li><a href="{{url('/home')}}" class="smooth">لوحة التحكم</a></li>
                                @else
                                    <li><a href="{{route('login')}}" class="smooth">تسجيل الدخول</a></li>
                                @endauth
                            @endif
                            @if(Request()->is('/'))
                                <li><a href="#" data-scroll-nav="6" class="smooth">الأسعار</a></li>
                            <li><a href="#" data-scroll-nav="5" class="smooth">الخدمات</a></li>
                            <li><a href="#" data-scroll-nav="4" class="smooth">المدرسين</a></li>
                            <li><a href="#" data-scroll-nav="3" class="smooth">ماذا نفعل</a></li>
                            <li><a href="#" data-scroll-nav="2" class="smooth">معلومات عنا</a></li>
                            <li><a href="#" data-scroll-nav="0" class="smooth active">الرئيسيه</a></li>
                                @else
                                    <li><a href="../" class="smooth active">السابقة</a></li>
                                    <li><a href="../logout" class="smooth active">تسجيل الخروج</a></li>
                                @endif
                        </ul>
                    </nav>
                    <!-- page navigation end here -->
                </div>
            </div>
        </div>
    </div>
</header><!-- end of page header -->

@yield('content')

<!-- start of form pop up -->
<div id="popup1" style="display: none;">
    <!-- start of quote-form style2 -->
    <div class="quote-form style2">
        <form id="contactForm2" data-toggle="validator">
            <fieldset>
                <span class="title">الحجز</span>
                <span class="txt">أختار الخطه</span>
                <div class="form-group">
                    <input type="text" id="name2" placeholder="الأسم" class="form-control" required
                           data-error="NEW ERROR MESSAGE">
                </div>
                <div class="form-group">
                    <input type="email" id="email2" placeholder="الأميل" class="form-control" required
                           data-error="NEW ERROR MESSAGE">
                </div>
                <div class="form-group">
                    <input type="tel" id="phone2" placeholder="التليفون" class="form-control" required
                           data-error="NEW ERROR MESSAGE">
                </div>
                <div class="form-group">
                    <select id="choose_plan" name="choose_plan" class="form-control">
                        <option value="">Choose plan</option>
                        <option value="STUDENT">حضانة</option>
                        <option value="USER">سنتر</option>
                        <option value="COMPANY">تحفيظ</option>
                    </select>
                </div>
                <div id="msgSubmit2" class="form-message hidden"></div>
                <button class="btn btn-default main-bg-color" type="submit" id="form-submit2">حجز</button>
            </fieldset>
        </form>
    </div><!-- end of quote-form style2 -->
</div><!-- end of form pop up -->
<!-- Back Top of the page -->
<span id="back-top" class="fa fa-angle-up main-bg-color"></span>

<script src="{{asset('js/welcomeJs/jquery.js')}}"></script>
<script src="{{asset('js/welcomeJs/plugins.js')}}" defer></script>
<script src="{{asset('js/welcomeJs/jquery.main.js')}}" defer></script>
{{--<div id="style-changer" data-src="style-changer.html"></div>--}}
</body>
</html>
