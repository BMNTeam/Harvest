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
      RowRecord = new Object
      $content = this.currItem.el[0]
      $parentTr = $($content).parents('tr')
      $form = $('#changeContent')

      RowRecord = getClickedRowValues($parentTr)

      #setVariables
      $form.find('.stock_id').val(RowRecord.orderId);
      $form.find('.change_culture_name').val(RowRecord.cultureName)
      $form.find('.change_sort_name').val(RowRecord.sortName)
      $form.find('.change_reproduction_name').val(RowRecord.reproductionName)
      $form.find('.change_vall').val(RowRecord.vall)
      $form.find('.change_corns').val(RowRecord.corns)

      removeLink = $content.getAttribute('data-remove')
      $('#remove').on 'click', ->
        $.validate()
        $form.find('form').submit()


$(document).on "click", ".popup-modal-dismiss", (e)->
  e.preventDefault()
  $.magnificPopup.close()

$('.popup-add-to-stock-modal').magnificPopup
  type: 'inline'
  preloader: false
  modal: true
  callbacks:
    open: ()->
      RowRecord = new Object
      $content = this.currItem.el[0]
      $parentTr = $($content).parents('tr')
      $form = $('#addOrder').find('form')
      RowRecord = getClickedRowValues($parentTr)

      #setVariables
      $form.find('.stock_id').val(RowRecord.orderId);
      $form.find('.change_culture_name').val(RowRecord.cultureName)
      $form.find('.change_sort_name').val(RowRecord.sortName)
      $form.find('.change_reproduction_name').val(RowRecord.reproductionName)
      $form.find('.change_corns').text(RowRecord.corns)







getClickedRowValues = ($parentTr) ->
  RowRecord = new Object

  RowRecord.orderId = $parentTr.find('.stock-id').text()
  RowRecord.cultureName = $parentTr.find('.culture-name').text()
  RowRecord.sortName = $parentTr.find('.sort-name').text()
  RowRecord.reproductionName = $parentTr.find('.reproduction-name');
  RowRecord.vall = $parentTr.find('.vall').text()
  RowRecord.corns = $parentTr.find('.corns').text()

  return RowRecord

