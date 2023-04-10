@extends('adminlte::page')

@section('title', 'Category')
@section('content_header')
    <h1>TRANG QUẢN LÝ DANH MỤC</h1>
@stop
@section('content')
    <div>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <input type="text" name="name" required placeholder="Nhập tên danh mục">
            <button type="submit">Tạo</button>
        </form>
        @if (session('message'))
            <p>
                {{ session('message') }}
            </p>

        @endif
    </div>

    <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
            <table class="jsgrid-table">
                <tr class="jsgrid-header-row">
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">Name</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">

                    </th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;"></th>
                </tr>

            </table>
        </div>
        <div class="jsgrid-grid-body" style="height: auto;">
            <table class="jsgrid-table">
                <tbody>
                    @foreach ($categories as $item)
                        <tr class="jsgrid-row item-{{ $item->id }}">
                            <td class="jsgrid-cell" style="width: 200px;">{{ $item->name }}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                <button onclick="show_form_edit({{ $item->id }})">
                                    <i class="fas fa-solid fa-pen"></i>
                                </button>
                            </td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                <form action="{{ route('categories.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="confirmDelete()">
                                        <i class="fas fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr class="form-{{ $item->id }}" style="display: none">
                            <form action="{{ route('categories.update', $item) }}" method="post">
                                @csrf
                                @method('PUT')
                                <td class="jsgrid-cell" style="width: 200px;"><input type="text"
                                        value="{{ $item->name }}" name="name"></td>

                                <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                    <button>
                                        <i class="fas fa-solid fa-check" type="submit"></i>
                                    </button>
                                </td>

                            </form>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/category.css">
@stop

@section('js')
    <script src="/js/category.js"></script>
    <script>
        function confirmDelete() {
        if (confirm("Bạn có chắc chắn xóa danh mục")) {
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
