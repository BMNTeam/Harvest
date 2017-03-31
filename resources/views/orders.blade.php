@extends('layouts.master')

@section('title')
    Заявки
@endsection

@section('content')


    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Заявки:</h4>
        </div>

        <div class="active-users--table">

            <table class="table table-hover orders-table">
                <thead>
                <tr>
                    <th class="hidden">Номер</th>
                    <th>Культура</th>
                    <th>Сорт</th>
                    <th>Репродукция</th>
                    <th>Семена ц.</th>
                    <th>Покупатель</th>
                    <th>Статус</th>
                    <th class="hidden">Статус-id</th>
                    <th class="text-center">Операции</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="stock-id hidden">{{ $order->id }}</td>
                        <td class="culture-name">{{ $order->stock->cultures->culture_name }}</td>
                        <td class="sort-name">{{ $order->stock->sorts->sort_name }}</td>
                        <td class="reproduction-name">{{ $order->stock->reproductions->reproduction_name }}</td>
                        <td class="corns">{{ $order->amount_of_done }}</td>
                        <td class="customer_name"><span class="tooltip-on-hover" data-toggle="tooltip" title="{{$order->customer->contacts}}">{{ $order->customer->name }}</span></td>
                        <td>{{ $order->status }}</td>
                        <td class="hidden">{{ $order->order }}</td>
                        <td class="text-center">
                            @if( $order->status !== 'Завершена' && $order->status !== 'Просрочена')
                                <a href="#finishOrder"
                                   class="remove popup-modal pop-up-finish-order"><i>Завершить</i></a> |
                            @endif
                            @if( $order->status === 'Просрочена')
                                <a href="{{ route('updateOrder', ['id' => $order->id]) }}"
                                   class="remove"><i>Продлить</i></a> |
                            @endif
                            <a class="remove popup-modal" data-remove="{{ route('remove_order', $order->id) }}"  href="#showModal"><i class="fa fa-remove"></i></a>
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



        </div>
    </div>
    @include('includes.pop-ups.pop-up-finish-order')
    @include('includes.pop-ups.pop-up-message')

@endsection