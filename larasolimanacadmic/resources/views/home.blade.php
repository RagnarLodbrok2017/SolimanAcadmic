@extends('layouts.welcomeLayout')

@section('content')
    <style>
        .home_cards{
            margin-top: 100px;
            margin-bottom: 20px;
        }
        .card{
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
        }
    </style>
    <main>
        <div class="container">
            <section class="home_cards">
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
            </section>
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
