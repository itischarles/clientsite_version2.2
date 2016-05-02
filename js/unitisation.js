





$(function(){

     addClientPortfolio();
     removeClientPortfolio();

    searchPortfolios();

});



function searchPortfolios(){
    
    $('body').on('keyup', '.ajx_searchPortfolio',  function(){
	
	var ref = $(this).val();
	var instance = $(this);
	
     $.ajax({
       // config object defined in footer.php
       type : 'POST', 
       url :  jsconfig.baseurl +"portfolios/ajx-search",
       dataType: "json",
       data : {ref:ref},
       success : function(response) {

	    }
	}).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
	    alert("there was error adding this item");

	}).done(function(response) {
	   
	   $('.ajx-suggest-list').remove();
		ajxSuggestList = '';
		
	    if(response.portfolios.length > 0){		
		
		instance.parent('td').append('<div class="ajx-suggest-list"></div>');
		
		$.each(response.portfolios, function(key,val ){
		    ajxSuggestList += "<p>"+val.reference+"</p>";		  
		});
		 $('.ajx-suggest-list').html(ajxSuggestList);
	    }
	    
	});	
    });
}


function addClientPortfolio(){
    
    $(".tr_cloneable_add").on('click', function() {
	var lastRow = $('#c-investmentoptn').find('tr').last().clone();
	id = lastRow.attr('id');
	
	newID = parseInt(id)+1;
	lastRow.attr('id', newID).appendTo('#c-investmentoptn');
	//$('#c-investmentoptn').find('tr').last().clone() .appendTo('#c-investmentoptn');
	// now update the new last row so the number reflects
	$('#'+newID+' input.invst-ref').attr('name','invst['+newID+'][invst-ref]');
	$('#'+newID+' input.invst-split').attr('name','invst['+newID+'][invst-split]');
    });

}



function removeClientPortfolio(){
    
     $('body').on('click', '.tr_cloneable_remove',  function(){
	$(this).parents('tr').remove();	
     });
    
}



function getPortfolioBreakDown(clientUrl){
    
      $.ajax({
       // config object defined in footer.php
       type : 'POST', 
       url :  jsconfig.baseurl +"ajx-getunitisation-breakdown",
       dataType: "json",
       data : {clientUrl:clientUrl},
       success : function(response) {

	    }
	}).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
	    alert("there was error adding this item");

	}).done(function(response) {	  
		//console.log(response.client.length);
	    //if(response.client.length > 0){
		$('#modal-client-name').html(response.client.fullNames);
		
		var unitisationDetails = response.client.unitisationDetails;
		//console.log(unitisationDetails.length);
		
		var row =''; 
		   $.each(unitisationDetails, function(key,val ){
		 	row +='<tr>'+
				    "<td>"+val.portfolioReference +"</td>"+
				    "<td>"+val.portfolioName +"</td>"+
				    "<td>"+val.portfolioValueOnUpload +"</td>"+
				    "<td>"+val.amountInPortfolioBasedOnUnits +"</td>"+

				    "<td>"+val.percentageSplit +"</td>"+
				    "<td>"+val.percentageSplitOnAmount +"</td>"+
				    "<td>"+val.numberOfUnitsHeld +"</td>"+
				    "<td>"+val.pricePerUnit +"</td>"+
				'</tr>';
		    }); 
		   
		    
		    $('#clientHoldings_Modal table tbody').html(row);
		//}		
	   // }
	    
	});	
}