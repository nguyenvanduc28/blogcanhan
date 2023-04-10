@extends('frame-page.top-nav')

@section('title')
    BLOG CỦA ĐỨC
@endsection
@section('category')
TALKING WITH DUC
@endsection
@section('js')
    <script src="{{ asset('/js/blogpage/welcome.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/blogpage/welcome.css') }}">
@endsection
@section('content')

@foreach ($datas as $item)
<div id="article-block">
    <div class="article-block-content">

        <div class="img-article"><img src="{{ $item->feature_image_path }}" alt=""></div>
        <div class="content-block">

            <div class="category-article"><span>{{ $item->category->name }}</span></div>
            <h2 class="title-article"><a href="/categories/{{$item->category->id}}/{{$item->id}}">{{ $item->title }}</a></h2>
            <div class="content-article text-truncate"><p>{{ $item->abstract }}</p></div>
            <div class="date-article">{{ $item->updated_at }}</div>
        </div>
    </div>
</div>
@endforeach

@endsection
