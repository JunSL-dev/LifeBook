<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type = 'text/javascript' src="/static/js/jquery-3.2.0.min.js"></script>
        <link rel="stylesheet" type='text/css' href="/static/css/index.css"/>
        <script type = 'text/javascript' src="/static/js/jquery.snow.js"></script>
        <link rel="shortcut icon" type='text/css' href="/static/images/images/favicon.png">
        <script type = 'text/javascript' src="/static/js/index.js"></script>
    </head>
    <body>
        <h1 id="title">Life Book</h1>
        <div id="login">
            <form action="/index.php/lifebook/login" method="post">
                <input type="text" name="uid" id="uid" class="input" placeholder="아뒤 입력 ㄲㄱ~" required>
                <input type="password" name="pwd" id="pwd" class="input" placeholder="비번 입력 ㄲㄱ~" required>
                <input type="submit" value="로그인 할라믄 눌러요" id="submit">
            </form>
        </div>
    </body>
</html>