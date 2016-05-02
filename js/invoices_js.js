/* 
 *
 */


$(function() {
    
    $.fn.editable.defaults.mode = 'inline';
    
    var dialog, form;  
      
    invoice_loadProductOptionsExtras() ;
    
    dialog = $( "#invoices_dialog_form" ).dialog({
      autoOpen: false,
      height: 450,
      width: 500,
      modal: true,
      buttons: {
        "Add Invoice Item": invoice_addInvoiceItems,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
      }
    });
 
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
     event.preventDefault();
     
      invoice_addInvoiceItems(form,dialog);
      
    });
 
    $( "#add_invoice_items_popup" ).on( "click", function() {
      dialog.dialog( "open" );
     
    });
    
    
    /**
     * EDIT INVOICE ITEM
     * this is achived using inline-editing plugin.
     * the link is embeded in the item you are editing
     */    
    $('#invoice-template-editable td.invoice-item-unitp').editable({
	
	 selector: 'a',
	success: function(response) {	    
	    
	   $('#invoice-template-editable .fdmsg').remove(); 
	   
	    if(response.error == 1){
		$('#invoice-template-editable').prepend("<tr id='fdmsg'> <td class='alert alert-danger' colspan='100%'> "+response.error_msg+"</td> </tr>");
		
		return false;
	     }
	     else{
		 $('#invoice-template-editable').prepend("<tr> <td class='alert alert-success' colspan='100%'> "+response.success_msg+"</td> </tr>");
		
		window.location.reload();
		//invoice_reloadInvoiceTheme();
	     }
	}
    });
    
    
    
    	///REVEAL FREQUENCY OF OCCURENCE WHEN RADIO BUTTON IS CLICKED

	$('#reoccuring_status input[name=is_reoccuring]').on('change', function() {
	  //  alert($('input[name=radioName]:checked', '#myForm').val()); 
	  var is_reoccuring = $(this).val();
	   // console.log(re_occurring_frequency);
	    if(parseInt(is_reoccuring) == 1){
		$('#re_occurring_frequency').removeClass('none');
	    }
	    else{
		$('#re_occurring_frequency').addClass('none');
	    }
	 });

    
    
    
    
    function invoice_addInvoiceItems() { 
   
	$.ajax({
	    type : form.attr("method"),
	    url : form.attr("action"),
	    data : form.serialize(),
	    success : function(response) {

	    }
	}).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
	    alert("there was error adding this item");

	}).done(function(response) {
	    if(response.error == 1){
		$('#feedback_msg').html("<div class='alert alert-danger'> "+response.error_msg+" </div>");

		return false;
	     }
	     else{
		 dialog.dialog( "close" );
		   window.location.reload();
		 //invoice_reloadInvoiceTheme(); 
	     }
	});
    }
 	return false;
    
});




  
function invoice_loadProductOptionsExtras(){
    if($('#product_optionID').length < 1){
	return false;
    }

    var product_optionID = parseInt($("#product_optionID").val());
    
    $('.option-row').addClass('none');
    //lets also disable all the input fields so we send only the ones needed
    $('.option-row input[type="text"]').prop('disabled',true);
    
    // release only needed
    $('.option-row-'+product_optionID).removeClass('none');
    $('.option-row-'+product_optionID+' input[type="text"]').prop("disabled", false);
    
}   
    
    
function invoice_reloadInvoiceTheme_NOTUSED(){
     $.ajax({
	type : 'POST', 
	url :  window.location.href,
      //  data : form.serialize(),
	success : function(response) {

	}
    }).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
	alert("there was error adding this item");

    }).done(function(response) {
	// console.log(response);
	$('#invoice-theme-wrapper').html(response);
    });
}



/**
 * remove ivoic item from the invoice
 * @param {type} clientID
 * @param {type} invoiceID
 * @param {type} invoice_itemID
 * @returns {Boolean}
 */
function invoice_removeInvoiceItem(clientID, invoiceID, invoice_itemID){
    var answer = confirm("You are sure you want to delete this item?");
    if (answer){ 
	
	$.ajax({
       // config object defined in footer.php
       type : 'POST', 
       url :  jsconfig.baseurl +"invoice/manage/deleteInvoiceItem",
       dataType: "json",
       data : {invoice_itemID:invoice_itemID, invoiceID: invoiceID, clientID:clientID, del_inv_item:'submit'},
       success : function(response) {

	    }
	}).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
	    alert("there was error adding this item");

	}).done(function(response) {
	   
	    if(response.error == 1){
		console.log(response.error_msg);
		alert("There was error deleting this record");
	    }
	    else{
		//alert('reload');
		window.location.reload();
		//invoice_reloadInvoiceTheme();
	    }
	});
	
    }
    else{ 
	return false;  
    }       
    return false;
}



/**
 * save invoice paramater/settings
 * @returns {undefined}
 */
function SaveInvoiceSettings_NOTUSED(){
    var form = $("#save-invoice-settings-form");
    $.ajax({
	    type : form.attr("method"),
	    url : form.attr("action"),
	    data : form.serialize(),
	    success : function(response) {
		
		if(response.error == 1){
		    $('#feedback_msg_save_settings').html("<div class='alert alert-danger'> "+response.error_msg+" </div>");

		 }
		 else{
		    $('#feedback_msg_save_settings').html("<div class='alert alert-success'> "+response.success_msg+" </div>"); 
		 }
	    }
	}).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
	    alert("there was error adding this item");

	}).done(function(response) {
		//console.log(response.error_msg)
		clearContent('feedback_msg_save_settings'); // function in scrippt.js
	});
    //console.log(datastring);
    return false;    
}


