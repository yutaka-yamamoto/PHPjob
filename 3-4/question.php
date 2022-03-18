<link rel="stylesheet" href="css/style.css">

<div class="wrapper">
    <?php
    //POST送信で送られてきた名前を受け取って変数を作成
    $my_name = $_POST['my_name'];       

    //①画像を参考に問題文の選択肢の配列を作成してください。

    //② ①で作成した、配列から正解の選択肢の変数を作成してください
    ?>
    <p>お疲れ様です<?php echo $my_name; ?>さん</p>

    <!--フォームの作成 通信はPOST通信で-->
    <form action="answer.php" method="post">

        <!--③ 問題のradioボタンを「foreach」を使って作成する-->

        <h2>①ネットワークのポート番号は何番？</h2>
        <?php
        $port_number = ["80","22","20","21"];
        $answer1 = $port_number[0];
        foreach ($port_number as $value){ ?>
        <input type="radio" name="number" value="<?php echo $value; ?>"/>
        <?php echo  $value;
        }
        ?>
        
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        
        <h2>②Webページを作成するための言語は？</h2>
        <?php
        $Web_language = ["PHP","Python","JAVA","HTML"];
        $answer2 = $Web_language[3];
        foreach ($Web_language as $value){ ?>
        <input type="radio" name="language" value="<?php echo $value; ?>"/>
        <?php echo  $value;
        }
        ?>
        
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        
        <h2>③MySQLで情報を取得するためのコマンドは？</h2>
        <?php
        $SQL_command = ["join","select","insert","update"];
        $answer3 = $SQL_command[1];
        foreach ($SQL_command as $value){ ?>
        <input type="radio" name="command" value="<?php echo $value; ?>"/>
        <?php echo  $value;
        }
        ?>
        
        <br>
        
        <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
        <input type="hidden" name="my_name" value= <?php  echo $my_name; ?>>
        <input type="hidden" name="answer1" value= <?php echo $answer1; ?>>
        <input type="hidden" name="answer2" value= <?php echo $answer2; ?>>
        <input type="hidden" name="answer3" value= <?php echo $answer3; ?>>
        <input class="button" type="submit" value="回答する">
 
    </form>
</div>
