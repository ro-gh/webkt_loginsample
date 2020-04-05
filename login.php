<?php  
//  http://localhost:8888/webkt_php_3/login/login.php
error_reporting(E_ALL); // E_STRICTレベル以外のエラーを報告する
ini_set('display_errors', 1); // 画面にエラーを表示させるか

  if(!empty($_POST)) {

    // 変数にユーザー情報を代入
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // DBへの接続準備
    $dsn = 'mysql:dbname=php_sample_1;host=localhost=utf8'; // localhost = 127.0.0.1
    $user = 'root';
    $password = 'root';
    $options = array(

      // SQL実行失敗時に例外をスロー
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
      // デフォルトフェッチモードを連想配列型式に設定
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      // バッファードクエリを使う（一度に結果セットを全て取得し、サーバ負荷を軽減）
      // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
      PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,

    );

    // PDOオブジェクト生成（DBへ接続）
    $dbh = new PDO($dsn, $user, $password, $options);
var_dump($dbh);
// reference :  PHPのPDOでhostをlocalhostに指定するとエラーになる
// http://blog.livedoor.jp/blackout__/archives/1003132042.html

    // SQL文（クエリー作成）
    $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :email AND pass = :pass');

    // プレースホルダーに値をセットし、SQL文を実行
    $stmt->execute(array(':email' => $email, ':pass' => $pass));

    $result = 0;
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // 結果が０でない場合
    if(!empty($result)) {

      // SESSION（セッション）を使うにsession_start()を呼び出す
      session_start();

      //SESSION ['login']に値を代入
      $_SESSION['login'] = true;

    header("Location:mypage.php"); // マイページへ偏移
        // データベースへ情報を保存する処理
      }
    }

 
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage Title</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <h1>ログイン</h1></h1>
    <form method="post">
    
              <input type="text" name="email" placeholder="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>">

              <input type="password" name="pass" placeholder="パスワード" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass']; ?>">

        <input type="submit" value="submit">
    </form>
    <a href="mypage.php">マイページへ</a>

</body>
</html>