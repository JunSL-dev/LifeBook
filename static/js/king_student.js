$(document).ready(function(){
    $('.submit').click(function(){
        $(this).parent().parent().fadeOut(500);
        var argn = $(this).parent().parent().find('.get_number').val();
        var arg = $(this).parent().parent().find('.get_id').val();
        $.ajax({
            method:'GET',
            url:'../check/'+arg
        });
    });
});