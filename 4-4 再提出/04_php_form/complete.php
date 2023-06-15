<?php
session_start();
if($_SESSION['count'] !=2 ){
    header('Location: error.php');
    exit;
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sp.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete</title>
</head>
<body>
    <?php include 'header.php';?>

    <open-modal v-show="showContent" v-on="click:closeModal"></open-modal>

<section>
    <div class="contact_box">
    <h2>お問い合わせ</h2>

    <div class="complete_msg">
        <p>お問い合わせ頂きありがとうございます。</p>
        <p>送信いただいた件につきましては、当社より折り返しご連絡を差し上げます。</p>
        <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
        <a href="index.php">トップへ戻る</a>
        </div>
    </div>
</section>
<footer>
    <?php include 'footer.php';?>
</footer>
    
</body>
</html>
