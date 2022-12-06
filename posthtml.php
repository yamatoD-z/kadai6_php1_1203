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
            <li>URL例　https://ja.wikipedia.org/wiki/%E3%82%A2%E3%83%B3%E3%83%88%E3%83%8B%E3%82%AA%E7%8C%AA%E6%9C%A8</li>
            <li>タグ例　h3</li>
        </ul>
    </div>

    <form action="post.php" method="post">
        URL: <input type="text" name="URL" size="50">
        <br>
        TAG: <input type="text" name="Tag">
        <input type="submit" value="送信">
    </form>
</body>

</html>