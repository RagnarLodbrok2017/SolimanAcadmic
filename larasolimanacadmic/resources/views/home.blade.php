@extends('layouts.welcomeLayout')

@section('content')
    <style>
        .home_cards {
            margin-top: 100px;
            margin-bottom: 20px;
        }

        .home_cards .row .card {
            background-color: #f2195d;
            margin-left: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            border: 1px solid red;
            color: #fff;
        }

        .home_cards .row .card .head,
        .home_cards .row .card .footer{
            border-radius: 5px;
            margin: 5px;
            background-color: #fff;
            padding: 10px;
            color: #f2195d;
        }
        .home_cards .row .card .head h1{
            font-weight: bold;
            font-size: 45px;
        }
        .home_cards .row .card .body{
            margin: 20px;
        }
        .home_cards .row .card .body p{
            float: right;
            font-size: 26px;
            margin-top: 5px;
        }
        .home_cards .row .card .body .icon{
            font-size: 40px;
            color: #fff;

        }
        .home_cards .row .card .footer .button
        {
            width: 100%;
            border: 2px solid #d43f3a;
            font-size: 20px;
            color: #fff;
        }
        .home_cards .row .card .footer .button a{
            font-size: 20px;
            color: #fff;
            width: 100%;
        }
        .home_cards .row .card .footer .button i{
            position: absolute;
            margin: 11px 178px;
        }

        /*.card{
            border: 1px solid #b8c2cc;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            padding: 10px 0 30px 0;
            background: #e0e0e04d;
            -webkit-box-shadow: -8px 11px 15px 1px rgba(107,107,107,0.38);
            -moz-box-shadow: -8px 11px 15px 1px rgba(107,107,107,0.38);
            box-shadow: -8px 11px 15px 1px rgba(107,107,107,0.38);
        }
        .card-img-top{
            height: 191px;
            border-bottom: 1px solid #ccc;
        }
        .card-body{

        }
        .card-body h4{
            color: #1b4b72;
            font-size: 20px;
            font-weight: bold;
            padding: 2px;
        }
        .card-body p{
            font-size: 17px;
            color: #2b2b2b;
            padding: 3px;
        }*/
    </style>
    <main>
        <div class="container">
            <section class="home_cards">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="head text-center">
                                <h1>السنتر</h1>
                            </div>
                            <div class="body">
                                <p class="lead">
                                    أهلا بك فى ادارة السنتر
                                </p>
                                <div class="icon"><i class="fa fa-book"></i></div>
                            </div>
                            <div class="footer">
                                <div class="button btn btn-danger">
                                    <i class="fa fa-bolt d-lg-none"></i>
                                    <a href="../center" class="btn">انقر للذهاب</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="head text-center">
                                <h1>الحضانة</h1>
                            </div>
                            <div class="body">
                                <p class="lead">
                                    أهلا بك فى ادارة الحضانة
                                </p>
                                <div class="icon"><i class="fa fa-bus"></i></div>
                            </div>
                            <div class="footer">
                                <div class="button btn btn-danger">
                                    <i class="fa fa-bolt"></i>
                                    <a href="../incubation" class="btn">انقر للذهاب</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            {{--<section class="home_cards">
                <div class="col-md-3">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset('img/HomeImages/est.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">دار الاستضافة</h4>
                        <p class="card-text">يتم فيها استضافة الأطفال وحمايتهم والحفاظ عليهم وجعلهم يلعبون لحين وصول أى من والديهم يتم تسليمه الطفل .</p>
                        <a href="#" class="btn btn-primary">انقر للذهاب</a>
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset('img/HomeImages/quran.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">تحفيظ القرآن</h4>
                        <p class="card-text">يتم بها تحفيظ الطالب القرأن الكريم وتلاوته بصورة صحيحه و  لتعلم القراءة والتلاوة القرآنية والتجويد وجعله سهل.</p>
                        <a href="#" class="btn btn-primary">انقر للذهاب</a>
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset('img/HomeImages/center2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">السنتر</h4>
                        <p class="card-text">يتم بها اشتراك الطالب لأخذ الدروس مع المدرسين ولتعليمهم المناهج الدراسيه كما هى على أفضل مستوى.</p>
                        <a href="#" class="btn btn-primary">انقر للذهاب</a>
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset('img/HomeImages/incu2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">الحضانة</h4>
                        <p class="card-text">يتم بها اشتراك الطالب ليمر بالمرحله التعليميه الأولى ويصبح قادر على القرأة والكتابه بكل سهوله ويسر.</p>
                        <a href="../incubation" class="btn btn-primary">انقر للذهاب</a>
                    </div>
                </div>
            </div>
            </section>--}}
        </div>
    </main>
    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">Dashboard</div>--}}

    {{--<div class="card-body">--}}
    {{--@if (session('status'))--}}
    {{--<div class="alert alert-success" role="alert">--}}
    {{--{{ session('status') }}--}}
    {{--</div>--}}
    {{--@endif--}}

    {{--You are logged in!--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
