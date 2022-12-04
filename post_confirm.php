// POSTを受け取る
// POSTの場合はパスワードも送ってみる。

<?php
$name = $_POST['name'];
$mail = $_POST['mail'];
?>
<html>

<head>
    <meta charset="utf-8">
    <title>POST（受信）</title>
</head>

<body>
    <p>お名前：<?= $name ?> </p>
    <p>Mail：<?= $mail ?></p>
    <!-- パスワード： -->
    <ul>
        <li><a href="index.php">index.php</a></li>
    </ul>
</body>

</html>