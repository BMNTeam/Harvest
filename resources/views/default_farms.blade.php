@extends('layouts.master')

@section('title')
    Базовые хозяйства
@endsection

@section('content')

    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Наличие на складах базовых хозяйств:</h4>
        </div>


        <div class="active-users--table">

            <table class="table table-hover datatables-init stock-table stock-table">
                <thead>
                <tr>
                    <th class="hidden">Номер</th>
                    <th>Культура</th>
                    <th>Сорт</th>
                    <th>Репродукция</th>
                    <th>Остаток (ц)</th>
                    <th>Название хозяйства</th>

                </tr>
                </thead>

                <tbody>
                @foreach($stocks as $stock)
                    <tr>
                        <td scope="row" class="stock-id hidden">{{ $stock->id }}</td>
                        <td class="culture-name">{{ $stock->cultures['culture_name']}}</td>
                        <td class="sort-name">{{ $stock->sorts->sort_name  }}</td>
                        <td class="reproduction-name">{{ $stock->reproductions->reproduction_name }}</td>
                        <td class="residue">{{ $stock->corns }}</td>
                        <td class="own_farm"><span class="tooltip-on-hover" data-toggle="tooltip" title="{{ $stock->farm_name->additional_information }}">{{ $stock->farm_name->name }}</span></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection