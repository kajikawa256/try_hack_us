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

                <section class="tab_contents">
                        <div class="tab_wrap">
                                <input id="tab1" type="radio" name="check" checked>
                                <label for="tab1" class="tab_lab1">Tab1</label>
                                <input id="tab2" type="radio" name="check">
                                <label for="tab2" class="tab_lab1">Tab2</label>
                                <input id="tab3" type="radio" name="check">
                                <label for="tab3" class="tab_lab1">Tab3</label>
                                <div class="panels">
                                        <div id="area1" class="panel">
                                                <ul class="panel_content">
                                                <li>ボックス内コンテンツ1</li>
                                                <li>ボックス内コンテンツ</li>
                                                <li>ボックス内コンテンツ</li>
                                                </ul>
                                        </div>
                                        <div id="area2" class="panel">
                                                <ul class="panel_content">
                                                <li>ボックス内コンテンツ2</li>
                                                <li>ボックス内コンテンツ</li>
                                                <li>ボックス内コンテンツ</li>
                                                </ul>
                                        </div>
                                        <div id="area3" class="panel">
                                                <ul class="panel_content">
                                                <li>ボックス内コンテンツ3</li>
                                                <li>ボックス内コンテンツ</li>
                                                <li>ボックス内コンテンツ</li>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </section>


                <p class="text" style="text-align:center">特殊文字を適切に処理できていないと、スクリプトを実行できてしまったり、意図しない動作が行われる可能性があります。
                <br>例を挙げるとSQLインジェクションやXXSなどです。これらの脆弱性は実際に体験してみないと理解をするこ
                <br>とが難しいと考えました。脆弱性を実際に攻撃できる謎解きサイトです。
                <br>ただ単にコピペで入力して処理を実行するだけでは面白みがないのでCTFで使われているflagのようなものを用意する
                <br>ことで脆弱性の学習と同時に謎解きも楽しめるというサイトです。問題を解けない人のためにヒントや解答も用意し
                <br>問題を解くスピードを計測することでランキング機能も実装したいと考えています。</p>
                
        </div>
<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->