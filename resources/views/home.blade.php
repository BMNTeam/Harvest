@extends('layouts.master')

@section('title')
    Склад
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
                                <label for="input-user-name">Покупатель</label>
                                <input required type="text" name="input-user-name" class="form-control" id="input-user-name" placeholder="например: АО РоссельхозБанк">
                            </div>

                            <div class="form-group">
                                <label for="input-user-name">Адрес</label>
                                <input required type="text" name="input-address" class="form-control" id="input-address" placeholder="например: г.Ставрополь, ул. Ленина 242 Б">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-user-contacts">Контакты</label>
                                <textarea name="input-user-contacts" class="form-control" id="input-user-contacts" cols="30" rows="5" placeholder="например: телефон"></textarea>
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

            <table class="table table-hover datatables-init">
                <thead>
                <tr>
                    <th class="hidden">#</th>
                    <th>Имя покупателя</th>
                    <th>Адрес</th>
                    <th>Контакты</th>
                    <th class="text-center">Операции</th>
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $customer)
                <tr>
                    <th class="hidden customer_id" scope="row">{{ $customer->id }}</th>
                    <td class="customer_name">{{ $customer->name }}</td>
                    <td class="customer_address">{{ $customer->customer_address }}</td>
                    <td class="customer_contacts">{{ $customer->contacts }}</td>
                    <td class="text-center">
                        <a class="remove popup-change-customer-info" href="#editCustomer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                        <a class="remove popup-modal" data-remove="{{ route('removeCustomer', $customer->id) }}"  href="#showModal"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('includes.pop-ups.pop-up-message')
    @include('includes.pop-ups.pop-up-edit-customer')

@endsection