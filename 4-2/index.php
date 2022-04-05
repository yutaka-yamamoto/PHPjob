<link rel="stylesheet" href="style.css"> 

<div class="wrapper">
    <div class="container">   
        <img src="1599315827_logo.png" alt="">

        <div class="txt_box">
            <div class="box1">
                <div class="txt">
                    <?php
                        //作成されたgetData.phpを読み込む
                        require_once("getData.php");

                        // 実行したいSQL文を準備
                        $sql = "SELECT * FROM users";
                        // 関数db_connect()からPDOを取得する
                        $userdata = connect();
                        try {
                            $stmt = $userdata->prepare($sql);
                            $stmt->execute();
                    
                            // ループ文を使用して、1行ずつ読み込んで$rowに代入する
                            // 読み込むものがなくなったらループ終了
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo 'ようこそ '. $row['last_name'] . '' . $row['first_name'].'さん';
                    ?>
                </div>
            </div>
            <div class="box2">
                <div class="txt">    
                    <?php      
                            echo '最終ログイン日：'. $row['last_login'];
                            }
                        } catch (PDOException $e) {
                            echo 'Error: ' . $e->getMessage();
                            die();
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <table class="container2">

        <?php
            $sql2 = "SELECT * FROM posts ORDER BY id DESC";
            // 関数db_connect()からPDOを取得する
            $userdata = connect();
                
                echo "\t<tr>
                    <th>記事ID</th>
                    <th>タイトル</th>
                    <th>カテゴリ</th>
                    <th>本文</th>
                    <th>投稿日</th>
                    </tr>\n";
                    
                        try {
                            $data = new getData();
                            $posts = $data->getPostData();
                            //$stmt = $userdata->prepare($sql2);
                            $stmt->execute();
           
                        
                            foreach($posts as $post){
                            
                                echo "<tr>";
                                echo "<td>{$post['id']}</td>";
                                echo "<td>{$post['title']}</td>";
                                
                                if($post["category_no"] === 1) {
                                    echo "<td>旅行</td>";
                                } elseif($post["category_no"] === 2) {
                                    echo "<td>食事</td>";
                                } else {
                                    echo "<td>その他</td>";
                                }
                                
                                echo "<td>{$post['comment']}</td>";
                                echo "<td>{$post['created']}</td>";
                                echo "</tr>";
                            }
                
                        }   
                        
                        catch (PDOException $e) {
                            echo 'Error: ' . $e->getMessage();
                            die();
                        }

        ?>
    </table>

    <footer>Y&I group.inc</footer>
</div>
