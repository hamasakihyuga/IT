<?php
session_start();


$_SESSION['count'] = 1;

if(isset($_SESSION['inputData'])){
    $name = $_SESSION['inputData'][0];
    $kana = $_SESSION['inputData'][1];
    $tel = $_SESSION['inputData'][2];
    $email = $_SESSION['inputData'][3];
    $body = $_SESSION['inputData'][4];
}

$flash = isset($_SESSION['flash'])? $_SESSION['flash'] : [];
unset($_SESSION['flash']);
$original = isset($_SESSION['original'])? $_SESSION['original'] : [];
unset($_SESSION['original']);

?>

    <?php include 'header.php';?>

    <open-modal v-show="showContent" v-on="click:closeModal"></open-modal>

<section>
    <?php if( !empty($error) ): ?>
    <ul class="error_list">
    <?php foreach( $error as $value ): ?>
    <li><?php echo $value; ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <div class ="contact_box">
        <h2>お問い合わせ</h2>
        <form action="confirm.php" method="post" class ="validationForm">
            <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
            <p>送信いただいた件につきましては、当社より折り返しご連絡を差し上げます。</p>
            <p>なお、ご連絡までに、お時間をいただく場合もございますので予めご了承ください。</p>
            <p>
                <span class="required">*</span>
                は必須項目となります。
            </p>
            <dl>
                <dt>
                    <label for="name">氏名</label>
                    <span class="required">*</span>
                    <div class = errormsg><?php echo isset($flash['name']) ? $flash['name'] : null ?></div>
                </dt>
                    <dd>
                        <input class ="maxlength"type="text" name="name" id ="name" placeholder="山田太郎" maxlength = "10" value="<?php echo isset($_SESSION['inputData'][0]) ? $name : null;?>" >
                        
                    </dd>
                <dt>
                    <label for="kana">フリガナ</label>
                    <span class="required">*</span>
                    <div class = errormsg><?php echo isset($flash['kana']) ? $flash['kana'] : null ?></div>
                </dt>
                    <dd>
                        <input class ="maxlength"type="text" name="kana" id ="kana" placeholder="ヤマダタロウ" maxlength = "10" value="<?php echo isset($_SESSION['inputData'][1]) ? $kana : null;?>">
                        
                    </dd>
                <dt>
                    <label for="tel">電話番号</label>
                    <div class = errormsg><?php echo isset($flash['tel']) ? $flash['tel'] : null ?></div>
                </dt>
                    <dd>
                    <input class ="tel" type="text" name="tel" id ="tel" placeholder="09012345678"value="<?php echo isset($_SESSION['inputData'][2]) ? $tel : null;?>">
                        
                    </dd>
                <dt>
                    <label for="e-mail">メールアドレス</label>
                    <span class="required">*</span>
                    <div class = errormsg><?php echo isset($flash['email']) ? $flash['email'] : null ?></div>
                </dt>
                    <dd>
                    <input class="email" maxlength = "100" type="text" name="email" id ="email" placeholder="test@test.co.jp"value="<?php echo isset($_SESSION['inputData'][3]) ? $email : null;?>">
                        
                    </dd>
            </dl>
        <h3>
            <label for="body">お問い合わせ内容をご記入ください
                <span class="required">*</span>
            </label>
        </h3>
        <dl class="body">
            <dd>
            <div class = errormsg><?php echo isset($flash['body']) ? $flash['body'] : null ?></div>
                <textarea name="body" id="body"><?php echo isset($_SESSION['inputData'][4]) ? $body : null;?></textarea>
            </dd>
            <dd>
                <button type="submit" id="submit_btn">送 信</button>
            </dd>
        </dl>
        </form>
    </div>
</section>
<footer>
<?php include 'footer.php';?>
</footer>

<script>
        document.addEventListener("DOMContentLoaded",function(){
    window.onload = function(){
        const btnSubmit = document.getElementById('submit_btn');
        const inputName = document.getElementById('name');
        const inputKana = document.getElementById('kana');
        const inputTel = document.getElementById('tel');
        const inputMail = document.getElementById('email');
        const inputBody = document.getElementById('body');
        const reg = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
        // /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
        const regNum = /^[0-9]+$/;

btnSubmit.addEventListener('click', function(event){
    let message = [];

    if(inputName.value == ""){
        message.push("氏名は必須入力です。10文字以内でご入力ください。\n");
    }

    if(inputKana.value == ""){
        message.push("フリガナは必須入力です。10文字以内でご入力ください。\n");
    }
    if(inputTel.value !== ""){
        if(!regNum.test(inputTel.value)){
        message.push("電話番号は0-9の数字のみでご入力ください。\n");
        }
    }
    
    if(inputMail.value == ""){
        message.push("メールアドレスは正しくご入力ください。\n");
    }else if(!reg.test(inputMail.value)){
        message.push("メールアドレスの形式が不正です。\n");
    }

    if(inputBody.value ==""){
        message.push("お問い合わせ内容は必須入力です。\n");
    }

    if(message.length > 0){
            alert(message.join(''));
    }
});
};},false);
</script>
