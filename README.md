# 課題　 --
URLとタグ名を指定。スクレイピングっぽいことをして、書き込み。ついでに翻訳

 
## ① 課題内容（どんな作品か）

- ジーズの年末カレンダーでPHPでスクレイピングという記事を書いている方がいて、調べたら、結構簡単に出来ることが分かった。
- 当初は、転売ヤーを目指して、ブランド店のWeb掲示商品を取ろうとしたが、数回やるとブロックされた。
- その後、そもそも、仕事でよく見る英語サイトがあって、英語で読むのは面倒なので、コピペしてDeepLで翻訳しているものの、ページの作りとして、途中で画像をはさんだりして、コピペすることに手間がかかることがストレスだった
- これをURKとタグ名を指定することで、本文部分だけ抜き取ってきて、それをDeepLで翻訳するという流れにした
- まずはposthtmlを開いて下さい

## ② 工夫した点・こだわった点

- 遷移などは授業で習ったことを忠実に
- pタグで集めてきたものを結合した文として作成。見出しや商品などを集める場合に備えて、配列も用意
- タグ名だけではなく、クラス名やID名も指定可能だということを確認

## ③ 難しかった点・次回トライしたいこと(又は機能)

- DBを扱うようになれば翻訳結果もDBに入れておきたい
- DeepLは文章に＆があるとエラーを起こした。当初、何が理由で止まっているのか不明だった
- 

## ④ 質問・疑問・感想、シェアしたいこと等なんでも

- [質問]
- [疑問]
- [感想]個人的に実利があるものが作れた
- [tips]ニュースサイトを幾つか見たところ、どこも本文はpタグを使っていた。
- [参考記事]
PHPでのスクレイピング
https://pig-data.jp/blog_news/blog/scraping-crawling/php/
クラス名やID名から情報を取ってくる場合
https://php-archive.net/php/dom-scraping/