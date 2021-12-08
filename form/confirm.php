<?php
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: contact.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 'ryoko803@icloud.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
電話番号： {$post['tel']}
内容：
{$post['contact']}
EOT;
    // var_dump($body);
    // exit();
    //mb_send_mail($to, $subject, $body, "From: {$from}");

    // セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: thanks.html');
    exit();
}
?>

<!DOCTYPE html>
<html  lang="ja">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2-160x136.png" type="image/x-icon">
  <meta name="description" content="">

  <title>contact</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>
  <section class="extMenu11 menu cid-sPFSaL3757" once="menu" id="extMenu11-8q">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.html">
                        <img src="assets/images/logo2-160x136.png" alt="菜々海" style="height: 6rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-5" href="index.html">一般社団法人菜々海</a></span>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
              <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.html">ホーム</a></li>
              <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="plan.html">プラン内容</a></li>
              <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="service.html">サービス内容</a></li>
              <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="news.html">お知らせ</a></li></ul>
              <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-warning display-4" href="contact.php>">問い合わせる</a></div>
            </div>
          </nav>
        </section>
        <section class="content5 cid-sPFS2QoTlQ" id="content5-8p">
          <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
              <p class="mbr-text mbr-fonts-style display-2"><strong>お問い合わせフォーム</strong></p>
            </div>
        </div>
    </div>
</section>

<section class="form1 directm4_form1 cid-sDvvMLREBx" id="form1-4p">
	<div class="container">

		<div class="row justify-content-center mt-5">

			<div class="col-lg-9 mbr-form form" data-form-type="formoid">
        <?php if( $mode == 'input' ){ ?>
            <!-- 入力画面 -->
            <form action="./contact.php" method="post"　novalidate>
              <div class="row justify-content-center">
            <div class="col-md-8">
              <p class="mbr-text mbr-fonts-style align-center mb-4 display-7">
                お客さまからのお問い合わせをお問い合わせフォームにて受け付けております。<br>
                ご確認の上、「送信する」を押してください。&nbsp;&nbsp;
              </p>

              <div class="dragArea form-row">
                <label for="inputName">お名前</label>
                <div class="col-lg-12 form-group" data-for="name">
                  <input type="text" name="name"  data-form-field="name" class="form-control display-4"
                  value="" id="name-form1-4p">
                    <?php echo $_POST['name'] ?><br>
                </div>

                <label for="inputName">Eメール</label>
                <div class="col-lg-12 form-group" data-for="email">
                  <input type="email" name="email" data-form-field="email" class="form-control display-4"
                   value="" id="email-form1-4p">
                     <?php echo $_POST['name'] ?><br>
                </div>

                <label for="inputName">電話番号</label>
                <div data-for="tel" class="col-lg-12 form-group">
                  <input type="tel" name="tel"  data-form-field="phone" class="form-control display-4"
                   value="" id="phone-form1-4p">
                     <?php echo $_POST['name'] ?><br>
                </div>


                <label for="inputName">お問い合わせ</label>
                <div class="col-12 form-group" data-for="textarea">
                  <textarea name="textarea"  data-form-field="textarea"
                  class="form-control display-4" id="textarea-form1-4p"></textarea>
                </div>

                <div class="col-auto mbr-section-btn align-center">
                  <input type="submit" class="btn btn-md btn-warning display-4"　name="confirm" value="確認"/>
                </div>
              </div>
            </div>
          </div>
        </form>
        <?php } else if( $mode == 'confirm' ){ ?>

            <!-- 確認画面 -->
          <form action="./contact.php" method="post">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <p class="mbr-text mbr-fonts-style align-center mb-4 display-7">お客さまからのお問い合わせをお問い合わせフォームにて受け付けております。<br>必要事項をご記入の上、「送信する」を押してください。&nbsp;&nbsp;</p>
                <div class="dragArea form-row">


                  <label for="inputName">お名前</label>
                  <div class="col-lg-12 form-group" data-for="name">
                    <?php echo $_POST['name'] ?><br>
                  </div>

                  <label for="inputName">Eメール</label>
                  <div class="col-lg-12 form-group" data-for="email">
                  <?php echo $_POST['email'] ?>
                  </div>

                  <label for="inputName">電話番号</label>
                  <div data-for="tel" class="col-lg-12 form-group">
                    <?php echo $_POST['tel'] ?>
                  </div>

                  <label for="inputName">お問い合わせ</label>
                  <div class="col-12 form-group" data-for="textarea">
                    <?php echo nl2br($_POST['textarea']) ?>
                  </div>

                  <div class="col-auto mbr-section-btn align-center">
                    <input type="submit" class="btn btn-md btn-warning display-4" name="back"　value="戻る"/>
                    <input type="submit" class="btn btn-md btn-warning display-4" name="send"　value="送信"/>
                  </div>
                </div>
              </div>
            </div>
          </form>

        <?php } else { ?>
          <!-- 完了画面 -->
        <?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="footer1 cid-sPJsGr91Hk" once="footers" id="footer01-98">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                <li class="foot-menu-item mbr-fonts-style display-7"><a href="index.html" class="text-white">ホーム</a></li>
                <li class="foot-menu-item mbr-fonts-style display-7"><a href="plan.html" class="text-white">プラン内容</a></li>
                <li class="foot-menu-item mbr-fonts-style display-7"><a href="service.html" class="text-white">サービス内容</a></li>
                <li class="foot-menu-item mbr-fonts-style display-7"><a href="news.html" class="text-white text-primary">お知らせ</a></li>
                <li class="foot-menu-item mbr-fonts-style display-7">
                  <a href="contact.php" class="text-white text-primary">お問い合わせ</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a href="mimoto.html" class="text-white text-primary">身元保証サービスとは</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a href="kojinjoho.html" class="text-white text-primary">プライバシーポリシー</a></li></ul>
            </div>

            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-4">
                    © Copyright 2021 菜々海 -<a href="index.html" class="text-primary"> All Rights Rese</a>rved
                </p>
            </div>
        </div>
    </div>
</section>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/formstyler/jquery.formstyler.js"></script>
  <script src="assets/formstyler/jquery.formstyler.min.js"></script>
  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>



 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">

</body>
</html>
