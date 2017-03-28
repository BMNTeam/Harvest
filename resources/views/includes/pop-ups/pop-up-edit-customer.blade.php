<div id="editCustomer" class="mfp-hide white-popup-block">
    <div class="">
        <div class="pop-up--wrapper">
            <h3>Редактирование покупателя:</h3> <br><br>
            <form action="{{ route('updateCustomer') }}" method="post">

                {{ csrf_field() }}
                <div class="form-group hidden">
                    <label for="customer_id">Номер заявки</label>
                    <input  class="form-control customer_id" type="text" name="customer_id" id="customer_id" value="" readonly="readonly" >

                </div>

                <div class="form-group ">
                    <label for="customer_name">Покупатель</label>
                    <input  class="form-control customer_name" type="text" name="customer_name" id="customer_name" value="">
                </div>

                <div class="form-group ">
                    <label for="customer_address">Адрес</label>
                    <input  class="form-control customer_address" type="text" name="customer_address" id="customer_address" value="">
                </div>

                <div class="form-group ">
                    <label for="contacts">Контакты</label> <br>
                    <textarea name="contacts" class="contacts"  id="contacts" cols="30" rows="5"></textarea>
                </div>



            <div class="buttons--wrapper text-center">
                <button id="remove"class="action--button hidden-form-button"><i class="fa "> Сохраниь</i></button>
                <button class="action--button hidden-form-button popup-modal-dismiss"><i class="fa fa-ban"> Отменить</i></button>
            </div>

            </form>

        </div>

    </div>


</div>