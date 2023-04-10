@extends('frame-page.read-article-page')
@section('title')
    {{ $article->title }}
@endsection
@section('css')
<link rel="stylesheet" href=" {{ asset('/css/view-article.css') }} ">
@endsection

@section('content')
    <div>
        <div class="article-title-top">
            <div class="category-of-article">
                <a href="/categories/{{ $article->category->id }}">
                    {{ $article->category->name }}
                </a>
            </div>
            <h1 class="title-of-article">
                <span>
                    {{ $article->title }}
                </span>
            </h1>
            <div class="date-of-article">
                {{ $article->updated_at }}
            </div>
        </div>
        <div class="line"></div>
        <div class="content-of-article">
            <?php echo $article->content; ?>
        </div>
    </div>
@endsection
