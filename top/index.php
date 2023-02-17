<?php $title = "トップページ";?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/top.css">

       <div class="contents">
                <!-- コンテンツ部分 -->
                <h2 class="tops">あなたの機器は本当に安全ですか？</h2>
                <div class="ranking">
                <p>ランキング</p>
                <p>1位<br>@@@</p>
                </div>
                <h1 class="top">ようこそ！</h1>
                <h1 class="top">さん</h1>

                <button class = "questio"type="button">問題へ</button>
                <form action="https://www.google.com">
                        <button type="button">問題へ</button>
                </form>
                <p>特殊文字を適切に処理できていないと、スクリプトを実行できてしまったり、意図しない動作が行われる可能性があ
                ります。例を挙げるとSQLインジェクションやXXSなどです。これらの脆弱性は実際に体験してみないと理解をするこ
                とが難しいと考えました。脆弱性を実際に攻撃できる謎解きサイトです。
                ただ単にコピペで入力して処理を実行するだけでは面白みがないのでCTFで使われているflagのようなものを用意する
                ことで脆弱性の学習と同時に謎解きも楽しめるというサイトです。問題を解けない人のためにヒントや解答も用意し
                問題を解くスピードを計測することでランキング機能も実装したいと考えています。</p>
                
        </div>
<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->