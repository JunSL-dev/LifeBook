<!DOCTYPE html>
<html>

    <head>
        <!--<script src = "http://ricostacruz.com/jquery.transit/jquery.transit.min.js"></script>-->
        <!--<script src = "transition.js"></script>-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="/static/js/jquery-3.2.0.min.js"></script>
        <script src="/static/js/king_v.js?ver=1"></script>
        <link rel="stylesheet" tyep="image/png" href="/static/css/king_v.css?ver=1">
        <title>LifeBook for 김상욱</title>
    </head>

    <body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">

        <div class="nav">
            <ul>
                <li class="menu li">학생 개별로 보기!</li>
                <li class="li" id="log-out">로그아웃</li>
            </ul>
        </div>


        <iframe class="iframe" src="<?php echo site_url('lifebook/king_student/0');?>" height="100%" width="100%" frameborder="0"  allowtransparency="true"></iframe>

        <?php
            for($i = 1;$i<5;$i++){
                if($i == 1 ) $c = 'a';
                else if($i == 2) $c = 'b';
                else if($i == 3) $c = 'c';
                else $c = 'd';

                ?>
                <div class="<?php echo $c;?>">
                    <?php
                        for($j=10*$i-9;$j<=(($i!=4)?$i*10:$i*10-2);$j++){
                        ?>
                            <div class="card">
                                <img src="/static/images/images/CardSkin_<?php echo $j?>.png" class="card-image inline" draggable="false">
                                <iframe class="frame inline" src="<?php echo site_url('lifebook/king_student/'.$j);?>" allowtransparency="true" hidden frameborder="0"></iframe>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <?php

            }
        ?>

        <div class="button" id="left"><img src="/static/images/images/button_l_w.png"></div>
        <div class="button" id="right"><img src="/static/images/images/button_r_w.png"></div>



    </body>

</html>