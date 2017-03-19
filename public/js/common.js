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

$(document).on("click", ".popup-modal-dismiss", function(e) {
  e.preventDefault();
  return $.magnificPopup.close();
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
