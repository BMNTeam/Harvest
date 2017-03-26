<div id="addOrder" class="mfp-hide white-popup-block">
    <div class="">
        <div class="pop-up--wrapper">
            <h3>Добивить заявку: </h3> <br><br>
            <form action="{{ route('add_order') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group hidden">
                    <label for="stock_id">Номер заявки</label>
                    <input  class="form-control stock_id" type="text" name="stock_id" id="stock_id" value="4" readonly="readonly" >

                </div>

                <div class="form-group">
                    <label for="change_culture_name">Название культуры</label>
                    <input class="form-control change_culture_name" type="text" name="change_culture_name" id="change_culture_name" value="1" readonly="readonly" >
                </div>

                <div class="form-group">
                    <label for="change_sort_name">Название сорта</label>
                    <input class="form-control change_sort_name" type="text" name="change_sort_name" id="change_sort_name" value="1" readonly="readonly" >
                </div>

                <div class="form-group">
                    <label for="change_reproduction_name">Название репродукции</label>
                    <input class="form-control change_reproduction_name" type="text" name="change_reproduction_name" id="change_reproduction_name" value="1" readonly="readonly" >
                </div>

                <div class="form-group">
                    <label for="select-customer-name">Покупатель</label>
                    <select class="form-control select2-special" name="select-customer-name" id="select-customer-name" style="width: 100%">
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}"> {{ $customer->name }} | {{ $customer->customer_address }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="amount_of_corns">Колличество | <i>Максимум: <span class="change_corns"></span></i> </label>
                    <input required class="form-control " type="text" name="amount_of_corns" id="amount_of_corns" value=""  >
                </div>

                <div class="buttons--wrapper text-center">
                    <button type="submit" id=""class="action--button "><i class="fa fa-thumbs-up"> Добавить заявку</i></button>
                    <button class="action--button hidden-form-button popup-modal-dismiss"><i class="fa fa-thumbs-down"> Отменить</i></button>
                </div>

            </form>




        </div>

    </div>


</div>