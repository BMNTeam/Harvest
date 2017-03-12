#=require datatable/datatable.coffee

$('.select2-special').select2
  "language":
    "noResults": ->
      "Ничего не найдено"
$('.current-user--top i').on 'click', ->
  self = $('.current-user--top')
  self.toggleClass('active')

$('.popup-modal').magnificPopup
  type: 'inline'
  preloader: false
  modal: true
  callbacks:
    open: ()->

      $content = this.currItem.el[0]
      removeLink = $content.getAttribute('data-remove')
      $('#remove').on 'click', ->
          window.location = removeLink




$(document).on "click", ".popup-modal-dismiss", (e)->
  e.preventDefault()
  $.magnificPopup.close()