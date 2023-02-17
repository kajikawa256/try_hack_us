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
                <h1 class="top">ようこそ！<br>〇〇さん</h1>

                <button onclick="location.href='https://www.google.com/'">問題へ</button>

                <div class="tabs">
                        <input id="all" type="radio" name="tab_item" checked>
                        <label class="tab_item" for="all">総合</label>
                        <input id="programming" type="radio" name="tab_item">
                        <label class="tab_item" for="programming">プログラミング</label>
                        <input id="design" type="radio" name="tab_item">
                        <label class="tab_item" for="design">デザイン</label>
                        <div class="tab_content" id="all_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">総合の内容がここに入ります</p>
                                </div>
                        </div>
                        <div class="tab_content" id="programming_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">プログラミングの内容がここに入ります</p>
                                </div>
                        </div>
                        <div class="tab_content" id="design_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">デザインの内容がここに入ります</p>
                                </div>
                        </div>
                </div>


                <p class="text" style="text-align:center">特殊文字を適切に処理できていないと、スクリプトを実行できてしまったり、意図しない動作が行われる可能性があります。
                <br>例を挙げるとSQLインジェクションやXXSなどです。これらの脆弱性は実際に体験してみないと理解をするこ
                <br>とが難しいと考えました。脆弱性を実際に攻撃できる謎解きサイトです。
                <br>ただ単にコピペで入力して処理を実行するだけでは面白みがないのでCTFで使われているflagのようなものを用意する
                <br>ことで脆弱性の学習と同時に謎解きも楽しめるというサイトです。問題を解けない人のためにヒントや解答も用意し
                <br>問題を解くスピードを計測することでランキング機能も実装したいと考えています。</p>
                
        </div>
<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->