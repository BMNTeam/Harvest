@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

@section('content')

    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Заявки:</h4>
        </div>

        <div class="active-users--table">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Номер</th>
                    <th>Культура</th>
                    <th>Сорт</th>
                    <th>Репродукция</th>
                    <th>Валл</th>
                    <th>Семена</th>
                    <th class="text-center">Операции</th>

                </tr>
                </thead>


                <tbody>



                </tbody>
            </table>

        </div>
    </div>
    @include('includes/pop-up-message')
@endsection

@endsection