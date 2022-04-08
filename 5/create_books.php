<?php
// db_connect.phpの読み込み
// function.phpの読み込み
require_once("function.php");
require_once("db_connect.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();


// 提出ボタンが押された場合
if (!empty($_POST["post"])) {
    // titleとdateの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo 'コンテンツが未入力です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"])) {
        // 入力したtitleとdateを格納
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
        $stock = ($_POST['stock']);

        $sql2 = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";;
        $dbh2 = db_connect();

        try {
            // SQL文の準備
            $stmt = $dbh2->prepare($sql2);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();

            // main.phpにリダイレクト
            header("Location: main.php");
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }
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
        <h1>本 登録画面</h1>
    </div>    
        <form method="POST" action="">
            <br>
            <input class="form_btn" type="text" name="title" id="title" placeholder="タイトル" style="width:450px;height:40px;">
            <br>
            <br>
            <input class="form_btn" type="text" name="date" id="date" placeholder="発売日" style="width:450px;height:40px;">
            <br>
            <h2>在庫数</h2>
            <select class='form_btn' name="stock" style="width:250px;height:30px;">
                <option hidden>選択してください</option>
                <?php for ($i=1;$i<=100;$i++){ ?>
                <option value="<?php echo $i; ?>">
                <?php echo $i; ?>
                </option>
                <?php } ?>
            </select>
            <br>
            <br>
            <input type="submit" value="登録" id="post" name="post" class="btn" >
        </form>
    </div>  
</body>
</html>