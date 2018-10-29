$(document).ready(function(){
    $('#title').fadeIn(1000,function(){
        $('#login').fadeIn(500);
    });
    $.fn.snow({ minSize: 5, maxSize: 10, newOn: 1000 });
});