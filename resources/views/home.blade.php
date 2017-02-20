@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Добавить пользователя:</h4>
        </div>
        <div class="add-user--form">
            <form action="#" class="add">
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-user-name">Имя пользователя</label>
                                <input type="text" class="form-control" id="input-user-name" placeholder="Иванов И.И.">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-user-contacts">Контакты</label>
                                <input type="email" class="form-control" id="input-user-contacts" placeholder="г. Михайловск, ул. Ленина 234">
                            </div>
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
    </div>


    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Текущие пользователи:</h4>
        </div>

        <div class="active-users--table">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя пользователя</th>
                    <th>Контакты</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection