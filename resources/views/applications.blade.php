@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="material--wrapper">
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
    </div>


    <div class="material--wrapper">
        <div class="content--heading">
            <h4>Склад:</h4>
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

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection