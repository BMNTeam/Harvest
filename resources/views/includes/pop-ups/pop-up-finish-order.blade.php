<div id="finishOrder" class="mfp-hide white-popup-block">
    <div class="">
        <div class="pop-up--wrapper">
            <h3>Завершить заявку: </h3> <br><br>
            <form action="{{ route('finishOrder') }}" method="post" name="createOrder">

                {{ csrf_field() }}

                <div class="form-group hidden">
                    <label for="order_id">Номер заявки</label>
                    <input  class="form-control stock_id" type="text" name="order_id" id="order_id" value="4" readonly="readonly" >

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
                    <label for="change_customer_name">Покупатель</label>
                    <input class="form-control change_customer_name" type="text" name="change_customer_name" id="change_customer_name" value="" readonly="readonly" >
                </div>


                <div class="form-group">
                    <label for="amount_of_corns">Количество | <i>Максимум: <span class="change_corns"></span></i> </label>
                    <input required class="form-control change_corns_number" type="text" name="amount_of_corns" id="amount_of_corns"  data-validation="number" data-validation-allowing="float" value=""  >
                </div>

                <div class="buttons--wrapper text-center">
                    <button type="submit" id=""class="action--button "><i class="fa "> Завершить заявку</i></button>
                    <button class="action--button hidden-form-button popup-modal-dismiss"><i class="fa fa-ban"> Отменить</i></button>
                </div>

            </form>





        </div>

    </div>


</div>