@extends('adminlte::page')

@section('title', 'Setting')
@section('content_header')
    <h1>LIÊN HỆ</h1>
@stop
@section('content')
    <div>
        <form action="{{ route('contacts.store') }}" method="post">
            @csrf
            <input type="text" name="config_key" placeholder="config_key">
            <input type="text" name="config_value" placeholder="config_value">
            <button type="submit">Tạo</button>
        </form>
    </div>

    <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
            <table class="jsgrid-table">
                <tr class="jsgrid-header-row">
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">config_key</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 400px;">config_value</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">

                    </th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;"></th>
                </tr>

            </table>
        </div>
        <div class="jsgrid-grid-body" style="height: auto;">
            <table class="jsgrid-table">
                <tbody>
                    @foreach ($contacts as $item)
                        <tr class="jsgrid-row item-{{ $item->id }}">
                            <td class="jsgrid-cell" style="width: 200px;">{{ $item->config_key }}</td>
                            <td class="jsgrid-cell" style="width: 400px;"><a href="{{ $item->config_value }}">{{ $item->config_value }}</a></td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                <button onclick="show_form_edit({{ $item->id }})">
                                    <i class="fas fa-solid fa-pen"></i>
                                </button>
                            </td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                <form action="{{ route('contacts.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <i class="fas fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr class="form-{{ $item->id }}" style="display: none">
                            <form action="{{ route('contacts.update', $item) }}" method="post">
                                @csrf
                                @method('PUT')
                                <td class="jsgrid-cell" style="width: 200px;"><input type="text" style="width: 200px;"
                                        value="{{ $item->config_key }}" name="config_key"></td>
                                <td class="jsgrid-cell" style="width: 400px;"><input type="text" style="width: 400px;"
                                        value="{{ $item->config_value }}" name="config_value"></td>

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
    <link rel="stylesheet" href="/css/contact.css">
@stop

@section('js')
    <script src="/js/contact.js"></script>
@stop
