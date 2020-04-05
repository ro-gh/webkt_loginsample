<?php
error_reporting(E_ALL); // E_STRICTレベル以外のエラーを報告する
ini_set('display_errors', 1); // 画面にエラーを表示させるか
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>homepage title</title>
  <style>
    body {
      margin: 0 auto;
      padding: 1 50px;
      width: 25%;
      background: #eaeaea;
    }
    h1 {
      color: #545454; font-size: 20px;}
    a{
      color: #545454;
      display: block;
    }
    a:hover{
      text-decoration: none;
    }
    
    }
  </style>
</head>
<body>
  <?php  
  if(!empty($_SESSION['login'])) {   ?>

    <h1>Mypage</h1>

    <section>
      <p>
        あなたのemailは info@webukatu.comです。<br>
        あなたのpassは password です。
      </p>
      <a href="index_3.php">ユーザー登録画面へ</a>
    </section>
  
  <?php } else { ?>

    　<p>ログインしていないと見れません</p>
    
  <?php } ?>

</body>
</html>