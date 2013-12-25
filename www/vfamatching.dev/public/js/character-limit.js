$(document).ready(function() {  
    $('.limit').each(function(){
        var charactersLeft = calculateCharactersLeft($(this));
        $(this).after('<small class="pull-right"><span class="current-limit">' + charactersLeft + '</span></em></small>')
    });
    $(".limit").on('change keyup paste', function() {
        var charactersLeft = calculateCharactersLeft($(this));
        $(this).next().children('.current-limit').html(charactersLeft);
        if(charactersLeft <= 10){
            $(this).next().children('.current-limit').css('color', 'red');
        } else {
            $(this).next().children('.current-limit').css('color', 'black');
        }
    });
    function calculateCharactersLeft(input){
        return input.attr('limit') - input.val().length;
    }
});