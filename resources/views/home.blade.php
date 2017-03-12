@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Добавить покупателя:</h4>
        </div>
        <div class="add-user--form">
            <form action="{{ route('addCustomer') }}" method="post" class="add">

                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-user-name">Имя покупателя</label>
                                <input required type="text" name="input-user-name" class="form-control" id="input-user-name" placeholder="Иванов И.И.">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-user-contacts">Контакты</label>
                                <input required type="text" name="input-user-contacts" class="form-control" id="input-user-contacts" placeholder="г. Михайловск, ул. Ленина 234">
                            </div>
                        </div>

                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> Поле обязательно для заполнения</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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
            <h4>Текущие покупатели:</h4>
        </div>

        <div class="active-users--table">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя покупателя</th>
                    <th>Контакты</th>
                    <th class="text-center">Операции</th>
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->contacts }}</td>
                    <td class="text-center">
                        <a class="remove popup-modal" data-remove="{{ route('removeCustomer', $customer->id) }}"  href="#showModal"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('includes/pop-up-message')

@endsection