<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>
        @yield('title')
    </title>
    <script src="/js/blogpage/read-artilce-page.blade.js"></script>
    <link rel="stylesheet" href="/css/blogpage/read-artilce-page.blade.css">
    <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @yield('css')
    @yield('js')
</head>

<body>
    <div style="height: 70px"></div>
    <div class="header d-flex justify-content-between">
        <div class="header-logo "><a href="{{ route('welcome') }}"><img
                    src="{{ asset('/storage/icons/DucNV-_2_.svg') }}" alt=""></a></div>
        <div class="header-nav ">

            <a class="home" href="{{ route('welcome') }}">Trang chủ</a>
            @foreach ($categories as $item)
                <a class="category-{{ $item->id }}" href="/categories/{{ $item->id }}">{{ $item->name }}</a>
            @endforeach

        </div>
        <div class="header-contact">
            @foreach ($contacts as $item)
                <a href="{{ $item->config_value }}"><i class="fa fa-{{ $item->config_key }}"></i></a>
            @endforeach
        </div>
    </div>

    <div class="main-contain">
        <div class="inner-wraper container">
            <div class="article-home">
                @yield('content')
            </div>

            <div class=" article-new">
                <div class="article-new-box">


                    <h4 class="article-new-header-content">
                        BÀI VIẾT MỚI
                    </h4>


                    <ul class="article-new-list">
                        @foreach ($articles as $item)
                            <li id="article-{{ $item->id }}">
                                <a href="/categories/{{$item->category->id}}/{{$item->id}}">{{ $item->title }}</a>
                            </li>
                        @endforeach
                    </ul>


                </div>
            </div>
        </div>


    </div>
    <div class="about">
        <h5>Tác Giả</h5>
        <h2>Nguyễn Văn Đức</h2>
    </div>
    <div class="end-page">
        <div class="end-contact">
            @foreach ($contacts as $item)
                <a href="{{ $item->config_value }}"><i class="fa fa-{{ $item->config_key }}"></i></a>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
