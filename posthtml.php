<html>

<head>
    <meta charset="utf-8">
    <style>
    .menu {
        background-color: #2FA6E9;
    }
    </style>
    <title>POST練習</title>
</head>

<body>
    <div class="menu">
        <h3>menu</h3>
        <ul>
            <li>URLを指定。</li>
            <li>タグ名を指定。（h3,とか）</li>
            <li>URL例　https://edition.cnn.com/2022/12/05/investing/premarket-stocks-trading</li>
            <li>タグ例　p</li>
        </ul>
    </div>
    <!-- 次のページで受け取ったURLとタグ名を使って処理する -->
    <form action="post.php" method="post">
        URL: <input type="text" name="URL" size="50">
        <br>
        TAG: <input type="text" name="Tag">
        <input type="submit" value="送信">
    </form>
</body>

</html>