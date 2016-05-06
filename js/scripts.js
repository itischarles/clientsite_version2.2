/* 
 * 
 */


$(function(){
    
    /**
     * 
     * show tool tips on element 
     */
       $('[data-toggle="tooltip"]').tooltip(); 




    
    
    // date from today to 2yrs + 10 days
    $( "#general_date1, #general_date2" ).datepicker({
        minDate: 0,
        maxDate: "+2Y +12M" ,
        dateFormat:'dd-mm-yy',
	showOn: "button",
        buttonImageOnly: true,
        buttonText: "cal",
        buttonImage: jsconfig.baseurl+ "images/calendar.gif",
        changeMonth: true,
        changeYear: true  
    });
    
    
    // date from jan 2010 to today
    $( "#general_date2" ).datepicker({
        minDate: new Date('01/01/2010'),
        maxDate: new Date(),
        dateFormat:'dd-mm-yy',
        showOn: "button",
        buttonImageOnly: true,
        buttonText: "cal",
        buttonImage: jsconfig.baseurl+ "images/calendar.gif",
        changeMonth: true,
        changeYear: true    
    });
    
     // date from today to 10years
    $( "#general_date3" ).datepicker({
        minDate: new Date(),
        maxDate: "+10Y +12M" ,
        dateFormat:'dd-mm-yy',
        showOn: "button",
        buttonImageOnly: true,
        buttonText: "cal",
        buttonImage: jsconfig.baseurl+ "images/calendar.gif",
        changeMonth: true,
        changeYear: true    
    });
    
    
    /** DATE PICKER RANGE, **/
   
    $( "#general_range_from" ).datepicker({     
        minDate: new Date('01/01/2016'),
     
	maxDate: "+3Y +12M" ,
        
        dateFormat:'dd-mm-yy',
        numberOfMonths: 1,
        showOn: "button",
        buttonImageOnly: true,
        buttonText: "cal",
        buttonImage: jsconfig.baseurl+ "images/calendar.gif",
        changeMonth: true,
        changeYear: true, 
           
        showAnim:'slide',
        onClose: function( selectedDate ) {
            $( "#general_range_to" ).datepicker( 
                    "option", "minDate", selectedDate );
        }
     });
     
    $( "#general_range_to" ).datepicker({
       minDate: new Date('01/01/2016'),
       // maxDate: new Date(),
	maxDate: "+3Y +12M" ,

        dateFormat:'dd-mm-yy',
       // dateFormat:'MM-yy',
        numberOfMonths: 1,
      showOn: "button",
        buttonImageOnly: true,
        buttonText: "cal",
        buttonImage: jsconfig.baseurl+ "images/calendar.gif",
        changeMonth: true,
        changeYear: true ,
           
        showAnim:'slide',
        onClose: function( selectedDate ) {
            $( "#general_range_from" ).datepicker( 
                "option", "maxDate", selectedDate );
        }
    });
    
    
    
    /**
     * hide container on click out
     */
    $(document).mouseup(function (e){
	var container = $(".ajx-suggest-list");

	if (!container.is(e.target) // if the target of the click isn't the container...
	    && container.has(e.target).length === 0) // ... nor a descendant of the container
	{
	    container.hide();
	}
    });
    
    
    
   
   ///#########PRICE FORMATER###############/
    $('.price_field').priceFormat({
        prefix: '',
        centsSeparator: '.',
        thousandsSeparator: ',',
        allowNegative:true
    });
     
     $(".price_field2").bind('blur', function(){
	$(this).formatNumber({format:"###,###,###,##0.00", locale:"gb"});
    });
  
  
  //###### GRADDABLE CONTENT#####
    $( ".dragableDiv" ).draggable({
        addClasses: false
    });
    
    //##### SORTALE TABLE ######
    $(".isSortable").tablesorter();
    
    //########## TIME FORMATER #########
    $('.timePicker').timepicker({ 
	timeFormat: 'HH:mm',
    });

    $('.isTimeField').formatInput();
   
});



    (function($){
        $.fn.extend({
	    formatInput: function(settings) {
		    var $elem = $(this);
		    settings = $.extend({
			    errback: null
		    }, settings);
		    $elem.bind("blur.filter_input", $.fn.formatEvent);
	    },
	    formatEvent: function(e) {
		    var elem = $(this);
		    var initial_value = elem.val();
		    elem.val($.fn.insertSpaces(initial_value));
	    },
	    insertSpaces: function(number) {
		number =  number.replace(/[^0-9.]/g, "");

		 if(isNaN(number)){
		     number = 100;
		 }
		//console.log(number);

		 if(number.toString().length < 3){
		     number = number*100;
		 }
		 number = number.toString();
		 position = length-2;
		 output = [number.slice(0, position), ":", number.slice(position)].join('');

		 return output;
	    }
	    });
    })(jQuery);



/**
 * get confirmation before action
 * @param {string} message
 * @returns {Boolean}
 */
function get_confirmation(message){
     var answer = confirm(message)
	if (answer){ return true; }
       else{ return false;   }       
       return false;
}


function clearContent(div_id){
    setTimeout(function(){
	$('#'+div_id).html('');
    }, 6000);
}



 function downloadCSV_fromHTMLtable(tableID, filename){
 //  $('#donload_link_'+tableID).append('<span class="center" style="margin-left:5em" id="ajax_loading"><img src="<?php echo base_url('images/ajaxLoadersmall.gif')?>" alt="ajax load" /></span>');

   
        // $('#ajax_loading').remove();

     
     $("#"+tableID).table2excel({
	   // exclude: ".noExl",
	    name: "IM Invoice System Export:",
	    filename: filename,
	    exclude_img: true,
	    exclude_links: true,
	    exclude_inputs: true
    });
       
}



