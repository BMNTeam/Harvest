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
        $form.find('form').submit()


#Close modal window function
$(document).on "click", ".popup-modal-dismiss", (e)->
  e.preventDefault()
  $.magnificPopup.close()


# Create order function
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
      $form.find('.bmn-add-to-stock').attr('data-validation-allowing', "range[1;#{RowRecord.corns}, float]")


# Finish order function
$('.pop-up-finish-order').magnificPopup
  type: 'inline'
  preloader: false
  modal: true
  callbacks:
    open: ()->
      RowRecord = new Object
      $content = this.currItem.el[0]
      $parentTr = $($content).parents('tr')
      $form = $('#finishOrder').find('form')
      RowRecord = getClickedRowValues($parentTr)

      #setVariables
      $form.find('.stock_id').val(RowRecord.orderId);
      $form.find('.change_culture_name').val(RowRecord.cultureName)
      $form.find('.change_sort_name').val(RowRecord.sortName)
      $form.find('.change_reproduction_name').val(RowRecord.reproductionName)
      $form.find('.change_corns').text(RowRecord.maximumInStock)
      $form.find('.change_customer_name').val(RowRecord.customer)
      $form.find('.change_corns_number').val(RowRecord.corns)
      $form.find('.change_corns_number').attr('data-validation-allowing', "range[1;#{RowRecord.maximumInStock}, float]")



#Change users information pop-up
$('.popup-change-customer-info').magnificPopup
  type: 'inline'
  preloader: false
  modal: true
  callbacks:
    open: ()->
      $content                  = this.currItem.el[0]
      $parentTr                 = $($content).parents('tr')
      $form                     = $('#editCustomer').find('form')

      #current values in table
      currentCustomer           = new Object
      currentCustomer.id        = $parentTr.find('.customer_id').text()
      currentCustomer.name      = $parentTr.find('.customer_name').text()
      currentCustomer.address   = $parentTr.find('.customer_address').text()
      currentCustomer.contacts  = $parentTr.find('.customer_contacts').text()

      #get input fields to setup
      formValues                = new Object
      formValues.id             = $form.find('.customer_id')
      formValues.name           = $form.find('.customer_name')
      formValues.address        = $form.find('.customer_address')
      formValues.contacts       = $form.find('.contacts')

      #set values to input fields from currentUser object
      formValues.id.val         ( currentCustomer.id )
      formValues.name.val       ( currentCustomer.name)
      formValues.address.val    ( currentCustomer.address)
      formValues.contacts.val   ( currentCustomer.contacts)






# Find elements in the closest row and return it as
# an Object
getClickedRowValues = ($parentTr) ->
  RowRecord = new Object

  RowRecord.orderId = $parentTr.find('.stock-id').text()
  RowRecord.cultureName = $parentTr.find('.culture-name').text()
  RowRecord.sortName = $parentTr.find('.sort-name').text()
  RowRecord.reproductionName = $parentTr.find('.reproduction-name').text()
  RowRecord.vall = $parentTr.find('.vall').text()
  RowRecord.corns = $parentTr.find('.corns').text()
  RowRecord.customer = $parentTr.find('.customer_name').text()
  RowRecord.maximumInStock = $parentTr.find('.stock-id').attr('data-corns-in-stock')

  return RowRecord

