<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sp.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>

<?php include 'header.php';?>

<open-modal v-show="showContent" v-on="click:closeModal"></open-modal>

<body>
<section>
    <div class="contact_box">
        <h2>不正なアクセスです。</h2>
        <div class="back"><a href="contact.php">お問い合わせに戻る</a></div>
    </div>
</section>

<footer>
<?php include 'footer.php';?>
</footer>
</body>
</html>
