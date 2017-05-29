<div id="printOrder" class="mfp-hide white-popup-block">
   <div class="">
       <div class="pop-up--wrapper">
        <h3>Печатная форма</h3>
           <hr>
           <br>
           <table class="table ">
               <thead>
                <tr>
                    <th>Контрагент</th>
                    <th>Сорт</th>
                    <th>Колличество</th>
                    <th>Идентификатор</th>
                </tr>
               </thead>
               <tbody>
                <tr>
                    <td class="print-customer"></td>
                    <td class="print-sort"></td>
                    <td class="print-amount"></td>
                    <td class="print-id"></td>
                </tr>
               </tbody>
           </table>
           <br>
           <hr>

           <h5 class="text-right" id="orderPrintDate" class="print-date">
               <b>Дата:</b> <span class="current-day"></span>/<span class="current-month"></span>/<span class="current-year"></span>
           </h5>
           <br>


           <div class="buttons--wrapper text-center">
               <button id="print-order"class="print-order--button action--button hidden-form-button remove"><i class="fa"> Печать</i></button>
               <button class="print-order--button action--button hidden-form-button popup-modal-dismiss"><i class="fa fa-ban"> Отменить</i></button>
           </div>
       </div>
   </div>
</div>