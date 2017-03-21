#=require datatable/datatable.coffee
#=require magnific/confirm.coffee
#=require validation/validator.coffee

$('.select2-special').select2
  "language":
    "noResults": ->
      "Ничего не найдено"
$('.current-user--top i').on 'click', ->
  self = $('.current-user--top')
  self.toggleClass('active')


$('.add-to-culture').on 'click', (e)->
  $self = $(this)
  $inputToAdd = $self.siblings('.input-for-select-2')
  $inputsToSaveAndCancel = $self.siblings('.save-or-cancel')
  $cancel = $self.siblings('.cancel')
  $form = $('#addCultures');


  $form.attr('method', 'POST')

  $inputToAdd.show(300)
  $self.hide 400, ->
    $inputsToSaveAndCancel.show()
  $inputToAdd.focus()

  $cancel.on 'click', (e)->
    $form.attr('method', 'GET')
    $inputToAdd.hide 300, ->
      $inputsToSaveAndCancel.hide()
      $self.show()
    e.preventDefault()
  e.preventDefault()

#SELECT 2 TRIGGER EVENT ON CLICK
$('.add-cultures--form .select2-special').on 'select2:select', (e)->
  $('form').submit()

$('.add-sort--button').click (e)->
  $self = $(this);
  e.preventDefault();
  $('form').attr('method', 'POST')
  $('form').attr('action', $self.attr('data-url-to-post'))
  $('form').submit()

