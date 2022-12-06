<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="input.php">戻る</a></li>
    </ul>
</head>


<?php

session_start();

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}
$URL = $_POST['URL'];
$Tag = $_POST['Tag'];


// ユーザーエージェントの設定
// https://ysklog.net/php/1134.html

//ヘッダーの設定
$header = array(
"Content-Type: application/x-www-form-urlencoded",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0",
"Referer: https://ysklogtest.net"
);

//オプション設定
$options =array(
'http' =>array(
'method' => "GET",
'header' => implode("\r\n", $header),
)
);



// https://pig-data.jp/blog_news/blog/scraping-crawling/php/

// h2タグを指定する場合
// $dom = new DOMDocument('1.0', 'UTF-8');
// $html = file_get_contents("https://pig-data.jp/usecase/pigexample16/");
// @$dom->loadHTML($html);
// $xpath = new DOMXpath($dom);
// //h2の部分を変更することで他のタグなど指定が可能
// foreach($xpath->query('//h2') as $node){
// echo "<p>";
    // //h2の内容を1つずつ表示させる
    // echo $node->nodeValue;
    // echo "</p>";
// }

// クラスで指定する際に参考にしたもの
// https://php-archive.net/php/dom-scraping/


$dom = new DOMDocument('1.0', 'UTF-8');
$html = file_get_contents($URL);
// $html =file_get_contents("https://ja.wikipedia.org/wiki/%E3%82%A2%E3%83%B3%E3%83%88%E3%83%8B%E3%82%AA%E7%8C%AA%E6%9C%A8");

@$dom->loadHTML($html);
$xpath = new DOMXpath($dom);
//classの部分はidでも良い、タグ名も指定できる。
$counter = 0;
$array =[];
$_SESSION["char"]='';

echo '<br>●要素の表示<br>';

foreach($xpath->query('//'.$Tag) as $node){
echo '<form action="write.php" method="post"> 商品名';
    echo $counter+1;
    echo '<input type="text" size="50" name="name';
echo $counter+1;
echo '" value="';
echo $node->nodeValue; 
echo '"></form>';
$counter++;
array_push($array,$node->nodeValue);
$_SESSION["char"] .= ' '.$node->nodeValue."\n";
}

echo '<br>●結合文の表示<br>';
print_r($_SESSION["char"]); 

echo '<form action="write.php" method="post"><br>配列
<input type="text" name="array" value=';
echo join(" ", $array); 
echo '><br>
商品数 <input type="text" name="counter" value=' ; 
echo $counter; 
echo '>
<input type="submit" value="送信"> </form>' ; 

// $time = date('Y-m-d H:i:s');
// // ファイルに書き込み
// $file = fopen('data/data.txt', 'a');
// fwrite($file, $time . $_SESSION["char"] . $counter . "\n");
// fclose($file);



usleep(rand(300,700));

// echo '<h1>日本</h1>';
// $domJP = new DOMDocument('1.0', 'UTF-8');
// $htmlJP =file_get_contents("https://www.hermes.com/jp/ja/category/women/bags-and-small-leather-goods/bags-and-clutches/#|",false,stream_context_create($options));
// @$domJP->loadHTML($htmlJP);
// $xpath = new DOMXpath($domJP);
// //classの部分はidでも良い、タグ名も指定できる。
// $counterJP = 1;
// $arrayJP =[];

// foreach($xpath->query('//*[@class="product-item-name"]') as $nodeJP){
// echo '<form action="write.php" method="post"> 商品名';
//     echo $counterJP;
//     echo '<input type="text" name="nameJP';
// echo $counterJP;
// echo '" value="';
// echo $nodeJP->nodeValue; 
// echo '"><input type="submit" value="送信"> </form>';
// $counterJP++;
// array_push($arrayJP,$nodeJP->nodeValue);
// }

// print_r($arrayJP);
// echo '<form action="write.php" method="post"> 総ワード
//     <input type="text" name="arrayJP" value=';
// echo implode( ',',($arrayJP)); 
// echo '><input type="submit" value="送信"> </form>' ; 
// echo '<form action="write.php" method="post"> 商品数
// <input type="text" name="counterJP" value=' ; 
// echo $counter-1; 
// echo '><input type="submit" value="送信"> </form>' ; //
// usleep(rand(300,700));

// echo '<h1>UK</h1>' ; 
// $dom=new DOMDocument('1.0', 'UTF-8' ); //
        // $html=file_get_contents("https://www.hermes.com/uk/en/category/women/bags-and-small-leather-goods/bags-and-clutches/#|",false,
        // stream_context_create($options)); // @$dom->loadHTML($html);
    // $xpath = new DOMXpath($dom);
    // //classの部分はidでも良い、タグ名も指定できる。
    // foreach($xpath->query('//*[@class="product-item-name"]') as $node){
    // echo "<p>";
        // //取った結果を1つずつ表示させる
        // echo $node->nodeValue;
        // echo "</p>";
        // }
        
        // usleep(rand(300,700));

    // echo '<h1>Hong Kong</h1>';
    // $dom = new DOMDocument('1.0', 'UTF-8');
    // $html =    file_get_contents("https://www.hermes.com/hk/en/category/women/bags-and-small-leather-goods/bags-and-clutches/#|",false, stream_context_create($options));
    // @$dom->loadHTML($html);
    // $xpath = new DOMXpath($dom);
    // //classの部分はidでも良い、タグ名も指定できる。
    // foreach($xpath->query('//*[@class="product-item-name"]') as $node){
    // echo "<p>";
    //     //取った結果を1つずつ表示させる
    //     echo $node->nodeValue;
    //     echo "</p>";
        
    // }
    
    //     usleep(rand(300,700));

    // echo '<h1>Singapore</h1>';
    // $dom = new DOMDocument('1.0', 'UTF-8');
    // $html = file_get_contents("https://www.hermes.com/sg/en/category/women/bags-and-small-leather-goods/bags-and-clutches/#|",false, stream_context_create($options));
    // @$dom->loadHTML($html);
    // $xpath = new DOMXpath($dom);
    // //classの部分はidでも良い、タグ名も指定できる。
    // foreach($xpath->query('//*[@class="product-item-name"]') as $node){
    // echo "<p>";
        // //取った結果を1つずつ表示させる
        // echo $node->nodeValue;
        // echo "</p>";
        // }
        
        // usleep(rand(300,700));





    ?>

</html>