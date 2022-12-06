<?php


session_start();

$array = $_POST['array'];
// $char = $_POST['char'];
$counter = $_POST['counter'];

$time = date('Y-m-d H:i:s');
// ファイルに書き込み
$file = fopen('data/data.txt', 'a');
fwrite($file, $time . "要素の数は" . $counter . "\n");
fwrite($file, $time . "配列はスペースを含む文字列の場合、インプットセルの中に反映しきれず、最初の文字だけ出てくる→" . $array . "\n");
fwrite($file, $time . $_SESSION["char"] . "\n");
fclose($file);
//文字作成

?>


<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>

    <h1>書き込みしました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2>

    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="input.php">戻る</a></li>
    </ul>
    <h2>結合文を翻訳しましょう！</h2>
    <h2 style='font-size:2rem'>DeepL翻訳（言語に応じて、英訳か和約を選択。）</h2>
    <br>
    <textarea id="final_span" cols="100" rows="15"><?=$_SESSION["char"]?></textarea>
    <br>
    <button id="translateVoiceEN" class="button">英訳</button>
    <button id="translateVoiceJP" class="button">和訳</button>
    <br>
    <textarea id="resultDeepl" cols="100" rows="50"></textarea>
    <br>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    // Deepl翻訳関連 --------------------------------------------------------------------

    const url = "https://api-free.deepl.com/v2/translate";

    document.getElementById("translateVoiceEN").onclick = function() {
        let xhr = new XMLHttpRequest();
        let authKey = '848844c7-dfe2-3f9d-592a-393d8bc05be4:fx';
        let text = document.getElementById("final_span").value;
        let targetLang = "EN";
        let data =
            "auth_key=" + authKey + "&text=" + text + "&target_lang=" + targetLang;
        xhr.open("POST", url);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                document.getElementById("resultDeepl").value = JSON.parse(
                    xhr.response
                ).translations[0]["text"];
            }
        };
        xhr.send(data);

    };

    document.getElementById("translateVoiceJP").onclick = function() {
        let xhr = new XMLHttpRequest();
        let authKey = '848844c7-dfe2-3f9d-592a-393d8bc05be4:fx';
        let text = document.getElementById("final_span").value;
        let targetLang = "JA";
        let data =
            "auth_key=" + authKey + "&text=" + text + "&target_lang=" + targetLang;
        xhr.open("POST", url);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                document.getElementById("resultDeepl").value = JSON.parse(
                    xhr.response
                ).translations[0]["text"];
            }
        };
        xhr.send(data);
    };
    </script>


</body>

</html>