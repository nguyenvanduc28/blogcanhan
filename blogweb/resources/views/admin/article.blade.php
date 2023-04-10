@extends('adminlte::page')

@section('title', 'Article')
@section('content_header')
<h1>TRANG QUẢN LÝ BÀI VIẾT</h1>
@stop
@section('content')
<a href="/admin/articles/create">
    <button type="button" class="btn btn-success">
        Viết bài
    </button>
</a>
<div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
            <table class="jsgrid-table">
                <tr class="jsgrid-header-row">
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 800px;">Danh sách</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 250px">Chủ đề</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 200px">Ngày viết bài</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 200px">Cập nhật</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;"></th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;"></th>
                </tr>

            </table>
        </div>
        <div class="jsgrid-grid-body" style="height: auto;">
            <table class="jsgrid-table">
                <tbody>
                    @foreach ($articles as $item)
                        <tr class="jsgrid-row item-{{ $item->id }}">
                            <td class="jsgrid-cell" style="width: 800px;">
                                <div class="article-box">
                                    <div class="feature-image">
                                        <img src="{{$item->feature_image_path}}" alt="">
                                    </div>
                                    <div class="article-content">
                                        <h4>
                                            {{$item->title}}
                                        </h4>
                                    </div>
                                </div>
                            </td>
                            <td class="jsgrid-cell" style="width: 250px;">
                                <h5>
                                    {{$item->category->name}}
                                </h5>
                            </td>
                            <td class="jsgrid-cell" style="width: 200px;">
                                <h6>
                                    {{$item->created_at}}
                                </h6>
                            </td>
                            <td class="jsgrid-cell" style="width: 200px;">
                                <h6>
                                    {{$item->updated_at}}
                                </h6>
                            </td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                <button onclick="show_form_edit({{ $item->id }})">
                                    <a href="/admin/articles/{{$item->id}}/edit">
                                        <i class="fas fa-solid fa-pen"></i>
                                    </a>
                                </button>
                            </td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                <form action="{{ route('articles.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="confirmDelete()">
                                        <i class="fas fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/article-list.css">
@stop

@section('js')
<script>
    function confirmDelete() {
        if (confirm("Bạn có chắc chắn xóa bài viết")) {
            // Submit the form
            document.getElementById("delete-form").submit();
            return true;
        } else {
            // Do nothing
            return false;
        }
    }
</script>
@stop