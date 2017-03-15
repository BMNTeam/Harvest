@extends('layouts.master')

@section('title')
    Культуры
@endsection

@section('content')

    <div class="material--wrapper">

        <div class="content--heading">
            <h4>Панель администратора культур:</h4>
        </div>

        <div class="add-cultures--form">
            <form id="addCultures" action="{{ route('addCulture') }}" method="GET" class="add">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select-culture-name">Культура</label>
                                <select class="form-control select2-special" name="select-culture-name" id="select-culture-name">
                                    @foreach($cultures as $culture)
                                        <option  @if( \Request::input('select-culture-name') == $culture->id)
                                                selected
                                                @endif
                                                value="{{ $culture->id }}">{{ $culture->culture_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                                <div class="adding-elements--wrapper">
                                    <div class="form-group">


                                        <input name="culture"  class="input-for-select-2" type="text"placeholder="например: зерно">
                                        <button class="action--button add-to-culture">+ Добавить</button>
                                        <button type="submit" class="action--button save-or-cancel submit"><i class="fa fa-floppy-o"></i></button>
                                        <button class="action--button save-or-cancel cancel"><i class="fa fa-reply-all"></i></button>

                                    </div>

                                </div>
                        </div>

                    </div> {{--End Cultures--}}
                    @if(  isset ($sorts))
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select-sort-name">Сорт</label>
                                <select class="form-control select2-special" name="select-sort-name" id="select-sort-name">

                                        @foreach($sorts as $sort)
                                            <option

                                                    value="{{ $sort->id }}">{{ $sort->sort_name }}</option>
                                        @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="adding-elements--wrapper">
                                <div class="form-group">


                                    <input name="sort"  class="input-for-select-2" type="text"placeholder="например: сорт">
                                    <button class="action--button add-to-culture">+ Добавить</button>
                                    <button type="submit" class="action--button save-or-cancel submit"><i class="fa fa-floppy-o"></i></button>
                                    <button class="action--button save-or-cancel cancel"><i class="fa fa-reply-all"></i></button>

                                </div>

                            </div>
                        </div>

                    </div> {{--End Sorts--}}
                    @endif

                </div>
            </form>
        </div>
    </div>

@endsection