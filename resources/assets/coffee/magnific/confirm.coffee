#Magnific Pop-up section
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

$('.popup-change-modal').magnificPopup
  type: 'inline'
  preloader: false
  modal: true
  callbacks:
    open: ()->
      $content = this.currItem.el[0]
      $parentTr = $($content).parents('tr')
      $form = $('#changeContent')
      # Variables to install
      orderId = $parentTr.find('.stock-id').text()
      cultureName = $parentTr.find('.culture-name').text()
      sortName = $parentTr.find('.sort-name').text()
      reproductionName = $parentTr.find('.reproduction-name');
      vall = $parentTr.find('.vall').text()
      corns = $parentTr.find('.corns').text()

      #setVariables
      $form.find('#stock_id').val(orderId);
      $form.find('#change_culture_name').val(cultureName)
      $form.find('#change_sort_name').val(sortName)
      $form.find('#change_reproduction_name').val(reproductionName)
      $form.find('#change_vall').val(vall)
      $form.find('#change_corns').val(corns)


      console.dir(orderId)
      removeLink = $content.getAttribute('data-remove')
      $('#remove').on 'click', ->
        window.location = removeLink


$(document).on "click", ".popup-modal-dismiss", (e)->
  e.preventDefault()
  $.magnificPopup.close()

