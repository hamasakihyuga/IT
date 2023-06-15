<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sp.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body id = "app">
<header class = "contact">
    <nav class="motion">
        <div class = "logo"><a href="index.php">
            <img src="./cafe/img/logo.png" alt="cafe">
        </a></div>
        <div class = "g_nav">
            <div class = "menu _click"><a href="index.php#cafe_intro">はじめに</a></div>
            <div class = "menu _click"><a href="index.php#cafe_exp">体験</a></div>
            <div class = "menu"><a href="contact.php">お問い合わせ</a></div>
        </div>
    <div class = "sign">
        <div class = "signin _click" v-on="click:openModal">サインイン</div>
            <div class = "sp _click" v-on="click: spMenu=!spMenu"><img src="./cafe/img/menu.png" alt="スマホメニュー"></div>
            <div class="sp_nav" v-class="sp_nav_motion:position > 50" v-if="spMenu">
                <div class="sp_signin _click" v-on="click:openModal">サインイン</div>
                <div class="sp_menu _click" v-on="click:toIntro" v-transition>はじめに</div>
                <div class="sp_menu _click" v-on="click:toExp" v-transition>体験</div>
                <div class="sp_menu"><a href="contact.php">お問い合わせ</a></div>
            </div>
    </div>
    </nav>
</header>
