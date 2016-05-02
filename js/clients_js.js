/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$(function(){
   var clientID = $('#clientID').val();
   
//   console.log(clientID);
//   
//   return false;
   
    $.ajax({
	url: jsconfig.baseurl+"dashboard/num-of-events?clientID="+clientID,
	type: 'GET',
	async: true,
	dataType: "json",
	success: function (response) {
	    client_invoiceNumberOfEvents(response.series, response.categories)
	}
    });
    
   /* 
    //display cash flow
    $.ajax({
	url: jsconfig.baseurl+"dashboard/invoice-cash-flow",
	type: 'GET',
	async: true,
	dataType: "json",
	success: function (response) {
	    //visitorData(data);
	
	    dashboard_invoiceCashFlow(response.series, response.categories)
	}
    });
    
    */
});



/**
 * count how many were created, processed and completed
 * @param {type} data
 * @param {type} categories
 * @returns {undefined}
 */
function client_invoiceNumberOfEvents(data,categories ){
    $('#client_chart_count_events').highcharts({
    chart: {
        type: 'column'
    },
    title: {
        text: 'Invoice Summary'
    },
    subtitle: {
            text: 'counting the number of cases'
        },
    xAxis: {
        categories:categories,
	 crosshair: true
    },
    yAxis: {
	min: 0,
        title: {
            text: 'Number of Events'
        }
    },
    plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
    series: data
  });
}



/**
 * display total cash flow by month
 * @param {type} data
 * @param {type} categories
 * @returns {undefined}
 */

function client_invoiceCashFlow(data,categories ){
    $('#chart_invoice_cashflow').highcharts({
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cash Flow (£)'
    },
    subtitle: {
            text: 'Monthly Invoice Amount'
        },
    xAxis: {
        categories:categories,
	 crosshair: true
    },
    yAxis: {
	min: 0,
        title: {
            text: 'Amount (£)'
        },
	labels: {
                overflow: 'justify'
            }
    },
//    credits: {
//	enabled: false
//    },
    tooltip: {
       // pointFormat: "Total amount: £{point.y:.2f}",
	formatter: function() {
      //  return 'Total amount <b>' + this.x + '</b> is <b>' + this.y + '</b>, in series '+ this.series.name;
	return this.series.name + ' in ' + this.x + ' is £' + this.y.toFixed(2) ;
	}
    },
    plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: '2'
            }
        },
    series:  data
	    
  });
}




/* 
 * ADVISER DIALOG
 * on the adding client, you may want to associate an adviser with a client. show this search screen
 */


$(function() {    
  
    var dialog, form;
    
    
    dialog = $( "#searchAdviserDialog" ).dialog({
	autoOpen: false,
	height: 450,
	width: 600,
	modal: true,
	buttons: [
		    {
			text: "Close",
			class: 'ui-OKButtonClass',
			click: function() {
			     dialog.dialog( "close" );
			}
		    }
		   // {
//			text: "Save",
//			class : 'saveButtonClass',
//			click: function() {
//			    // Save code here
//			}
		   // }
		],
	close: function() 
		{
		    form[ 0 ].reset();
		}
    });
 
 
    form = dialog.find( "form#advSearchResult" ).on( "submit", function( event ) {
	  event.preventDefault();
	$("form#advSearchResult .alert").html();
	
	
	if($('form#advSearchResult input[name=adviserID]:checked').length<=0){
	     $("form#advSearchResult .alert").html("Please select an adviser").addClass('alert-danger');
	     
	      event.preventDefault();
	}else{
	    // add the selected options to the exisitng form and clear pop up
	   var selectedRow_code = $('form#advSearchResult input[name=adviserID]:checked').val();
	   var selectedRow_class = $('form#advSearchResult input[name=adviserID]:checked').parents('tr').prop('className');
	
	    $('#s_advserURL').val(selectedRow_code)
	    $('#s_adviserNames').val($('.'+selectedRow_class+'_name').html());
	    dialog.dialog("close");
	
	}      
    });
    
    
 
    $( "#searchAdviser" ).on( "click", function() {
      dialog.dialog( "open" );
     
    });
    
     $( "#s_advs" ).on( "click", function() {	 
	 listAdvisers();
    });
 
    
    
    function listAdvisers() { 
   
	$.ajax({
	    type : form.attr("method"),
	   // url : form.attr("action"),
	    url :  jsconfig.baseurl +"advisers/xhttplist",
	   // data : form.serialize(),
	     data : $('form#advSearchForm').serialize(),
	    success : function(response) {

	    }
	}).fail(function() { //change the error handler to use ajax callback because of the async nature of Ajax
	    alert("there was error adding this item");

	}).done(function(response) {   
	 
	    if(response.error == 0){
		
		var count = 1;
		$('#advSearchResult table').html(''); //clear list
		
		$.each(response.adv, function(index, val){
		   $('#advSearchResult table').append(
		    "<tr class='row_"+count+"'>"+
			 "<td class='row_"+count+"_code'><input type='radio' name='adviserID' value='"+val.code+"' /></td>"  +
			
			 "<td class='row_"+count+"_name'>"+val.name+"</td>"+
			  "<td call='row_"+count+"_company'>"+val.company+"</td>"+
			   "<td><button>Select</button></td>"+
		    "</tr>"
		   );
		   
		    count++;
		})
	     }
	     
	});
    }
 	return false;
    
});


