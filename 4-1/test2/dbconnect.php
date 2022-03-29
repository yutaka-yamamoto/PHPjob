<?php
// セッション開始
//session_start();
// DBサーバのURL
    define('DB_DATABASE', 'yigroupBlog');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);
    
    try {
        $dbh = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
        die();
    }
    
$db['host'] = "localhost";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "";
// データベース名
$db['dbname'] = "yigroupBlog";
?>