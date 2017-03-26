var getClickedRowValues;

$('.table').DataTable({
  'language': {
    "search": "Поиск:",
    "info": "Показаны  результаты от _START_ до _END_ из _TOTAL_",
    "infoEmpty": "Ничего не найдено",
    "emptyTable": "Нет доступных данных",
    "lengthMenu": "Показать _MENU_ на странице",
    "paginate": {
      "first": "Первая",
      "last": "Последняя",
      "next": "Вперед",
      "previous": "Назад"
    },
    "zeroRecords": "К сожалению мы ничего не нашли",
    "infoFiltered": "(Поиск произведен по _MAX_ записям)"
  }
});

$('.popup-modal').magnificPopup({
  type: 'inline',
  preloader: false,
  modal: true,
  callbacks: {
    open: function() {
      var $content, removeLink;
      $content = this.currItem.el[0];
      removeLink = $content.getAttribute('data-remove');
      return $('#remove').on('click', function() {
        return window.location = removeLink;
      });
    }
  }
});

$('.popup-change-modal').magnificPopup({
  type: 'inline',
  preloader: false,
  modal: true,
  callbacks: {
    open: function() {
      var $content, $form, $parentTr, RowRecord, removeLink;
      RowRecord = new Object;
      $content = this.currItem.el[0];
      $parentTr = $($content).parents('tr');
      $form = $('#changeContent');
      RowRecord = getClickedRowValues($parentTr);
      $form.find('.stock_id').val(RowRecord.orderId);
      $form.find('.change_culture_name').val(RowRecord.cultureName);
      $form.find('.change_sort_name').val(RowRecord.sortName);
      $form.find('.change_reproduction_name').val(RowRecord.reproductionName);
      $form.find('.change_vall').val(RowRecord.vall);
      $form.find('.change_corns').val(RowRecord.corns);
      removeLink = $content.getAttribute('data-remove');
      return $('#remove').on('click', function() {
        $.validate();
        return $form.find('form').submit();
      });
    }
  }
});

$(document).on("click", ".popup-modal-dismiss", function(e) {
  e.preventDefault();
  return $.magnificPopup.close();
});

$('.popup-add-to-stock-modal').magnificPopup({
  type: 'inline',
  preloader: false,
  modal: true,
  callbacks: {
    open: function() {
      var $content, $form, $parentTr, RowRecord;
      RowRecord = new Object;
      $content = this.currItem.el[0];
      $parentTr = $($content).parents('tr');
      $form = $('#addOrder').find('form');
      RowRecord = getClickedRowValues($parentTr);
      $form.find('.stock_id').val(RowRecord.orderId);
      $form.find('.change_culture_name').val(RowRecord.cultureName);
      $form.find('.change_sort_name').val(RowRecord.sortName);
      $form.find('.change_reproduction_name').val(RowRecord.reproductionName);
      return $form.find('.change_corns').text(RowRecord.corns);
    }
  }
});

$('.pop-up-finish-order').magnificPopup({
  type: 'inline',
  preloader: false,
  modal: true,
  callbacks: {
    open: function() {
      var $content, $form, $parentTr, RowRecord;
      RowRecord = new Object;
      $content = this.currItem.el[0];
      $parentTr = $($content).parents('tr');
      $form = $('#finishOrder').find('form');
      RowRecord = getClickedRowValues($parentTr);
      $form.find('.stock_id').val(RowRecord.orderId);
      $form.find('.change_culture_name').val(RowRecord.cultureName);
      $form.find('.change_sort_name').val(RowRecord.sortName);
      $form.find('.change_reproduction_name').val(RowRecord.reproductionName);
      $form.find('.change_corns').text(RowRecord.corns);
      $form.find('.change_customer_name').val(RowRecord.customer);
      return $form.find('.change_corns_number').focus().select();
    }
  }
});

$('.popup-change-customer-info').magnificPopup({
  type: 'inline',
  preloader: false,
  modal: true,
  callbacks: {
    open: function() {
      var $content, $form, $parentTr, currentCustomer, formValues;
      $content = this.currItem.el[0];
      $parentTr = $($content).parents('tr');
      $form = $('#editCustomer').find('form');
      currentCustomer = new Object;
      currentCustomer.id = $parentTr.find('.customer_id').text();
      currentCustomer.name = $parentTr.find('.customer_name').text();
      currentCustomer.address = $parentTr.find('.customer_address').text();
      currentCustomer.contacts = $parentTr.find('.customer_contacts').text();
      formValues = new Object;
      formValues.id = $form.find('.customer_id');
      formValues.name = $form.find('.customer_name');
      formValues.address = $form.find('.customer_address');
      formValues.contacts = $form.find('.contacts');
      formValues.id.val(currentCustomer.id);
      formValues.name.val(currentCustomer.name);
      formValues.address.val(currentCustomer.address);
      return formValues.contacts.val(currentCustomer.contacts);
    }
  }
});

getClickedRowValues = function($parentTr) {
  var RowRecord;
  RowRecord = new Object;
  RowRecord.orderId = $parentTr.find('.stock-id').text();
  RowRecord.cultureName = $parentTr.find('.culture-name').text();
  RowRecord.sortName = $parentTr.find('.sort-name').text();
  RowRecord.reproductionName = $parentTr.find('.reproduction-name').text();
  RowRecord.vall = $parentTr.find('.vall').text();
  RowRecord.corns = $parentTr.find('.corns').text();
  RowRecord.customer = $parentTr.find('.customer_name').text();
  return RowRecord;
};

$.validate();

$('.select2-special').select2({
  "language": {
    "noResults": function() {
      return "Ничего не найдено";
    }
  }
});

$('.current-user--top i').on('click', function() {
  var self;
  self = $('.current-user--top');
  return self.toggleClass('active');
});

$('.add-to-culture').on('click', function(e) {
  var $cancel, $form, $inputToAdd, $inputsToSaveAndCancel, $self;
  $self = $(this);
  $inputToAdd = $self.siblings('.input-for-select-2');
  $inputsToSaveAndCancel = $self.siblings('.save-or-cancel');
  $cancel = $self.siblings('.cancel');
  $form = $('#addCultures');
  $form.attr('method', 'POST');
  $inputToAdd.show(300);
  $self.hide(400, function() {
    return $inputsToSaveAndCancel.show();
  });
  $inputToAdd.focus();
  $cancel.on('click', function(e) {
    $form.attr('method', 'GET');
    $inputToAdd.hide(300, function() {
      $inputsToSaveAndCancel.hide();
      return $self.show();
    });
    return e.preventDefault();
  });
  return e.preventDefault();
});

$('.add-cultures--form .select2-special').on('select2:select', function(e) {
  return $('form').submit();
});

$('.add-sort--button').click(function(e) {
  var $self;
  $self = $(this);
  e.preventDefault();
  $('form').attr('method', 'POST');
  $('form').attr('action', $self.attr('data-url-to-post'));
  return $('form').submit();
});
