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
