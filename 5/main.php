<?php
// function.phpの読み込み
require_once("function.php");
require_once("db_connect.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// 実行したいSQL文を準備
$sql2 = "SELECT * FROM books ORDER BY id";
try {
    $dbh2 = db_connect();
    $stmt = $dbh2->prepare($sql2);
    $stmt->execute();

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}


?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>メイン</title>
</head>
<body>
<div class ="main">
        <h2 class="zaiko_ttl">在庫一覧画面</h2>
        <a class="btn3" href="create_books.php">新規登録</a>
        <a class="btn4" href="logout.php">ログアウト</a>
    
    <table class="data">
        <tr>
            
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
            
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><a class="delete" href="delete_books.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</div>    
</body>
</html>