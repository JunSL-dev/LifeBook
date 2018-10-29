$(document).ready(function(){
    var original;
    var number = $('#number').val();
    var date = new Date();
    var now = (date.getMonth()+1 <10) ?
                date.getFullYear()+"-0"+(date.getMonth()+1)+"-"+date.getDate():
                date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
    var data = $('#form').serializeArray();
    $('#book_content').keydown(function(key){
        if(key.keyCode == 13){
            return false;
        }
    });

    $('#checkbox').on('change',function(){
        if($('#checkbox').is(':checked')){
            $('#book_date').removeAttr('required');
            $('#book_date').attr('readonly','');
            $('#book_date').val(now);
        } else{
            $('#book_date').removeAttr('readonly');
            $('#book_date').attr('required','');
            $('#book_date').val('');
        }
    });

    $('#log-out').click(function(){
        location.replace('../logout');
    });

    $('.mod-enter').click(function(){
        var mod = $(this).parent().parent().find('.card-content').find('.c').html();
        $(this).parent().parent().find('.card-footer').find('a').removeClass('enabled');
        $(this).parent().parent().find('.card-footer').find('a').addClass('disabled');
        $(this).parent().parent().find('.card-content').find('.c').attr('contenteditable','false');
        var ajax = {'original':original,'mod':mod};
        $.ajax({
            type:'GET',
            url:'../modify?original='+ajax['original']+'&mod='+ajax['mod'],
        }) .done(function(msg){
        });
    });

    $('.mod').click(function(){
        $(this).parent().parent().find('.card-content').find('.c').attr('contenteditable','true');
        original = $(this).parent().parent().find('.card-content').find('.c').html();

        var that = $(this).parent().parent().find('.card-content').find('.c');
        var these = this;

        $(this).parent().parent().find('.card-content').find('.c').focus();
        var cnt=0;
        $(this).parent().parent().find('.card-content').find('.c').keydown(function(key){
           if(key.keyCode==13){
               setTimeout(function(){
                   cnt++;
                   // if(cnt ==2){
                   //      var mod = that.html();
                   //     $(these).parent().parent().find('.card-footer').find('a').removeClass('enabled');
                   //     $(these).parent().parent().find('.card-footer').find('a').addClass('disabled');
                   //     $(these).parent().parent().find('.card-content').find('.c').attr('contenteditable','false');
                   //     var ajax = {'original':original,'mod':mod};
                   //     $.ajax({
                   //         type:'GET',
                   //         url:'../modify?original='+ajax['original']+'&mod='+ajax['mod'],
                   //     }) .done(function(msg){
                   //     });
                   // }
               },150);
               return false;
           }
        });

        $(this).parent().parent().find('.card-footer').find('a').removeClass('disabled');
        $(this).parent().parent().find('.card-footer').find('a').addClass('enabled');
    });
});