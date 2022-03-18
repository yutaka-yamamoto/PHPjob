<link rel="stylesheet" href="css/style.css">

<div class="wrapper">
    <?php 
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
    $my_name = $_POST['my_name']; 
    $port_number = $_POST['number'];
    $Web_language = $_POST['language'];
    $SQL_command = $_POST['command'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    ?>
    
    <!--//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する-->
    
    <p><?php echo $my_name; ?>さんの結果は・・・？</p>
    <!--作成した関数を呼び出して結果を表示-->
    <p>①の答え
        <br>
        <?php 
        if($port_number == $answer1) {
        echo "正解！";
        } else {
        echo "残念・・・";}
        ?>
    </p>

    <!--作成した関数を呼び出して結果を表示-->
    <p>②の答え
        <br>
        <?php 
        if($Web_language == $answer2) {
        echo "正解！";
        } else {
        echo "残念・・・";}
        ?>
    </p>

    <!--作成した関数を呼び出して結果を表示-->
    <p>③の答え
        <br>
        <?php 
        if($SQL_command == $answer3) {
        echo "正解！";
        } else {
        echo "残念・・・";}
        ?>
    </p>
</div>