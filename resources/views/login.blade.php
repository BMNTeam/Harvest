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
            <form action="#" class="add">
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="user-name">Имя пользователя</label>
                                <input type="text" class="form-control" name="user-name" id="user-name" placeholder="Петров А.А.">
                            </div>


                        </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="user-login-password">Пароль</label>
                                <input type="password" class="form-control" name="user-login-password" id="user-login-password" >
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