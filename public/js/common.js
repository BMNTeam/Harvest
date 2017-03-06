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
