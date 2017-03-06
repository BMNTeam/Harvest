#=require datatable/datatable.coffee

$('.select2-special').select2
  "language":
    "noResults": ->
      "Ничего не найдено"
$('.current-user--top i').on 'click', ->
  self = $('.current-user--top')
  self.toggleClass('active')

