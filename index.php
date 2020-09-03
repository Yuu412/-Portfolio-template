<?php
//=========文字エンコードの検証==============================
require_once("util.php");

if(!cken($_POST)){
  $encoding = mb_check_encoding();
  $err = "Encoding Error! The expected encoding is". $encoding;
  //エラーメッセージを表示して処理を終了させる
  exit($err);
}
//HTMLエスケープ(XSS対策)
$_POST = es($_POST);
 ?>



<?php

 if(isset($_POST['contact'])){
   $content = $_POST['content'];
 }
 else{
   //エラー
   $content="";
 }

 if(isset($_POST['contact'])){

   //入力された値の設定
   $name = $_POST['name'];
   $mail = $_POST['mail'];
   $title = $_POST['title'];
   $content = $_POST['content'];

   $arr =[$name,$mail,$title,$content];
   foreach ($arr as $item) {
    if (preg_match('/^\s*$/u', $item)){
      $error = 1;
      break;
    }
    else{
      $error="";
    }
  }

  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $hostMail = "yuu.yoshi12@outlook.jp";
  $subject = "$name";
  $message = "$title\n
              $content\n";
  $headers = "From: $mail";

  if(mb_send_mail($hostMail, $subject, $message, $headers)){
    echo "メールを送信しました";
  }
  else{
    echo "メールの送信に失敗しました。";
  }
}
else{

   //入力された値の設定
   if(isset($_POST['name'])){
     $name = $_POST['name'];
   }
   else{
     //エラー
     $name= "";
   }

   if(isset($_POST['mail'])){
     $mail = $_POST['mail'];
   }
   else{
     //エラー
     $mail= "";
   }

   if(isset($_POST['title'])){
     $title = $_POST['title'];
   }
   else{
     //エラー
     $title="";
   }

   if(isset($_POST['content'])){
     $content = $_POST['content'];
   }
   else{
     //エラー
     $content="";
   }
   if(isset($_POST['error'])){
     $content = $_POST['error'];
   }
   else{
     //エラー
     $error="";
   }

}
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href="portfolio.css">
  <link rel="stylesheet" type="text/css" href="contact-form.css">
  <link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
  <title>Yuu portfolio</title>
  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--site-top背景部-->

</head>

<body>
  <!-- ヘッダー部分------------------------------------------------->
  <!--------------------------------------------------------------->
  <header class="site-header flex flex--bet">
    <div class="site-logo">
      <img src="img/Yuu's Portfolio.png" alt="logo">
    </div>
    <div class="botton-header">
      <nav>
        <ul>
          <li class=”current”><a href=#>Home</a></li>
          <li><a href=#profile-link>Profile</a></li>
          <li><a href=#service-link>Service</a></li>
          <li><a href=#product-link>Product</a></li>
          <li><a href=#contact-link>Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- サイトトップ部分--------------------------------------------->
  <!--------------------------------------------------------------->
  <div id="site-top">

    <div class="title-top">
      Shape<br>an<br>Idea
    </div>
    <div class="subtitle">
      STUDENT ENGINEER<br>
      YUU'S PORTFOLIO </div>
  </div>
  <div class="dot-top"></div>

  <!-- プロフィール部分------------------------------------------------->
  <div id="profile-link"></div>
  <!--------------------------------------------------------------->
  <div class="fadein">
    <div id="profile">
      <h3 id="test"></h3>
      <div class="profile-block">
        <div class="V-space2"></div>
        <div class="title-profile">About me</div>
        <div class="img-profile">
          <img src="img/profile.jpg" alt="profile picture">
        </div>
        <div class="profile-box">
          <div class="name">吉田 裕哉 (Yuya Yoshida)</div>
          <div class="text-profile">
            地方国立大学工学部情報系学科に所属する3年生。<br>
            独学でプログラミングを勉強し、HTML, CSS, jQuery, PHP, C, Pythonを使用可能。<br>
            現在はDAppsに興味を持ち、Solidityやアプリ開発の学習を進めている。
            LP制作／レスポンシブ対応サイト制作／Webシステム開発／SEO対策／アプリ開発まで幅広く対応。<br>
            お客様のニーズに応える丁寧で迅速な仕事をすることを心掛けています。
          </div>
          <div class="plus-profile">
            <img src="img/eng.png" alt="profile picture">
            <div class="text-plus">TOEIC:680点 <br>IELTS:5.0</div>
          </div>
          <div class="plus-profile">
            <img src="img/bsk.png" alt="profile picture">
            <div class="text-plus">バスケットボール歴：6年<br>(少年国体メンバーに選出された経験あり)</div>
            <div class="plus-profile">
              <img src="img/sub.png" alt="profile picture">
              <div class="text-plus">「地方創生×IT」をテーマとして<br>年内に起業予定。</div>
            </div>
            <div class="sns-botton">
              <a href="https://www.facebook.com/profile.php?id=100025129152835"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="#36b2c9">
                  <path
                    d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z" />
                </svg></a></div>
            <div class="sns-botton">
              <a href="https://twitter.com/yuu_yoshi12">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="#36b2c9">
                  <path
                    d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm3.193 7c-1.586 0-2.872 1.243-2.872 2.777 0 .217.025.43.074.633a8.251 8.251 0 0 1-5.92-2.902c-.247.41-.389.887-.389 1.397 0 .963.507 1.813 1.278 2.311a2.94 2.94 0 0 1-1.301-.348v.036c0 1.345.99 2.467 2.304 2.723a2.98 2.98 0 0 1-1.298.047c.366 1.103 1.427 1.906 2.683 1.928a5.889 5.889 0 0 1-3.567 1.19c-.231 0-.46-.014-.685-.04A8.332 8.332 0 0 0 9.903 18c5.283 0 8.172-4.231 8.172-7.901 0-.12-.002-.24-.008-.36A5.714 5.714 0 0 0 19.5 8.302a5.869 5.869 0 0 1-1.65.437 2.8 2.8 0 0 0 1.263-1.536 5.87 5.87 0 0 1-1.824.674A2.915 2.915 0 0 0 15.193 7z" />
                </svg></a></div>
            <div class="sns-botton">
              <a href="https://rural-blog.com/">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" style="width: 50; height: 50; opacity: 1;"
                  xml:space="preserve">
                  <style type="text/css">
                    .st0 {
                      fill: #36b2c9;
                    }
                  </style>
                  <g>
                    <path class="st0"
                      d="M421.073,221.719c-0.578,11.719-9.469,26.188-23.797,40.094v183.25c-0.016,4.719-1.875,8.719-5.016,11.844   c-3.156,3.063-7.25,4.875-12.063,4.906H81.558c-4.781-0.031-8.891-1.844-12.047-4.906c-3.141-3.125-4.984-7.125-5-11.844V152.219   c0.016-4.703,1.859-8.719,5-11.844c3.156-3.063,7.266-4.875,12.047-4.906h158.609c12.828-16.844,27.781-34.094,44.719-49.906   c0.078-0.094,0.141-0.188,0.219-0.281H81.558c-18.75-0.016-35.984,7.531-48.25,19.594c-12.328,12.063-20.016,28.938-20,47.344   v292.844c-0.016,18.406,7.672,35.313,20,47.344C45.573,504.469,62.808,512,81.558,512h298.641c18.781,0,36.016-7.531,48.281-19.594   c12.297-12.031,20-28.938,19.984-47.344V203.469c0,0-0.125-0.156-0.328-0.313C440.37,209.813,431.323,216.156,421.073,221.719z"
                      style="fill: #36b2c9;" />
                    <path class="st0"
                      d="M498.058,0c0,0-15.688,23.438-118.156,58.109C275.417,93.469,211.104,237.313,211.104,237.313   c-15.484,29.469-76.688,151.906-76.688,151.906c-16.859,31.625,14.031,50.313,32.156,17.656   c34.734-62.688,57.156-119.969,109.969-121.594c77.047-2.375,129.734-69.656,113.156-66.531c-21.813,9.5-69.906,0.719-41.578-3.656   c68-5.453,109.906-56.563,96.25-60.031c-24.109,9.281-46.594,0.469-51-2.188C513.386,138.281,498.058,0,498.058,0z"
                      style="fill: #36b2c9;" />
                  </g>
                </svg></a></div>
          </div>
        </div>
      </div>
      <div class="dot-profile"></div>
    </div>

    <!-- 受けられる仕事部分------------------------------------------------->
    <div id="service-link"></div>
    <!-------------------------------------------------------------------->
    <div class="fadein">
      <div id="service">
        <div class="V-space3"></div>
        <div class="title-service">Service</div>
        <div class="dot-service"></div>
        <div class="work-box">

          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" style="width: 80px; height: 80px; opacity: 1;" xml:space="preserve">
            <style type="text/css">
              .st0 {
                fill: #4B4B4B;
              }
            </style>
            <g>
              <path class="st0"
                d="M464,0H48C21.492,0,0,21.492,0,48v416c0,26.508,21.492,48,48,48h416c26.508,0,48-21.492,48-48V48   C512,21.492,490.508,0,464,0z M444.664,35c10.492,0,19,8.508,19,19s-8.508,19-19,19c-10.492,0-19-8.508-19-19   S434.172,35,444.664,35z M374.164,35c10.492,0,19,8.508,19,19s-8.508,19-19,19c-10.492,0-19-8.508-19-19S363.672,35,374.164,35z    M303.664,35c10.492,0,19,8.508,19,19s-8.508,19-19,19c-10.492,0-19-8.508-19-19S293.172,35,303.664,35z M472,464   c0,4.406-3.586,8-8,8H48c-4.414,0-8-3.594-8-8V104h432V464z"
                style="fill: rgb(75, 75, 75);" />
              <rect x="96" y="192" class="st0" width="152" height="32" style="fill: rgb(75, 75, 75);" />
              <rect x="96" y="352" class="st0" width="328" height="32" style="fill: rgb(75, 75, 75);" />
              <rect x="304" y="192" class="st0" width="120" height="120" style="fill: rgb(75, 75, 75);" />
              <polygon class="st0" points="229.042,304 248,304 248,272 96,272 96,304 213.042,304  " style="fill: rgb(75, 75, 75);" />
            </g>
          </svg>
          <div class="subtitle-service">LP作成</div>
          <div class="text-service">お客様のご要望をヒヤリングした上でレスポンシブ対応のLP（ランディングページ）を制作いたします。レスポンシブ対応。簡易お問い合わせフォーム設置。1ページのLP作成をメインとしております。</div>
        </div>
        <div class="work-box">

          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" style="width: 80px; height: 80px; opacity: 1;" xml:space="preserve">
            <style type="text/css">
              .st0 {
                fill: #4B4B4B;
              }
            </style>
            <g>
              <path class="st0"
                d="M459.673,304.736l-26.129-15.54c-1.683-0.853-2.764-2.56-2.706-4.462l-0.049-25.512   c0.016-1.869,1.072-3.617,2.755-4.446l25.885-15.458c3.918-1.992,5.665-6.656,3.958-10.744l-7.688-18.612   c-1.683-4.056-6.234-6.168-10.42-4.794l-29.25,7.355c-1.772,0.585-3.764,0.122-5.064-1.204l-18.002-18.042   c-1.349-1.301-1.804-3.276-1.244-5.08l7.477-29.478c1.349-4.194-0.732-8.737-4.796-10.403l-18.62-7.729   c-4.063-1.666-8.778,0.032-10.76,3.958l-15.556,26.146c-0.861,1.675-2.576,2.731-4.454,2.747l-25.496-0.025   c-1.886,0.017-3.592-1.04-4.478-2.714l-15.45-25.886c-1.975-3.942-6.665-5.657-10.745-3.974l-18.603,7.705   c-4.08,1.699-6.177,6.242-4.796,10.427l7.364,29.226c0.585,1.772,0.114,3.788-1.252,5.096l-17.978,18.002   c-1.365,1.358-3.332,1.828-5.112,1.235l-29.462-7.469c-4.218-1.366-8.761,0.707-10.419,4.787l-7.721,18.627   c-1.683,4.064,0.048,8.762,3.942,10.728l26.17,15.564c1.666,0.854,2.73,2.576,2.723,4.462l0.008,25.503   c-0.008,1.854-1.064,3.609-2.714,4.446l-25.886,15.475c-3.926,1.975-5.673,6.664-3.982,10.736l7.713,18.628   c1.69,4.071,6.225,6.128,10.443,4.811l29.178-7.404c1.812-0.552,3.755-0.114,5.104,1.244l18.035,17.994   c1.3,1.373,1.788,3.324,1.211,5.087l-7.485,29.502c-1.349,4.186,0.739,8.737,4.811,10.403l18.62,7.721   c4.064,1.682,8.745-0.041,10.744-3.966l15.564-26.129c0.846-1.691,2.576-2.731,4.478-2.739l25.472-0.016   c1.885-0.008,3.616,1.048,4.445,2.73l15.451,25.886c2.016,3.918,6.713,5.673,10.752,3.966l18.62-7.68   c4.105-1.698,6.177-6.25,4.82-10.427l-7.355-29.243c-0.609-1.804-0.146-3.747,1.202-5.096l17.994-18.002   c1.366-1.341,3.308-1.804,5.121-1.228l29.461,7.486c4.202,1.349,8.729-0.732,10.427-4.787l7.705-18.628   C465.338,311.409,463.598,306.76,459.673,304.736z M385.039,293.838c-5.851,14.076-16.823,25.097-30.908,30.9   c-14.109,5.835-29.625,5.819-43.718-0.017c-14.116-5.836-25.064-16.791-30.908-30.892c-5.836-14.061-5.868-29.633,0.016-43.701   c5.803-14.076,16.792-25.081,30.885-30.924c14.109-5.812,29.616-5.836,43.733,0c14.077,5.827,25.057,16.848,30.893,30.916   C390.883,264.205,390.874,279.768,385.039,293.838z"
                style="fill: rgb(75, 75, 75);" />
              <path class="st0"
                d="M319.264,432.352H73.923V62.833h245.341v59.899h26.3V36.784C345.565,16.564,329.001,0,308.861,0H84.408   c-20.23,0-36.704,16.564-36.704,36.784v438.423c0,20.23,16.474,36.793,36.704,36.793h224.453c20.14,0,36.704-16.563,36.704-36.793   v-58.411h-26.3V432.352z M196.59,477.378c-6.071,0-10.98-4.91-10.98-10.988c0-6.071,4.909-11.07,10.98-11.07   c6.08,0,11.07,4.998,11.07,11.07C207.66,472.468,202.67,477.378,196.59,477.378z"
                style="fill: rgb(75, 75, 75);" />
            </g>
          </svg>

          <div class="subtitle-service">レスポンシブ対応</div>
          <div class="text-service">お客様のご要望通りにHTML/CSS/jQuerを用いてレスポンシブ対応(スマートフォン・タブレット・PCのそれぞれに適した表示ができる)のWebサイト作成をいたします。</div>
        </div>
        <div class="work-box">

          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" style="width: 80px; height: 80px; opacity: 1;" xml:space="preserve">
            <style type="text/css">
              .st0 {
                fill: #4B4B4B;
              }
            </style>
            <g>
              <path class="st0"
                d="M455.925,324.816v-0.305c-43.168,34.714-115.123,56.648-200,56.648c-74.15,0-138.432-16.743-182.279-44.12   c-6.223-3.94-12.07-8.112-17.48-12.524v0.178c-0.076-0.062-0.162-0.119-0.24-0.182v92.043c0,52.626,89.717,95.445,200,95.445   s200-42.819,200-95.445v-56.488l0.15-35.363C456.026,324.742,455.974,324.777,455.925,324.816z"
                style="fill: rgb(75, 75, 75);" />
              <path class="st0"
                d="M255.925,340.831c110.283,0,200-42.82,200-95.444v-5.188V201.87v-16.675l0.15-10.437   c-0.049,0.039-0.102,0.074-0.15,0.113v-0.301c-43.168,34.714-115.123,56.648-200,56.648c-74.117,0-138.375-16.73-182.221-44.087   c-6.244-3.952-12.111-8.137-17.539-12.562v0.182c-0.076-0.062-0.162-0.119-0.24-0.182v27.3v38.329v5.188   C55.925,298.012,145.642,340.831,255.925,340.831z"
                style="fill: rgb(75, 75, 75);" />
              <path class="st0"
                d="M255.925,190.89c110.283,0,200-42.819,200-95.444c0-1.507-0.328-2.974-0.472-4.463   c-0.836-8.539-3.844-16.81-9.098-24.622C420.507,27.918,344.952,0,255.925,0C166.898,0,91.343,27.918,65.497,66.36   c-5.256,7.812-8.264,16.083-9.098,24.622c-0.147,1.488-0.475,2.956-0.475,4.463C55.925,148.07,145.642,190.89,255.925,190.89z"
                style="fill: rgb(75, 75, 75);" />
            </g>
          </svg>
          <div class="subtitle-service">Webシステム開発</div>
          <div class="text-service">お店に行くことなく、いつでも好きな商品を購入できるECサイトの制作やFacebookやTwitterといったものに代表されるSNSサービスなどのWebシステム開発をいたします。</div>

        </div>
      </div>

    </div>
    <!-- 作品部分------------------------------------------------->
    <div id="product-link"></div>
    <!--------------------------------------------------------------->
    <div class="fadein">
      <div id="product">
        <div class="check-box">
          <div class="V-space4"></div>
          <div class="title-product">My products</div>
          <ul class="tab4">
            <li class="tab4__item"><span class="tab4__link on" data-tab-body="1">ALL</span></li>
            <li class="tab4__item"><span class="tab4__link" data-tab-body="2">Webサイト</span></li>
            <li class="tab4__item"><span class="tab4__link" data-tab-body="3">LP制作</span></li>
            <li class="tab4__item"><span class="tab4__link" data-tab-body="4">Webシステム</span></li>
            <li class="tab4__item"><span class="tab4__link" data-tab-body="5">その他</span></li>
          </ul>
          <div class="tab4-body">
            <div class="tab4-body__item tab4-body__item--1 on">
              <!--ALL-->
              　<div class="product-box">
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
              </div>
            </div>
            <div class="tab4-body__item tab4-body__item--2">
              <!--Webサイト＆LP制作-->
              <div class="product-box">

                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>

              </div>
            </div>
            <div class="tab4-body__item tab4-body__item--3">
              <!--Webシステム各機能-->
              <div class="product-box">

                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
              </div>
            </div>
            <div class="tab4-body__item tab4-body__item--4">

              <!--Webサイト＆LP制作-->
              <div class="product-box">

                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
              </div>
            </div>
            <div class="tab4-body__item tab4-body__item--5">
              <!--その他-->
              <div class="product-box">

                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
                <div class="each-product-box">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="dot-product"></div>

    </div>
    <!-- コンタクト部分------------------------------------------------->
    <div id="contact-link"></div>
    <!--------------------------------------------------------------->
    <div class="fadein">
      <div class="dot-contact-top"></div>
    </div>
    <div class="fadein">
      <div id="contact">
        <div class="V-space4"></div>
        <div class="title-contact">contact</div>
        <div class="contact-menu">

          <div class="menu-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="120px" viewBox="0 0 24 24" fill="none" stroke="#079cb9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
            </svg>
            <div class="text-menu-box">Twitter : <a href="https://twitter.com/yuu_yoshi12">@yuu_yoshi12</a></div>
          </div>
          <div class="menu-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="120px" viewBox="0 0 24 24" fill="none" stroke="#079cb9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <div class="text-menu-box">E-mail : yuu.yoshi12@outlook.jp</div>
          </div>
          <div class="menu-box">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" style="width: 120px; height: 120px; opacity: 1;" xml:space="preserve">
              <style type="text/css">
                .st0 {
                  fill: #4B4B4B;
                }
              </style>
              <g>
                <path class="st0" d="M0,0.002v511.996h512v-18.071V0.002H0z M475.859,475.856H36.141v-364.43h439.718V475.856z" style="fill: rgb(7, 156, 185);" />
                <rect x="78.305" y="167.994" class="st0" width="355.386" height="96.723" style="fill: rgb(7, 156, 185);" />
                <rect x="295.152" y="309.894" class="st0" width="138.538" height="118.968" style="fill: rgb(7, 156, 185);" />
                <rect x="78.305" y="311.694" class="st0" width="162.631" height="18.07" style="fill: rgb(7, 156, 185);" />
                <rect x="78.305" y="408.991" class="st0" width="162.631" height="18.071" style="fill: rgb(7, 156, 185);" />
                <rect x="78.305" y="360.347" class="st0" width="162.631" height="18.071" style="fill: rgb(7, 156, 185);" />
              </g>
            </svg>
            <div class="text-menu-box">フォームは下記をご参照ください。</div>
          </div>
        </div>

        <div class="contact-form">
          <!--==================入力フォームの作成======================================-->
          <!--===================================================================== ===-->
          <div class="title-contact-form">お問い合わせフォーム</div>
          <div class="text-contact-form">お仕事のご依頼・お問い合わせなど、気になったことがございましたらご気軽にどんなことでもお問い合わせください。</div>
          <div class="inputForm">
            <?php
              if ($error == 1 ) {
            ?>
            <div class="message">
              <?php
                echo "項目を全て入力してください。";
              ?>
            </div>
            <?php }else{} ?>


            <form method="POST" class="form" action="#contact">
              <!--隠しフィールドにクーポンコードと商品IDを設定してPOSTする-->

              <ul class="form">
                <li><label>お名前</label></li>
                <span class="text-need">（必須）</span><br>
                <input type="text" name="name" class="input-name" value=<?php echo $name?>><br>
                <li><label>メールアドレス</label></li>
                <span class="text-need">（必須）</span><br>
                <input type="text" name="mail" class="input-mail" value=<?php echo $mail?>><br>
                <li><label>題名</label></li><br>
                <input type="text" name="title" class="input-title" value=<?php echo $title?>><br>
                <li><label>お問い合わせ内容</label></li>
                <span class="text-need">（必須）</span><br>
                <input type="text" name="content" class="input-content" value=<?php echo $content?>><br>
                <div id="orderBotton">
                  <input type="submit" value="送信する" style="background-color:1e90ff;">
                  <input type="hidden" name="contact" value=<?php echo $contact?> </div> </ul> </form> </div> </div> <div class="dot-contact"></div>
          </div>
        </div>

        <div class="footer">
          <div class="footer-box">
            <a href="https://www.facebook.com/profile.php?id=100025129152835">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" style="width: 64px; height: 64px; opacity: 1;" xml:space="preserve">
                <style type="text/css">
                  .st0 {
                    fill: #4B4B4B;
                  }
                </style>
                <g>
                  <path class="st0"
                    d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M327.211,159.859   l-27.096,0.012c-21.246,0-25.36,10.096-25.36,24.912v32.67h50.671l-6.598,51.171h-44.073v131.3h-52.842v-131.3h-44.185v-51.171   h44.185v-37.737c0-43.793,26.746-67.64,65.814-67.64c18.713,0,34.796,1.393,39.485,2.016V159.859z"
                    style="fill: rgb(100, 100, 100);" />
                </g>
              </svg>
            </a>
            <a href="https://twitter.com/yuu_yoshi12">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" style="width: 64px; height: 64px; opacity: 1;" xml:space="preserve">
                <style type="text/css">
                  .st0 {
                    fill: #4B4B4B;
                  }
                </style>
                <g>
                  <path class="st0"
                    d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M260.926,217.391   c0.084,0.004,0.164,0.021,0.25,0.025c-0.875-3.752-1.328-7.664-1.328-11.682c0-28.307,22.951-51.258,51.262-51.258   c14.742,0,28.063,6.225,37.414,16.188c9.6-1.89,18.684-5.174,27.129-9.523c1.781-0.864,3.566-1.723,5.32-2.674   c-3.039,9.334-8.744,17.412-16.141,23.532c-2.004,1.576-4.062,3.098-6.326,4.344c0.154-0.018,0.304-0.052,0.457-0.071   c-0.15,0.093-0.275,0.22-0.428,0.312c8.402-1.005,16.459-3.051,24.111-5.942c1.715-0.592,3.428-1.191,5.127-1.852   c-6.842,10.159-15.453,19.095-25.375,26.259c0.098,2.197,0.148,4.406,0.148,6.631c0,67.736-51.558,145.842-145.844,145.842   c-28.947,0-55.891-8.484-78.576-23.028c4.01,0.473,8.092,0.715,12.229,0.715c19.136,0,37.014-5.269,52.383-14.34   c3.871-2.23,7.658-4.639,11.273-7.365c-0.098-0.002-0.187-0.026-0.285-0.028c0.094-0.073,0.196-0.136,0.289-0.209   c-19.422-0.358-36.184-11.539-44.574-27.747c-1.25-2.489-2.32-5.096-3.164-7.831c3.086,0.58,6.246,0.898,9.5,0.898   c3.391,0,6.666-0.436,9.871-1.063c1.197-0.168,2.406-0.308,3.586-0.502c-0.156-0.032-0.293-0.1-0.449-0.133   c0.162-0.042,0.336-0.056,0.496-0.1c-23.449-4.709-41.119-25.428-41.119-50.262c0-0.196,0.002-0.387,0.004-0.58l0.024-0.055   c5.521,3.064,11.693,5.092,18.23,5.94c1.609,0.269,3.221,0.516,4.832,0.657c-0.11-0.074-0.205-0.164-0.314-0.238   c0.152,0.006,0.297,0.036,0.447,0.041c-13.754-9.191-22.803-24.883-22.803-42.666c0-8.142,1.988-15.787,5.367-22.623   c0.539-1.028,1.018-2.078,1.637-3.074c22.711,27.822,55.516,46.971,92.801,52.15c4.16,0.605,8.332,1.144,12.553,1.388   C260.934,217.443,260.932,217.416,260.926,217.391z"
                    style="fill: rgb(100, 100, 100);" />
                </g>
              </svg>
            </a>
            <a href="https://rural-blog.com/">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" style="width: 64px; height: 64px; opacity: 1;"
                xml:space="preserve">
                <style type="text/css">
                  .st0 {
                    fill: #4B4B4B;
                  }
                </style>
                <g>
                  <path class="st0"
                    d="M421.073,221.719c-0.578,11.719-9.469,26.188-23.797,40.094v183.25c-0.016,4.719-1.875,8.719-5.016,11.844   c-3.156,3.063-7.25,4.875-12.063,4.906H81.558c-4.781-0.031-8.891-1.844-12.047-4.906c-3.141-3.125-4.984-7.125-5-11.844V152.219   c0.016-4.703,1.859-8.719,5-11.844c3.156-3.063,7.266-4.875,12.047-4.906h158.609c12.828-16.844,27.781-34.094,44.719-49.906   c0.078-0.094,0.141-0.188,0.219-0.281H81.558c-18.75-0.016-35.984,7.531-48.25,19.594c-12.328,12.063-20.016,28.938-20,47.344   v292.844c-0.016,18.406,7.672,35.313,20,47.344C45.573,504.469,62.808,512,81.558,512h298.641c18.781,0,36.016-7.531,48.281-19.594   c12.297-12.031,20-28.938,19.984-47.344V203.469c0,0-0.125-0.156-0.328-0.313C440.37,209.813,431.323,216.156,421.073,221.719z"
                    style="fill: rgb(100, 100, 100);" />
                  <path class="st0"
                    d="M498.058,0c0,0-15.688,23.438-118.156,58.109C275.417,93.469,211.104,237.313,211.104,237.313   c-15.484,29.469-76.688,151.906-76.688,151.906c-16.859,31.625,14.031,50.313,32.156,17.656   c34.734-62.688,57.156-119.969,109.969-121.594c77.047-2.375,129.734-69.656,113.156-66.531c-21.813,9.5-69.906,0.719-41.578-3.656   c68-5.453,109.906-56.563,96.25-60.031c-24.109,9.281-46.594,0.469-51-2.188C513.386,138.281,498.058,0,498.058,0z"
                    style="fill: rgb(100, 100, 100);" />
                </g>
              </svg>
            </a>

          </div>
        </div>
        <!--jQuery読み込み部-->
        <script src="particles.js"></script>
        <script src="portfolio.js"></script>
</body>

</html>
