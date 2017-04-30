@extends('layouts.master')

@section('title')
    Склад
@endsection

@section('content')

    @if( isset($foreign_stock) )
    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Найдено на других складах:</h4>
        </div>

        <div class="active-users--table">

            <table class="table table-hover datatables-init stock-table">
                <thead>
                <tr>
                    <th class="hidden">Номер</th>
                    <th>Организация</th>
                    <th>Культура</th>
                    <th>Сорт</th>
                    <th>Репродукция</th>
                    <th>Семена (ц)</th>


                </tr>
                </thead>

                <tbody>
                @foreach($foreign_stock as $stock)
                    <tr>
                        <td scope="row" class="stock-id hidden">{{ $stock->id }}</td>
                        <td>{{ \App\User::where('id', $stock->user_id)->first()->name }}</td>
                        <td class="culture-name">{{ $stock->cultures['culture_name']}}</td>
                        <td class="sort-name">{{ $stock->sorts->sort_name  }}</td>
                        <td class="reproduction-name">{{ $stock->reproductions->reproduction_name }}</td>
                        <td class="corns"> {{ $stock->corns }} </td>


                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>
    @elseif( isset($error_not_found))
        <div class="material--wrapper">
            <div class="content--heading">
                <h4>Найдено на других складах:</h4>
            </div>
            <br>
            <div class="alert alert-danger">
                {{ $error_not_found }}
            </div>
        </div>
    @endif

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
                        <th>Вал (ц)</th>
                        <th>Семена (ц)</th>
                        <th>Заявки (ц)</th>
                        <th>Продано (ц)</th>
                        <th class="text-center">Операции</th>

                    </tr>
                </thead>

                <tbody>
                  @foreach($stocks as $stock)
                    <tr>
                        <td scope="row" class="stock-id hidden">{{ $stock->id }}</td>
                        <td class="culture-name">{{ $stock->cultures['culture_name']}}</td>
                        <td class="sort-name">{{ $stock->sorts->sort_name  }}</td>
                        <td class="reproduction-name">{{ $stock->reproductions->reproduction_name }}</td>
                        <td class="vall">{{ $stock->vall }}</td>
                        <td class="corns" style="white-space: nowrap">
                            @if($stock->corns == 0)
                                <form action="{{ route('applications') }}">
                                    <input name="culture_to_search" type="hidden" value="{{ $stock->cultures['id'] }}">
                                    <input name="sort_to_search" type="hidden" value="{{ $stock->sorts->id }}">
                                    <input name="reproduction_to_search" type="hidden" value="{{ $stock->reproductions->id }}">

                                    <button class="btn btn-sm" data-toggle="tooltip" title="Подсмотреть на других складах" type="submit"><i class="fa fa-eye"></i></button>
                                </form>@else{{ $stock->corns }}
                            @endif
                        </td>
                        <td class="created-orders">{{ $stock->active_orders }}</td>
                        <td>{{ $stock -> all_orders }}</td>
                        <td class="text-center special-separator">
                            <a class="remove popup-add-to-stock-modal" data-toggle="tooltip" title="Создать заявку" href="#addOrder"><i class="fa fa-truck" aria-hidden="true"></i></a> <span class="vertical-separator">|</span>
                            <a class="remove popup-change-modal" data-toggle="tooltip" title="Редактировать склад" href="#changeContent"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            @if($stock->deletable)
                                <a class="remove popup-modal " data-remove="{{ route('removeFromStock', $stock->id) }}" data-toggle="tooltip" title="Удалить со склада"  href="#showModal"><i class="fa fa-remove special-remove--icon"></i></a>
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