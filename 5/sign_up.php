<?php 
require_once("db_connect.php");
session_start();

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// ボタンが押された場合
if (isset($_POST["signUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST)) {  // 値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["name"])) {
        $errorMessage = '名前が未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    if(!empty($_POST['name']) && !empty($_POST["password"])) {
        //！emptyで未入力ではないときに格納
        $username = $_POST["name"];
         $password = $_POST["password"];

         // 2. ユーザIDとパスワードが入力されていたら認証する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
        
      try {
            //PDOのインスタンス化
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            //名前とパスワードをインサート
            $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");
            // パスワードのハッシュ化
            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));  
            // 最後に登録したidが振り分けられる
            $userid = $pdo->lastinsertid();
            // ログイン時に使用するIDとパスワードの登録完了のお知らせ  
            $signUpMessage = '登録が完了しました!';  
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            echo $e->getMessage();
        }
    }
    echo $signUpMessage;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class ="sign_up">
    <div class = "login">
        <h1>ユーザー登録画面</h1>
    </div>    
        <form method="POST" action="">
            <br>
            <input class="form_btn" type="text" name="name" placeholder="ユーザー名" id="name" style="width:450px;height:40px;">
            <br>
            <br>
            <input class="form_btn" type="password" name="password" placeholder="パスワード" id="password" style="width:450px;height:40px;">
            <br>
            <br>
            <input type="submit" value="新規登録" id="signUp" name="signUp" class="btn">
        </form>
    </div>
</body>
</html>