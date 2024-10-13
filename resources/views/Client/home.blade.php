<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web tin tức</title>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- bootstrap styles-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
    <!-- ionicons font -->
    <link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet">
    <!-- animation styles -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
    <!-- custom styles -->
    <link href="{{asset('assets/css/custom-red.css')}}" rel="stylesheet" id="style">
    <!-- owl carousel styles-->
    <link rel="stylesheet" href={{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.transitions.css')}}">
    <!-- magnific popup styles -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
        .phantrang{
            margin: 32px;
        }
        .trangchon{
            padding-left: 16px;
            padding-right: 16px;
            padding-top: 8px;
            padding-bottom: 8px;
            color: white;
            font-weight: bold;
            border-radius: 0.375rem;
            display: inline-block;
            background-color: rgb(202 138 4);
            text-align: center;
        }
        .trang{
            padding-left: 16px;
            padding-right: 16px;
            padding-top: 8px;
            padding-bottom: 8px;
            color: white;
            font-weight: bold;
            border-radius: 0.375rem;
            display: inline-block;
            background-color:#A3A3A3;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- preloader start -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <div class="wrapper">
        <!-- header toolbar start -->
        <div class="header-toolbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-16 text-uppercase">
                        <div class="row">
                            <div class="col-sm-8 col-xs-16">
                                <ul id="inline-popups" class="list-inline">
                                    @if (!session()->has('user'))
                                    <li><a class="" href="{{route('login')}}" data-effect="mfp-zoom-in">Đăng nhập</a></li>
                                    <li><a class="" href="{{route('register')}}" data-effect="mfp-zoom-in">Đăng ký</a></li>
                                    @endif
                                    @if (session()->has('user'))
                                    <li><a class="" href="{{route('logout')}}" data-effect="mfp-zoom-in">Đăng xuất</a></li>
                                        @if (session('user.role') === 'admin')
                                            <li><a class="" href="{{route('admin.index')}}" data-effect="mfp-zoom-in">Admin Dashboard</a></li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <div class="col-xs-16 col-sm-8">
                                <div class="row">
                                    <div id="weather" class="col-xs-16 col-sm-8 col-lg-9">
                                        @if (session()->has('user.username'))
                                        Welcome {{ session('user.username') }} to my website!
                                        @endif

                                    </div>
                                    <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-header">
            <!-- header start -->
            <div class="container header">
                <div class="row">
                    <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="#">globalnews</a></div>
                    <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="{{asset('assets/images/ads/468-60-ad.gif')}}" width="468" height="60" alt="" /></div>
                </div>
            </div>
            <!-- header end -->
            <!-- nav and search start -->
            <div class="nav-search-outer">
                <!-- nav start -->

                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                </div>
                                <div class="collapse navbar-collapse" id="navbar-collapse">
                                    <ul class="nav navbar-nav text-uppercase main-nav ">
                                        <li class="active"><a href="{{route('posts.index')}}">Trang chủ</a></li>
                                        @foreach ($categories as $category)
                                        <li><a href='{{ route('posts.category', $category->id) }}'>{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- nav end -->
                    <!-- search start -->

                    <div class="search-container ">
                        <div class="container">
                            <form action="{{route('posts.search') }}" method="GET" role="search">
                                <input id="search-bar" name="keyword" type="search" placeholder="Nhập từ khóa..." aria-label="Search" >
                                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <!-- search end -->
                </nav>
                <!--nav end-->
            </div>
            <!-- nav and search end-->
        </div> <!-- preloader end -->
        <div class="container blogging-style">
            <div class="page-header">

                <h1>Trang chủ</h1>

            </div>
            @if (isset($keyword))
            <div>
                <h2>Bài viết có từ khóa: <strong>{{$keyword}}</strong> </h2>
            </div>
            @endif



            <div class="row">
                <div class="ind">
                    @foreach ($posts as $post)
                    @if ($post->status == 'PUBLIC')
                    <div class="col">
                        <li class=bantin>
                            <a href='{{ route('posts.detail',$post->id) }}'><img src='{{ $post->image}}' width='200px' height='150px' /></a>
                            <a href='{{ route('posts.detail',$post->id) }}'>
                                <h4>{{ $post->title }}</h4>
                            </a>
                        </li>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>



            <!-- calendar start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50">
                <div class="single pull-left"></div>
            </div>
            <!-- calendar end -->

        </div>




        <!-- Footer start -->
        <footer>
            <div class="top-sec">
                <div class="container ">
                    <div class="row match-height-container">
                        <div class="col-sm-6 subscribe-info wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="btm-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-16">
                            </div>
                        </div>
                    </div>
                </div>
        </footer><!-- jQuery -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <!--jQuery easing-->
        <script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
        <!-- bootstrab js -->
        <script src="{{asset('assets/js/bootstrap.js')}}"></script>
        <!--style switcher-->
        <script src="{{asset('assets/js/style-switcher.js')}}"></script> <!--wow animation-->
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <!-- time and date -->
        <script src="{{asset('assets/js/moment.min.js')}}"></script>
        <!--news ticker-->
        <script src="{{asset('assets/js/jquery.ticker.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
        <!-- magnific popup -->
        <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
        <!-- weather -->
        <script src="{{asset('assets/js/jquery.simpleWeather.min.js')}}"></script>
        <!-- calendar-->
        <script src="{{asset('assets/js/jquery.pickmeup.js')}}"></script>
        <!-- go to top -->
        <script src="{{asset('assets/js/jquery.scrollUp.js')}}"></script>
        <!-- scroll bar -->
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.plus.js')}}"></script>
        <!--masonry-->
        <script src="{{asset('assets/js/masonry.pkgd.js')}}"></script>
        <!--media queries to js-->
        <script src="{{asset('assets/js/enquire.js')}}"></script>
        <!--custom functions-->
        <script src="{{asset('assets/js/custom-fun.js')}}"></script>
</body>

</html>
<style>
    .ind {
        width: 70%;
    }

    .col {
        float: left;
        width: 30%;
        padding: 20px;
    }

    .bantin {
        list-style-type: none;
    }

    .advertisements {
        float: right;
        width: 25%;
    }

    h4 {
        margin-top: 17px;
    }
</style>
