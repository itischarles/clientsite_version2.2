/* 
 * all these relates to products
 */








/**
 * this is used when creating new invoice and we want to load products options
 * @returns {Boolean}
 */

//$(function(){
//    //loadProductOptions();
//});



  $(function() {

    var dialog, form;
    
   
 
    dialog = $( "#editProductOption_dialog" ).dialog({
      autoOpen: false,
      height: 400,
      width: 450,
      modal: true,
      buttons: {
        //"Update": updateProductBillingOption,
        "Close": function() {
          dialog.dialog( "close" );
	  
	   reloadPage(); //reload page
        }
      },
      close: function() {
        form[ 0 ].reset();
      }
    });
 
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
     event.preventDefault();

    });
 
   
   //ADD PRODUCT BILLING OPTION, open a dialog so you can choose from the options
   $('#addProductBillingOption_btn').on('click', function(){

	dialog.dialog( "open" );
   });
   
   
   // auto save when option is selected for this product
   $('#editProductOption_dialog form input[type=checkbox]').on('click', function(event){
       optionUrl = ($(this).val()); 
       productHasThisOption = 0;
       productUrl = $('#product_url').val();
      
      if($(this).is(":checked")){
	 productHasThisOption = 1;
      }
      
      productHasThisBillingOption(productUrl,optionUrl,productHasThisOption);
	      
   });
   

   
    function productHasThisBillingOption(productUrl,optionUrl,productHasThisOption) {  
    
        $.ajax({
            type : 'POST',
            //url : form.attr("action"),
            url   : jsconfig.baseurl+"products/productHasThisBillingOption",
            //data : form.serialize(),
	    data : {productUrl:productUrl,optionUrl:optionUrl,productHasThisOption:productHasThisOption, addOption:"1" },
            dataType: "json",
            success : function(response) {
		
            }
        }).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
            alert("there was error adding this item");

           // attempts++;
        }).done(function(response) {

            if(response.error == 1){

                $('#option-feedback-msg').addClass('alert-danger');
                $('#option-feedback-msg').addClass('alert');
                $('#option-feedback-msg').html(response.error_msg);
            }
            else{
                $('#option-feedback-msg').removeClass('alert-danger');
                $('#option-feedback-msg').addClass('alert');
                $('#option-feedback-msg').addClass('alert-success');
                $('#option-feedback-msg').html(response.success_msg);
         
            }

        }); 
    }
    
   
   
    function reloadPage(){
	window.location.reload();
    }
   
});

