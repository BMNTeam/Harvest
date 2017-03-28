@extends('layouts.master')

@section('title')
    Склад
@endsection

@section('content')
    {{--<div class="material--wrapper">
        <div class="content--heading">
            <h4>Добавить заявку:</h4>
        </div>
        <div class="add-user--form">
            <form action="#" class="add">
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select-culture-name">Культура</label>
                                <select class="form-control select2-special" name="select-culture-name" id="select-culture-name">
                                    @foreach($cultures as $culture)
                                        <option value="{{ $culture->id }}">{{ $culture->culture_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="select-sort-name">Сорт</label>
                                <select class="form-control select2-special" name="select-sort-name" id="select-sort-name">
                                    <option value="1">Высший</option>
                                    <option value="2">Средний</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="select-reproduction-name">Репродукция</label>
                                <select class="form-control select2-special" name="select-reproduction-name" id="select-reproduction-name">
                                    <option value="1">Репродукция 1</option>
                                    <option value="2">Репродукция 2</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="input-vall-name">Валл</label>
                                <input type="text" class="form-control" name="input-vall-name" id="input-vall-name" placeholder="320">
                            </div>

                            <div class="form-group">
                                <label for="input-seed-count">Семена</label>
                                <input type="text" class="form-control" name="input-seed-count" id="input-seed-count" placeholder="560">
                            </div>

                        </div>


                        <div class="col-md-6">

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="action--button">+ Добавить</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>--}}


    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Склад:</h4>
        </div>

        <div class="active-users--table">

            <table class="table table-hover datatables-init">
                <thead>
                <tr>
                    <th class="hidden">Номер</th>
                    <th>Культура</th>
                    <th>Сорт</th>
                    <th>Репродукция</th>
                    <th>Валл</th>
                    <th>Семена</th>
                    <th class="text-center">Операции</th>

                </tr>
                </thead>


                <tbody>

              @foreach($stocks as $stock)
                <tr>
                    <th scope="row" class="stock-id hidden">{{ $stock->id }}</th>
                    <td class="culture-name">{{ $stock->cultures['culture_name']}}</td>
                    <td class="sort-name">{{ $stock->sorts->sort_name  }}</td>
                    <td class="reproduction-name">{{ $stock->reproductions->reproduction_name }}</td>
                    <td class="vall">{{ $stock->vall }}</td>
                    <td class="corns">{{ $stock->corns }}</td>
                    <td class="text-center">
                        <a class="remove popup-add-to-stock-modal" href="#addOrder"><i aria-hidden="true">Добавить заявку</i></a> |
                        <a class="remove popup-change-modal" href="#changeContent"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="remove popup-modal" data-remove="{{ route('removeFromStock', $stock->id) }}"  href="#showModal"><i class="fa fa-remove"></i></a>
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