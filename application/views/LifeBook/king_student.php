<!Doctype html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="/static/js/jquery-3.2.0.min.js"></script>
            <link rel="stylesheet" href="/static/css/bulma.css">
            <script src="/static/js/king_student.js?ver=1"></script>
            <link rel="stylesheet" href="/static/css/King_student.css?ver=5">
        </head>
        <body style="background:transparent;"></body>
            <?php

                foreach(array_reverse($board) as $b) {
                    if ($b->type == true) {
                        if ($b->number <= 9) {
                            $number = "250" . $b->number;
                        } else {
                            $number = "25" . $b->number;
                        }
                        $date = substr($b->book_date, 0, 4) . "." . substr($b->book_date, -5, -3) . "." . substr($b->book_date, -2);
                        ?>
                        <article class="student message<?php if($b->mod_type==true) echo " is-warning"?>">
                            <div class="message-header">
                                <p><span class="name"><?php echo $b->user; ?> <sup class="type">(<?php echo $number; ?>)</sup></span></p>
                                <?php if($type!=true && $isTE==FALSE){?><button class="submit delete"></button><?php }?>
                            </div>
                            <div class="message-body">
                                <p class="content">(<?php echo $date; ?>)<?php echo $b->book_content ?></p>
                            </div>
                            <input type="text" class="get_number" hidden value = <?php echo $b->number;?>>
                            <input type="text" class="get_id" hidden value = <?php echo $b->id;?>>
                        </article>
                        <?php
                    } else if($type==true){
                        if ($b->number <= 9) {
                            $number = "250" . $b->number;
                        } else {
                            $number = "25" . $b->number;
                        }
                        $date = substr($b->book_date, 0, 4) . "." . substr($b->book_date, -5, -3) . "." . substr($b->book_date, -2);
                        ?>
                        <article class="message"<?php if($b->mod_type==true) echo " is-warning"?>>
                            <input type="text" class="get_number" hidden value = <?php echo $b->number;?>>
                            <input type="text" class="get_id" hidden value = <?php echo $b->id;?>>
                            <div class="message-header">
                                <p><span class="name">이름:<?php echo $b->user; ?> <sup class="type">(<?php echo $number; ?>)</sup></span></p>
                            </div>
                            <div class="message-body">
                                <p class="content">(<?php echo $date; ?>)<?php echo $b->book_content ?></p>
                            </div>
                        </article>
                        <?php
                    }
                }
            ?>
        </body>
    </html>