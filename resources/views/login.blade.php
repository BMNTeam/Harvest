@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="material--wrapper big-wrapper">
        <div class="content--heading">
            <h4>Учетные данные:</h4>
        </div>
        <div class="add-user--form">
            <form action="{{ route('login') }}" method="POST" class="add">

                <div class="form-group">
                    <div class="row">
                        {{ csrf_field() }}

                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="name">Имя пользователя</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Петров А.А.">
                            </div>
                            <a href="{{ route('register') }}">Зарегистрироваться</a>


                        </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" name="password" id="password" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="action--button">Войти</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection