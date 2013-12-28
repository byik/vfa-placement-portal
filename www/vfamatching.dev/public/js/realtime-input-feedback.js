/**
* This jQuery plugin displays realtime feedback by toggling
* the has-error and has-success classes on the input's
* parent element.
*
* DOM elements having class "required" will be validated every
* 200 ms (time-based to account for autofills). Optionally,
* include character-limit-min and/or character-limit-max 
* attributes
*
* Additional validation classes include:
* requires-email
* requires-zip
* requires-url
* requires-year
* requires-int
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
            //Minimum character limit
            if(input.attr('character-limit-min') != undefined){
                if(input.val().length < input.attr('character-limit-min')){
                    input.parent().removeClass('has-success');
                    input.parent().addClass('has-error');    
                }
            }
            //Maximum character limit
            if(input.attr('character-limit-max') != undefined){
                if(input.val().length > input.attr('character-limit-max')){
                    input.parent().removeClass('has-success');
                    input.parent().addClass('has-error');    
                }
            }
            //Email
            if(input.hasClass('requires-email')){
                var re = /[a-z0-9!#$%&'*+/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                if(!re.test(input.val())){
                    input.parent().removeClass('has-success');
                    input.parent().addClass('has-error');    
                }
            }
            //ZIP code
            if(input.hasClass('requires-zip')){
                var re = /^\d{5}(?:[-\s]\d{4})?$/;
                if(!re.test(input.val())){
                    input.parent().removeClass('has-success');
                    input.parent().addClass('has-error');    
                }
            }
            //URL
            if(input.hasClass('requires-url')){
                var re = /^(http|https):\/\/(([a-zA-Z0-9$\-_.+!*'(),;:&=]|%[0-9a-fA-F]{2})+@)?(((25[0-5]|2[0-4][0-9]|[0-1][0-9][0-9]|[1-9][0-9]|[0-9])(\.(25[0-5]|2[0-4][0-9]|[0-1][0-9][0-9]|[1-9][0-9]|[0-9])){3})|localhost|([a-zA-Z0-9\-\u00C0-\u017F]+\.)+([a-zA-Z]{2,}))(:[0-9]+)?(\/(([a-zA-Z0-9$\-_.+!*'(),;:@&=]|%[0-9a-fA-F]{2})*(\/([a-zA-Z0-9$\-_.+!*'(),;:@&=]|%[0-9a-fA-F]{2})*)*)?(\?([a-zA-Z0-9$\-_.+!*'(),;:@&=\/?]|%[0-9a-fA-F]{2})*)?(\#([a-zA-Z0-9$\-_.+!*'(),;:@&=\/?]|%[0-9a-fA-F]{2})*)?)?$/;
                if(!re.test(input.val())){
                    input.parent().removeClass('has-success');
                    input.parent().addClass('has-error');    
                }
            }
            //Year. NOTE: This needs updated in 2999
            if(input.hasClass('requires-year')){
                var re = /^(19|20)\d{2}$/;
                if(!re.test(input.val())){
                    input.parent().removeClass('has-success');
                    input.parent().addClass('has-error');    
                }
            }
            //Integer
            if(input.hasClass('requires-int')){
                var re = /^\d+$/;
                if(!re.test(input.val())){
                    input.parent().removeClass('has-success');
                    input.parent().addClass('has-error');    
                }
            }
        });
    }
});