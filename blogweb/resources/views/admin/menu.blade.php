@extends('adminlte::page')

@section('title', 'Menu')
@section('content_header')
    <h1>MENU</h1>
@stop
@section('content')
<div>
    <form action="{{ route('menus.store') }}" method="post">
        @csrf
        <input type="text" name="name">
        <button type="submit">Tạo</button>
    </form>
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
                @foreach ($menus as $item)
                    <tr class="jsgrid-row item-{{ $item->id }}">
                        <td class="jsgrid-cell" style="width: 200px;">{{ $item->name }}</td>
                        <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                            <button onclick="show_form_edit({{ $item->id }})">
                                <i class="fas fa-solid fa-pen"></i>
                            </button>
                        </td>
                        <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                            <form action="{{ route('menus.destroy', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="delete_item({{ $item->id }})">
                                    <i class="fas fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr class="form-{{ $item->id }}" style="display: none">
                        <form action="{{ route('menus.update', $item) }}" method="post">
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
<link rel="stylesheet" href="/css/menu.css">
@stop

@section('js')
<script src="/js/menu.js"></script>

@stop
