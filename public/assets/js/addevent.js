$( document ).ready(function() {
    
    $('#start_date').datepicker({
       format: 'yyyy-mm-dd',
       clearBtn   : true,
       autoclose  : true,
       startDate    : new Date()
    }).on('changeDate', function () { 
        /*var toDate = $('#end_date').val();
        if(toDate){
            $('#end_date').datepicker('setStartDate', toDate);                 
        }*/ 
    });
    $('#end_date').datepicker({
       format: 'yyyy-mm-dd',
       clearBtn   : true,
       autoclose  : true,
       startDate    : $('#start_date').val()
    }).on('changeDate', function () { 
        /*var fromDate = $('#start_date').val();
        if(fromDate){
            $('#start_date').datepicker('setEndDate', fromDate);                 
        }*/
        $('#start_date').datepicker('setEndDate', $(this).val());    
    });
});