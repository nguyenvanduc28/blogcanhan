@extends('adminlte::page')

@section('title', 'Article')
@section('content_header')
    <h1>TẠO BÀI VIẾT MỚI</h1>
@stop
@section('content')
    <div class="card card-primary">
        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Chủ đề</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Tiêu đề bài viết</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề bài viết">
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="feature_image_path" class="form-label">Ảnh hiển thị</label>
                        <input class="form-control-file" type="file" accept="image/jpeg, image/png" id="feature_image_path" name="feature_image_path" onchange="previewImage(event)">
                        <img id="preview" style="max-width:100%; max-height:200px; margin-top:10px;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content" id="content" class="form-control my-editor" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="abstract">Đoạn tóm tắt</label>
                    <textarea name="abstract" id="abstract" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo bài viết</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/article-list.css">
@stop

@section('js')
    <script src="https://cdn.tiny.cloud/1/wb46z8hwkeal69ae67kjsn9gre1ti805vh4ecnng8uy3rmgj/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="/js/create-article.js"></script>

@stop
