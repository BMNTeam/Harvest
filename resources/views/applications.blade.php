@extends('layouts.master')

@section('title')
    Склад
@endsection

@section('content')

    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Склад:</h4>
        </div>

        <div class="active-users--table">

            <table class="table table-hover datatables-init stock-table">
                <thead>
                    <tr>
                        <th class="hidden">Номер</th>
                        <th>Культура</th>
                        <th>Сорт</th>
                        <th>Репродукция</th>
                        <th>Валл (ц)</th>
                        <th>Семена (ц)</th>
                        <th>Заявки (ц)</th>
                        <th>Продано (ц)</th>
                        <th class="text-center">Операции</th>

                    </tr>
                </thead>

                <tbody>
                  @foreach($stocks as $stock)
                    <tr>
                        <th scope="row" class="stock-id hidden"> {{ $stock->id }} </th>
                        <td class="culture-name">{{ $stock->cultures['culture_name']}}</td>
                        <td class="sort-name">{{ $stock->sorts->sort_name  }}</td>
                        <td class="reproduction-name">{{ $stock->reproductions->reproduction_name }}</td>
                        <td class="vall">{{ $stock->vall }}</td>
                        <td class="corns">{{ $stock->corns }}</td>
                        <td class="created-orders">{{ $stock->active_orders }}</td>
                        <td>{{ $stock -> all_orders }}</td>
                        <td class="text-center special-separator">
                            <a class="remove popup-add-to-stock-modal" data-toggle="tooltip" title="Создать заявку" href="#addOrder"><i class="fa fa-truck" aria-hidden="true"></i></a> <span class="vertical-separator">|</span>
                            <a class="remove popup-change-modal" data-toggle="tooltip" title="Редактировать склад" href="#changeContent"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            @if($stock->deletable)
                                <a class="remove popup-modal" data-remove="{{ route('removeFromStock', $stock->id) }}" data-toggle="tooltip" title="Удалить со склада"  href="#showModal"><i class="fa fa-remove"></i></a>
                            @else
                                <a style="visibility: hidden"  href="#showModal"><i class="fa fa-remove"></i></a>
                            @endif
                        </td>
                    </tr>
                  @endforeach

                </tbody>
            </table>

        </div>
    </div>
    @include('includes.pop-ups.pop-up-message')
    @include('includes.pop-ups.pop-up-change-value')
    @include('includes.pop-ups.pop-up-create-order')
@endsection