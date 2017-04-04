<div id="changeContent" class="mfp-hide white-popup-block">
    <div class="">
        <div class="pop-up--wrapper">
           <h3>Редактирование склада:</h3> <br><br>
            <form action="{{ route('editStockElement') }}" method="post">

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
                    <label for="change_vall" data-validation="number" >Валл ц.</label>
                    <input class="form-control change_vall" type="text" name="change_vall" id="change_vall" value="1" data-validation="number" >
                </div>

                <div class="form-group">
                    <label for="change_corns">Семена ц.</label>
                    <input class="form-control change_corns" type="text" name="change_corns" id="change_corns" value="1" data-validation="number"  >
                </div>
            </form>

            <div class="buttons--wrapper text-center">
                <button id="remove"class="action--button hidden-form-button"><i class="fa fa-thumbs-up"> Сохраниь</i></button>
                <button class="action--button hidden-form-button popup-modal-dismiss"><i class="fa fa-thumbs-down"> Отменить</i></button>
            </div>


        </div>

    </div>


</div>