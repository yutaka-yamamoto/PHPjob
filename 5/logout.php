<?php
// セッション開始
session_start();
// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>
<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>ログアウト</title>
    </head>
    <body>
        <div class="logout_box">
            <p>ログアウトしました</p>
            <a href="login.php">ログイン画面に戻る</a>
        </div>
    </body>
</html>