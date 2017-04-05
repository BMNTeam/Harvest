var getClickedRowValues, languageRu, translation;

translation = {
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
};

$('.datatables-init').DataTable({
  'language': translation
});

$('.orders-table').DataTable({
  "order": [[7, 'asc']],
  'language': translation
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
      $form.find('.change_corns').text(RowRecord.corns);
      return $form.find('.bmn-add-to-stock').attr('data-validation-allowing', "range[1;" + RowRecord.corns + "]");
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
      $form.find('.change_corns').text(RowRecord.maximumInStock);
      $form.find('.change_customer_name').val(RowRecord.customer);
      $form.find('.change_corns_number').val(RowRecord.corns);
      return $form.find('.change_corns_number').attr('data-validation-allowing', "range[1;" + RowRecord.maximumInStock + ", float]");
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
  RowRecord.maximumInStock = $parentTr.find('.stock-id').attr('data-corns-in-stock');
  return RowRecord;
};

languageRu = {
  errorTitle: 'Ошибка отправки формы!',
  requiredField: 'Это обязательное поле',
  requiredFields: 'Вы задали не все обязательные поля',
  badTime: 'Вы задали некорректное время',
  badEmail: 'Вы задали некорректный e-mail',
  badTelephone: 'Вы задали некорректный номер телефона',
  badSecurityAnswer: 'Вы задали некорректный ответ на секретный вопрос',
  badDate: 'Вы задали некорректную дату',
  lengthBadStart: 'Значение должно быть в диапазоне',
  lengthBadEnd: ' символов',
  lengthTooLongStart: 'Значение длинее, чем ',
  lengthTooShortStart: 'Значение меньше, чем ',
  notConfirmed: 'Введённые значения не могут быть подтверждены',
  badDomain: 'Некорректное значение домена',
  badUrl: 'Некорретный URL',
  badCustomVal: 'Введённое значение неверно',
  andSpaces: ' и пробелы ',
  badInt: 'Значение - не число или превышен максимум',
  badSecurityNumber: 'Введённый защитный номер - неправильный',
  badUKVatAnswer: 'Некорректный UK VAT номер',
  badStrength: 'Пароль не достаточно надёжен',
  badNumberOfSelectedOptionsStart: 'Вы должны выбрать как минимум ',
  badNumberOfSelectedOptionsEnd: ' ответов',
  badAlphaNumeric: 'Значение должно содержать только числа и буквы ',
  badAlphaNumericExtra: ' и ',
  wrongFileSize: 'Загружаемый файл слишком велик (максимальный размер %s)',
  wrongFileType: 'Принимаются файлы следующих типов %s',
  groupCheckedRangeStart: 'Выберите между ',
  groupCheckedTooFewStart: 'Выберите как минимум ',
  groupCheckedTooManyStart: 'Выберите максимум из ',
  groupCheckedEnd: ' элемент(ов)',
  badCreditCard: 'Номер кредитной карты некорректен',
  badCVV: 'CVV номер некорректно',
  wrongFileDim: 'Неверные размеры графического файла,',
  imageTooTall: 'изображение не может быть уже чем',
  imageTooWide: 'изображение не может быть шире чем',
  imageTooSmall: 'изображение слишком мало',
  min: 'минимум',
  max: 'максимум',
  imageRatioNotAccepted: 'Изображение с таким соотношением сторон не принимается',
  badBrazilTelephoneAnswer: 'Введённый номер телефона неправильный',
  badBrazilCEPAnswer: 'CEP неправильный',
  badBrazilCPFAnswer: 'CPF неправильный'
};

$.validate({
  decimalSeparator: ',',
  language: languageRu,
  onElementValidate: (function(_this) {
    return function(valid, $el, $form, errorMess) {
      var currentValue;
      console.dir(valid);
      return currentValue = console.dir($el);
    };
  })(this)
});

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

$('.add-cultures--form .select2-special').on('select2:close', function(e) {
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

$('[data-toggle="tooltip"]').tooltip();
