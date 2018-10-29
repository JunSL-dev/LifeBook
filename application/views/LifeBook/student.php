<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="/static/js/jquery-3.2.0.min.js"></script>
        <link rel="stylesheet" href="/static/css/bulma.css">
        <link rel="stylesheet" href="/static/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="/static/js/student.js?ver=5"></script>
        <link rel="stylesheet" href="/static/css/student.css?ver=1">
    </head>
    <body>
        <form method="post" id="form">
            <div id="nav">
                <input type="text" name="number" id="number" value="<?php echo $number?>" hidden>
                <input type="date" name="book_date" id="book_date" required>
                <input type="checkbox" name="checkbox" id="checkbox">
                <span id="today">오늘 날짜로 작성</span>
                <button type="button" id="log-out"><span id="l">로그아웃 하시덩가 </span></button>
                <textarea type="text" name="book_content" required id="book_content" placeholder="생기부에 쓸 내용을 입력하세요"></textarea>
                <button type="submit" id="submit"><span id="write">생기부 입력  </span></button>
            </div>
        </form>
        <div id="pages">
            <?php
            $i=1;
                foreach(array_reverse($board) as $b){
                    if ($b->number <= 9) {
                        $number = "250" . $b->number;
                    } else {
                        $number = "25" . $b->number;
                    }
                    $date = substr($b->book_date, 0, 4) . "." . substr($b->book_date, -5, -3) . "." . substr($b->book_date, -2);
                    ?>
                    <div class="student card">
                        <header class="card-header">
                            <p class="card-header-title">
                                <span class="name">&sect;<?php echo $b->user; ?> <sup class="type">(<?php echo $number; ?>)</sup></span>
                            </p>
                            <a class="card-header-icon mod">
                              <span class="icon">
                                <i class="fa fa-pencil"></i>
                              </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <p class="content c">(<?php echo $date; ?>)<?php echo $b->book_content ?></p>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a class="card-footer-item mod-enter disabled">확인</a>
                        </footer>
                    </div>
                    <?php
                    $i++;
                }

            ?>
            </div>
    </body>
</html>