asdf = true; // hover 적용 변수
qwer = true; // 카드가 커졌을때는 iframe으로 갈 수 없음
$(document).ready(function() { // 이 부분은 카드 눌렀을 때 버튼 사라지고 확대 + 축소 후 카드 생성

    var flag = false;


    $('.card').on('click', function() {
        $('.card').css('display', 'none');
        $('.button').css('display', 'none');
        $(this).css('position', 'absolute');
        $(this).css('display', 'block');
        asdf = false;

        if (flag == false) {

            $(this).css('width', '100vw');
            $('.nav').fadeOut(300);
            $(this).find('.card-image').css('width','30%');
            $(this).find('.inline').css('display','inline-block');
            $(this).find('.frame').fadeIn(300);
            flag = true;
            qwer = false;
        } else {
            $(this).css('width', '250px');
            $('.nav').fadeIn(300);
            $(this).find('.card-image').css('width','100%');
            $(this).css('position', 'relative');
            $(this).find('.frame').fadeOut(300);
            $('.card').css('display', 'inline-block');
            $('.button').css('display', 'inline-block');
            flag = false;
            asdf = true;
            qwer = true;

        }

        return false;
    });
});



var page = 0;


$(document).ready(function() { //이 부분은 버튼을 눌렀을 때, 페이지 삭제 및 생성
    var pg = ["a", "b", "c", "d"];
    $('#left').on('click', function() {
        if (page <= 0) {
            return;
        } else {
            $('.' + pg[page]).css('display', 'none');
            $('.button').css('display', 'none');
            $('.' + pg[page - 1]).css('display', 'inline-block');
            $('.button').css('display', 'inline-block');
            page--;


        } //왼쪽으로 이동

    });

    $('#right').on('click', function() {
        if (page >= 3) {
            return;
        } else {
            $('.' + pg[page]).css('display', 'none');
            $('.button').css('display', 'none');
            $('.' + pg[page + 1]).css('display', 'inline-block');
            $('.button').css('display', 'inline-block');
            page++;
        }
        //여기다가는 페이지 이동이 들어감 (에니메이션은 아마도 슈루룩 타타탁)

    })

})





$(document).ready(function() { // 이 부분은 hover 적용

    $('.card').mouseenter(function() {
        if (asdf == true) {
            $(this).css('width', '265px');
        }

    });

    $('.card').mouseleave(function() {
        if (asdf == true) {
            $(this).css('width', '250px');
        }
    });
});


$(document).ready(function() { //iframe 동작

    $('.iframe').fadeIn(500);

    var pg = ["a", "b", "c", "d"];
    var flag = true;
    $('.menu').on('click', function() {
        if (flag == true) {
            $('.iframe').fadeOut(300,function(){
                $('.menu').fadeOut(200,function(){
                   $('.menu').html("뒤로!");
                    $('.menu').fadeIn(200);
                });
                $('.a').fadeIn(500,function(){
                   $('.button').fadeIn(200);
                    $('.button').css('display','inline-block');
                });
            });
            // $(this).innerHTML = "one time";

            flag = false;
        } else {
            if (qwer == true) {
                $('.menu').fadeOut(200,function(){
                    $('.menu').html("학생 개별로 보기!");
                    $('.menu').fadeIn(200);
                    page=0;
                });
                // $(this).innerHTML = "Name";
                for (var i = 0; i < 4; i++) {
                    $('.' + pg[i]).fadeOut(500,function(){
                        $('.button').fadeOut(200,function(){
                           $('.iframe').fadeIn(300);
                        });
                    });
                }
                flag = true;
            }
        }
    });
});

$(document).ready(function(){
    $('#log-out').click(function(){
        location.replace('logout');
    });
});