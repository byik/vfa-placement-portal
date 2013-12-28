/**
* This jQuery plugin displays realtime feedback by toggling
* the has-error and has-success classes on the input's
* parent element.
*
* DOM elements having class "required" will be validated every
* 200 ms (time-based to account for autofills). Additional
* validation classes include:
*/
$(document).ready(function() {  

    setInterval(function(){
        displayRealtimeFeedback();
    }, 200);

    function displayRealtimeFeedback(){
        $('.required').each(function(){
            input = $(this);
            if(input.val().length > 0){
                input.parent().removeClass('has-error');
                input.parent().addClass('has-success');
            } else {
                input.parent().removeClass('has-success');
                input.parent().addClass('has-error');
            }
        });
    }
});