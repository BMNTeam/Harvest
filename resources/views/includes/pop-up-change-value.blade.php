<div id="changeContent" class="mfp-hide white-popup-block">
    <div class="">
        <div class="pop-up--wrapper">
           <h3>Редактирование склада:</h3> <br><br>
            <form action="" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="stock_id">Номер заявки</label>
                    <input class="form-control" type="text" name="stock_id" id="stock_id" value="1" disabled >

                </div>

                <div class="form-group">
                    <label for="change_culture_name">Название культуры</label>
                    <input class="form-control" type="text" name="change_culture_name" id="change_culture_name" value="1" disabled >
                </div>

                <div class="form-group">
                    <label for="change_sort_name">Название сорта</label>
                    <input class="form-control" type="text" name="change_sort_name" id="change_sort_name" value="1" disabled >
                </div>

                <div class="form-group">
                    <label for="change_vall">Валл</label>
                    <input class="form-control" type="text" name="change_vall" id="change_vall" value="1" >
                </div>

                <div class="form-group">
                    <label for="change_corns">Семена</label>
                    <input class="form-control" type="text" name="change_corns" id="change_corns" value="1"  >
                </div>
            </form>

            <div class="buttons--wrapper text-center">
                <button id="remove"class="action--button hidden-form-button remove"><i class="fa fa-thumbs-up"> Сохраниь</i></button>
                <button class="action--button hidden-form-button popup-modal-dismiss"><i class="fa fa-thumbs-down"> Отменить</i></button>
            </div>


        </div>

    </div>


</div>