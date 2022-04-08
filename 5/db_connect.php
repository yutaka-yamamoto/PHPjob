<?php
// セッション開始
//session_start();
// DBサーバのURL
    define('DB_DATABASE', 'checktest5');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);
    
    $db['host'] = "localhost";
    // ユーザー名
    $db['user'] = "root";
    // ユーザー名のパスワード
    $db['pass'] = "root";
    // データベース名
    $db['dbname'] = "checktest5";

    function db_connect() {
    try {
        $dbh = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
        die();
    }
}
?>