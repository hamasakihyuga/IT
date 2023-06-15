<?php
session_start();

if($_SESSION['count'] != 1 ){
    header('Location: error.php');
    exit;
}else{
    $_SESSION['count'] ++;
}


$_SESSION['inputData']=array($_POST['name'],$_POST['kana'],$_POST['tel'],$_POST['email'],$_POST['body'],);

$err_cnt = 0;
$clean =array();

if(!empty($_POST)){
    foreach($_POST as $key => $value){
        $clean[$key] = htmlspecialchars($value , ENT_QUOTES);
    }
}

    if(empty($_POST['name'])){
        $_SESSION['flash']['name'] = "氏名は必須入力です。10文字以内でご入力ください。";
        $err_cnt += 1;
    }else if(10 < mb_strlen($_POST['name'])){
        $_SESSION['flash']['name'] = "氏名は必須入力です。10文字以内でご入力ください。";
        $err_cnt += 1;
    }else{
    $_SESSION['original']['name'] = $_POST['name'];
    }

    if(empty($_POST['kana'])){
        $_SESSION['flash']['kana'] = "フリガナは必須入力です。10文字以内でご入力ください。";
        $err_cnt += 1;
    }else if( 10 < mb_strlen($_POST['kana'])){
        $_SESSION['flash']['kana'] = "フリガナは必須入力です。10文字以内でご入力ください。";
        $err_cnt += 1;
    }else{
    $_SESSION['original']['kana'] = $_POST['kana'];
    }

    if(!empty($_POST['tel'])){
        if(!preg_match("/^[0-9]+$/",$_POST['tel'])){
        $_SESSION['flash']['tel'] = "電話番号は0-9の数字のみでご入力ください。";
        $err_cnt += 1;
        }else{
        $_SESSION['original']['tel'] = $_POST['tel'];
        }
    }

    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $_SESSION['original']['email'] = $_POST['email'];
    }else{
        $_SESSION['flash']['email'] = "メールアドレスは正しくご入力ください。";
        $err_cnt += 1;
    }

    if(mb_strlen($_POST['body']) === 0){
        $_SESSION['flash']['body'] = "お問い合わせ内容は必須入力です。";
        $err_cnt + 1;
    }else{
        $_SESSION['original']['body'] = $_POST['body'];
    }


    if($err_cnt >= 1 ){
        header('Location: contact.php');
    }

    if(empty($_POST['name']) ||
        empty($_POST['kana']) ||
        empty($_POST['email']) ||
        empty($_POST['body'])){
        header('Location: contact.php');
    }

    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sp.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <?php include 'header.php';?>

    <open-modal v-show="showContent" v-on="click:closeModal"></open-modal>

    <section>
        <div class ="contact_box">
            <h2>お問い合わせ</h2>
            <form action="complete.php" method="post">
                <p>下記の内容をご確認の上送信ボタンを押してください</p>
                <p>内容を訂正する場合は戻るを押してください。</p>

                <dl class="confirm">
                    <dt>氏名</dt>
                        <dd><?php echo $clean['name']?></dd>
                    <dt>カナ</dt>
                        <dd><?php echo $clean['kana']?></dd>
                    <dt>電話番号</dt>
                        <dd><?php echo $clean['tel']?></dd>
                    <dt>メールアドレス</dt>
                        <dd><?php echo $clean['email']?></dd>
                    <dt>お問い合わせ内容</dt>
                        <dd><?php echo nl2br($clean['body'])?></dd>
                    <dd class="confirm_btn">
                        <button type="submit">送 信</button>
                        <a href="contact.php">戻る</a>
                    </dd>
                </dl>
    </section>
<footer>
    <?php include 'footer.php';?>
</footer>
</body>

</html>
