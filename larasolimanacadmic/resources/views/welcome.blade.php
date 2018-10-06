@extends('layouts.welcomeLayout')

@section('content')
    <main id="main">         <!-- main banner section start here -->
        <section class="section main-banner bg-img-full" style="background-image: url({{asset('img/welcomeImages/slider/h1-slide-2.jpg')}}" data-scroll-index="0" data-parallax-bg-img="http://placehold.it/1920x1080" data-stellar-background-ratio="0.2">
            <span class="overlay"></span>
            <div class="container">
                <div class="row">
                    <div class="pad-top-lg hidden-xs"></div>
                    <div class="col-xs-12 text-right pad-top-md pad-bottom-md col-md-push-4 col-md-8">
                        <h1 class="heading text-uppercase"> موقع <span class="main-color">أكاديمية</span><br>مسجد الرحمن التعليمى</h1>
                        <span class="divider white-bg center"> <span class="main-bg-color"></span></span>
                        <p class="lead">مرحبا بكم فى موقع أكاديمية مسجد الرحمن التعليمية لتعليم الأطفال</p>
                        <a href="https://www.youtube.com/watch?v=btUPp-VJGos" class="btn-play lightbox fancybox.iframe"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="pad-top-lg hidden-xs"></div>
            </div>
        </section>
        <!-- main banner section end here -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- quote form start here -->
                    <div class="quote-form" data-scroll-index="1">
                        <form id="contactForm" data-toggle="validator">
                            <fieldset>
                                <div class="form-group">
                                    <input type="email" id="email" placeholder="الأميل" class="form-control" required data-error="NEW ERROR MESSAGE">
                                </div>
                                <div class="form-group">
                                    <input type="tel" id="phone" placeholder="التليفون" class="form-control" required data-error="NEW ERROR MESSAGE">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="name" placeholder="الأسم" class="form-control" required data-error="NEW ERROR MESSAGE">
                                </div>
                                <button class="btn btn-default main-bg-color" type="submit" id="form-submit">ارسال  رسالة</button>
                                <div id="msgSubmit" class="form-message hidden"></div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- quote form end here -->
                    <span class="shadow"></span>
                </div>
            </div>
        </div>
        <div class="container pad-top-md" data-scroll-index="2">
            <div class="row">
                <div class="col-xs-12">
                    <!-- start of gallery-box -->
                    <div class="gallery-box">
                        <a href="http://placehold.it/1600x783" data-width="1600" data-height="783" data-fancybox="gallery" class="lightbox box"><img src="{{asset('img/welcomeImages/about/about1.png')}}" alt="img" class="img-responsive"></a>
                        <a href="http://placehold.it/1600x783" data-width="1600" data-height="783" data-fancybox="gallery" class="lightbox box"><img src="{{asset('img/welcomeImages/about/about2.jpg')}}" alt="img" class="img-responsive"></a>
                        <a href="http://placehold.it/1600x783" data-width="1600" data-height="783" data-fancybox="gallery" class="lightbox box"><img src="{{asset('img/welcomeImages/about/about3.jpg')}}" alt="img" class="img-responsive"></a>
                        <a href="http://placehold.it/1600x783" data-width="1600" data-height="783" data-fancybox="gallery" class="lightbox box"><img src="{{asset('img/welcomeImages/about/about4.jpg')}}" alt="img" class="img-responsive"></a>
                        <a href="http://placehold.it/1600x783" data-width="1600" data-height="783" data-fancybox="gallery" class="lightbox box"><img src="{{asset('img/welcomeImages/about/about5.jpg')}}" alt="img" class="img-responsive"></a>
                        <a href="http://placehold.it/1600x783" data-width="1600" data-height="783" data-fancybox="gallery" class="lightbox box"><img src="{{asset('img/welcomeImages/about/about6.jpg')}}" alt="img" class="img-responsive"></a>
                    </div><!-- end of gallery-box -->
                </div>
            </div>
        </div>
        <div class="container pad-top-sm" data-scroll-index="2">
            <div class="row">
                <!-- start of info-box -->
                <div class="col-xs-12 col-sm-6 col-md-3 info-box pad-bottom-md">
                    <h2 class="subheading" style="margin-left: 212px">التعليم</h2>
                    <p>نحن نسير على نظام تعليمى عالى لجعل الأطفال متفوقون</p>
                </div><!-- end of info-box -->
                <!-- start of info-box -->
                <div class="col-xs-12 col-sm-6 col-md-3 info-box pad-bottom-md">
                    <h2 class="subheading" style="margin-left: 212px">نظرتنا</h2>
                    <p>انشاء جيل قادر على السير فى طريق التفوق دائما ولذلك نستعين بمدرسين على أعلى مستوى</p>
                </div><!-- end of info-box -->
                <!-- start of info-box -->
                <div class="col-xs-12 col-sm-6 col-md-3 info-box pad-bottom-md">
                    <h2 class="subheading" style="margin-left: 212px">مهمتنا</h2>
                    <p>تعليم الأطفال والحفاظ على صحتهم وجعلهم قادرين على القراءة والكتابة أيضا</p>
                </div><!-- end of info-box -->
                <!-- start of info-box -->
                <div class="col-xs-12 col-sm-6 col-md-3 info-box pad-bottom-md">
                    <h2 class="subheading" style="margin-left: 212px">الحضانة</h2>
                    <p> نحن نجمع أفضل المدرسين ليعلموا الأطفال ويكونوا قادرين على معرفة الخطأ من الصواب</p>
                </div><!-- end of info-box -->
            </div>
        </div>
        <div class="border-top"></div>
        <div class="container" data-scroll-index="3">
            <div class="pad-top-lg hidden-sm"></div>
            <div class="row">
                <div class="col-xs-12 col-md-7 pad-top-lg mar-bottom-xs">
                    <!-- start of main-heading -->
                    <header class="main-heading mar-bottom-md">
                        <h2 class="heading text-capitalize"><span class="main-color">كيف تكون الحضانة</span> <br>والنظام التعليمى بها</h2>
                        <span class="divider grey-bg" style="font-size: 16px"> <span class="main-bg-color"></span></span>
                        <p style="font-size: 16px"> تسير خطة كاملة على نهج تعليمى واضح وصريح ومتقدم وكما أوضحنا ان الطالب سيكون متفوق دائما <br class="hiddem-md hidden-sm hidden-xs">فنحن نتحدث عن مستقبل الطفل وبناءه لمجتمعه وسيكون قادر على تحديد الصواب من الخطأ <br class="hiddem-md hidden-sm hidden-xs">فنحن فى كل الأحوال نجعله</p>
                    </header><!-- end of main-heading -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <h2 class="subheading"><i class="fa fa-lightbulb-o main-color" aria-hidden="true"></i> تصحيح أخطأه والتعلم منها</h2>
                            <p>فالطالب سيكون قادر على تصحيح الأخطاء والتعلم منها والتأقلم مع نظام التعليم</p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <h2 class="subheading"><i class="fa fa-users main-color" aria-hidden="true"></i> التأقلم مع الطلاب الأخرون</h2>
                            <p>قادر على التأقلم مع زملائه واكتساب مهارة التحدث والتعلم سريعا ويتعلم الكتابة والقراءة معهم وحل مشاكل الطالب</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <img src="{{asset('img/welcomeImages/about/about8.jpg')}}" alt="img" class="img-responsive hidden-sm" style="height: 600px">
                </div>
            </div>
        </div>
        <!-- start of test-section -->
        <div class="bg-img-full section test-section" style="background-image: url({{asset('img/welcomeImages/teacherwall2.jpg')}});" data-scroll-index="4" data-parallax-bg-img="images/teacherwall2.jpg" data-stellar-background-ratio="0.2">
            <span class="overlay"></span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-md-push-1">
                        <div class="pad-top-xs"></div>
                        <div class="slider main-slider">
                            <div class="slide text-center pad-top-lg pad-bottom-lg">
                                <img src="{{asset('img/welcomeImages/avatars/avatar1.jpg')}}" alt="img" class="img-responsive" style="width: 88px;height: 88px">
                                <p>كلنا يعرف أهمية ودور المعلم الكبير فالمعلم رسول لنقل العلم وتعليمه وهو الذي يربي ويخرج الأجيال لذلك يسرنا أن نقدم لكم أجمل حكم و كلمات عن المعلم
                                    المعلم الممتاز هو ذلك الذي لا يقتصر على إيصال المعارف إلى أذهان تلاميذه، بل يضع لهم الخطط للدراسة بحيث يمكنهم أن يستغنوا عنه وأن يُعَلِّمُوا أنفسهم مستقلين مدى حياتهم أن التعليم بنوعيه الكمي والكيفي، هو الطريق إلى النهوض من مستنقع الجهل والتخلف، والذي أهم عناصر نجاحه المعلم والمربي الناجح، المحب لعمله ثم المنهج الذي يسهم في فتح العقول</p>
                                <i class="fa fa-users main-color" aria-hidden="true"></i>
                                <strong class="main-color name text-uppercase" style="font-size: 20px">- أحمد مدحت محمد -</strong>
                                <span class="subtitle text-uppercase" style="font-size: 16px">مدرس عربى و حساب</span>
                            </div>
                            <div class="slide text-center pad-top-lg pad-bottom-lg">
                                <img src="{{asset('img/welcomeImages/avatars/avatar2.png')}}" alt="img" class="img-responsive" style="width: 88px;height: 88px">
                                <p>كلنا يعرف أهمية ودور المعلم الكبير فالمعلم رسول لنقل العلم وتعليمه وهو الذي يربي ويخرج الأجيال لذلك يسرنا أن نقدم لكم أجمل حكم و كلمات عن المعلم
                                    المعلم الممتاز هو ذلك الذي لا يقتصر على إيصال المعارف إلى أذهان تلاميذه، بل يضع لهم الخطط للدراسة بحيث يمكنهم أن يستغنوا عنه وأن يُعَلِّمُوا أنفسهم مستقلين مدى حياتهم أن التعليم بنوعيه الكمي والكيفي، هو الطريق إلى النهوض من مستنقع الجهل والتخلف، والذي أهم عناصر نجاحه المعلم والمربي الناجح، المحب لعمله ثم المنهج الذي يسهم في فتح العقول</p>
                                <i class="fa fa-users main-color" aria-hidden="true"></i>
                                <strong class="main-color name text-uppercase" style="font-size: 20px">- محمد شعبان أبراهيم -</strong>
                                <span class="subtitle text-uppercase" style="font-size: 16px">مدرس انجليزى ولغة دينية</span>
                            </div>
                            <div class="slide text-center pad-top-lg pad-bottom-lg">
                                <img src="{{asset('img/welcomeImages/avatars/avatar3.png')}}" alt="img" class="img-responsive" style="width: 88px;height: 88px">
                                <p>كلنا يعرف أهمية ودور المعلم الكبير فالمعلم رسول لنقل العلم وتعليمه وهو الذي يربي ويخرج الأجيال لذلك يسرنا أن نقدم لكم أجمل حكم و كلمات عن المعلم
                                    المعلم الممتاز هو ذلك الذي لا يقتصر على إيصال المعارف إلى أذهان تلاميذه، بل يضع لهم الخطط للدراسة بحيث يمكنهم أن يستغنوا عنه وأن يُعَلِّمُوا أنفسهم مستقلين مدى حياتهم أن التعليم بنوعيه الكمي والكيفي، هو الطريق إلى النهوض من مستنقع الجهل والتخلف، والذي أهم عناصر نجاحه المعلم والمربي الناجح، المحب لعمله ثم المنهج الذي يسهم في فتح العقول</p>
                                <i class="fa fa-users main-color" aria-hidden="true"></i>
                                <strong class="main-color name text-uppercase" style="font-size: 20px">- ياسمين سمير محمد -</strong>
                                <span class="subtitle text-uppercase" style="font-size: 16px">مدرسة ماث و حساب</span>
                            </div>
                        </div>
                        <div class="pad-top-xs"></div>
                    </div>
                </div>
            </div>
        </div><!-- end of test-section -->
        <div class="section dark-bg text-center pad-top-sm" data-scroll-index="4">
            <!-- start of line box -->
            <div class="container line-box">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="line">
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about2.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about5.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about1.png')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about7.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about4.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about1.png')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about6.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about7.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about5.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about2.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about3.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                            <div class="box pad-bottom-sm">
                                <img src="{{asset('img/welcomeImages/about/about7.jpg')}}" alt="image" style="width: 115px;height: 64px">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of line box -->
        </div>
        <div class="container pad-top-md" data-scroll-index="5">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <!-- start of main-heading -->
                    <header class="main-heading mar-bottom-md">
                        <h2 class="heading text-capitalize"><span class="main-color">أفضل الخدمات التى نقدمها</span> <br>للعملاء الحاليين والجدد</h2>
                        <span class="divider grey-bg center"> <span class="main-bg-color"></span></span>
                        <p style="font-size: 16px">يلتحِق الأطفال إلى الحضانة أو الرّوضة أو مرحلة ما قبل المدرسة في سنّ الثّالثة حتّى الرّابعة من عمرهم، وهو العمر الّذي يبدأ فيه عقلهم بالاستيعاب ويُبدون الاهتمام بتعلّم الكتابة والقراءة <br class="hiddem-md hidden-sm hidden-xs">ويكونون مستعديّن للدّراسة، ولكنّ دراستهم تكون مُبسّطةً ومُمتعةً وبحاجةٍ إلى إبداعٍ مستمرٍّ من المعلّم</p>
                    </header><!-- end of main-heading -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <img src="{{asset('img/welcomeImages/teacherwall3.jpg')}}" alt="image" class="img-responsive center-img" style="width: 950px;height: 575px">
                </div>
            </div>
        </div>
        <div class="container pad-top-md text-center pad-bottom-xs" data-scroll-index="5">
            <div class="row">
                <!-- start of info-box -->
                <div class="col-xs-12 col-sm-4 info-box mar-bottom-sm">
                    <i class="fa fa-lightbulb-o main-color top-icon mar-bottom-xs" aria-hidden="true"></i>
                    <h2 class="subheading" style="font-size: 18px">تعليم مسك القلم</h2>
                    <p>إعطاء الطّفل قطعةً من النّقود المعدنيّة أو كرةً صغيرة ليمسكها بإصبعي الخنصر والبنصر<br class="hiddem-md hidden-sm hidden-xs">إدخال القلم داخل طابةٍ صغيرةٍ
                    </p>وتثبيتها في مُقدّمة القلم، والطّلب من الطّفل أن يُمسك الطّابة بأصابعه ليكون بهذه الطّريقة قد مسك القلم بالشّكل الصّحيح
                </div><!-- end of info-box -->
                <!-- start of info-box -->
                <div class="col-xs-12 col-sm-4 info-box mar-bottom-sm">
                    <i class="fa fa-users main-color top-icon mar-bottom-xs" aria-hidden="true"></i>
                    <h2 class="subheading" style="font-size: 18px">تعليم الحروف</h2>
                    <p>يتعلّم الأطفال الحروف عن طريق سماع لفظ الحرف من قبل المُعلّم، ويردّدونه خلفه مرّاتٍ عدّة حتّى يحفظوا لفظه وشكله<br class="hiddem-md hidden-sm hidden-xs"></p>ويتمكّنوا من ربط اللّفظ مع الشّكل، ويتعلّمون كتابة الحروف عن طريق تشبيه الحروف بأشكالٍ مألوفةٍ لديهم مثل البطّة والصّحن
                </div><!-- end of info-box -->
                <!-- start of info-box -->
                <div class="col-xs-12 col-sm-4 info-box mar-bottom-sm">
                    <i class="fa fa-thumbs-up main-color top-icon mar-bottom-xs" aria-hidden="true"></i>
                    <h2 class="subheading" style="font-size: 18px">تعليم الأرقام</h2>
                    <p>يتعلّم الأطفال في المرحلة الأولى من الحضانة الأرقام كتابةً وقراءةً، ويتمّ ذلك<br class="hiddem-md hidden-sm hidden-xs">عن طريق التّرديد خلف المعلّم كذلك ليتعلّموا بعدها العدّ ويستطيعوا التّمييز بين الأرقام ويتمكّنوا من حصر عددٍ مُعيّنٍ من الأغراض أو الأشكال.</p>
                </div><!-- end of info-box -->
            </div>
        </div>

        {{-- Start of  Pricing Table --}}
        <section class="grey-bg2" data-scroll-index="6">
            <div class="container pad-top-md pad-bottom-lg">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <!-- start of main-heading -->
                        <header class="main-heading mar-bottom-md">
                            <h2 class="heading text-capitalize"><span class="main-color">السعر &amp; الخطة</span> <br>هذا يعتمد عليك</h2>
                            <span class="divider grey-bg center"> <span class="main-bg-color"></span></span>
                            <p>هذا يعتمد على أى مرحلة ستختار وأى مركز يعنى الحضانة او التحفيظ او السنتر او دار الاستضافة <br class="hiddem-md hidden-sm hidden-xs">الأسعار بالأسفل وشكرا</p>
                        </header><!-- end of main-heading -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center col-sm-4">
                        <!-- start of price-box -->
                        <div class="price-box">
                            <span class="title text-uppercase">التحفيظ</span>
                            <span class="price mar-bottom-xs"><span class="add">ج</span>25</span>
                            <p>هذا سعر المقدمة والاشتراك معنا و الاشتراك يكون شهريا فى التحفيظ ويتم ذلك بمتابعة مركز التحفيظ ومعرفة الحديث بها لذلك يمكنك تقديم طلب من هنا</p>
                            <a data-fancybox data-src="#popup1" href="javascript:;" class="btn btn-default main-bg-color lg-round">تقديم الطلب</a>
                        </div><!-- end of price-box -->
                    </div>
                    <div class="col-xs-12 text-center col-sm-4">
                        <!-- start of price-box -->
                        <div class="price-box">
                            <span class="title text-uppercase">السنتر</span>
                            <span class="price mar-bottom-xs"><span class="add">ج</span>100</span>
                            <p>هذا سعر المقدمة والاشتراك معنا و الاشتراك يكون شهريا فى السنتر ويتم ذلك بمتابعة السنتر ومعرفة الحديث بها لذلك يمكنك تقديم طلب من هنا</p>
                            <a data-fancybox data-src="#popup1" href="javascript:;" class="btn btn-default main-bg-color lg-round">تقديم الطلب</a>
                        </div><!-- end of price-box -->
                    </div>
                    <div class="col-xs-12 text-center col-sm-4">
                        <!-- start of price-box -->
                        <div class="price-box">
                            <span class="title text-uppercase">الحضانة</span>
                            <span class="price mar-bottom-xs"><span class="add">ج</span>200</span>
                            <p> هذا سعر المقدمة ولكن الاشتراك يكون شهريا فى الحضانة ويتم ذلك بمتابعة الحضانة ومعرفة الحديث بها لذلك يمكنك تقديم طلب من هنا </p>
                            <a data-fancybox data-src="#popup1" href="javascript:;" class="btn btn-default main-bg-color lg-round">تقديم الطلب</a>
                        </div><!-- end of price-box -->
                    </div>
                </div>
            </div>
        </section>


        <!-- start of quote-section -->
        <section class="bg-img-full section quote-section" style="background-image: url({{asset('img/welcomeImages/rawpixel-1066966-unsplash.jpg')}});" data-scroll-index="6" data-parallax-bg-img="http://placehold.it/1920x1080" data-stellar-background-ratio="0.2">
            <span class="overlay"></span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-md-push-1 text-center">
                        <h2 class="main-color text-uppercase">شكرا لك لتصفح موقعنا التعليمى</h2>
                        <span class="divider white-bg center"> <span class="main-bg-color"></span></span>
                        <p>يهدف موقعنا تعليم اللغة العربية للأطفال من خلال اللعب والتسلية دون إشعار الطفل بأنه يتعلم. برنامج أ ب ت مصمم للأطفال من عمر 4-7 سنوات، ولا يتطلب أي معرفة مسبقة بالقراءة<br class="hiddem-md hidden-sm hidden-xs">ولمتابعة اأخبارنا أنقر على متابعة </p>
                        <a href="#" class="btn btn-default main-bg-color sm-round" data-scroll-nav="1">متابعة</a>
                    </div>
                </div>
            </div>
        </section><!-- end of quote-section -->
    </main><!-- end of main -->
    <!-- start of footer -->
    <footer id="footer" class="dark-bg text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="logo"><a href="#"><img src="{{asset('img/welcomeImages/logo1.png')}}" alt="img" class="img-responsive" style="width: 130px;height: 110px"></a></div>
                    <!-- start of social -->
                    <ul class="social list-inline">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                    </ul><!-- end of social -->
                    <p>2018 © Ahmed R.Mohamed . All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer><!-- end of footer -->
@endsection
