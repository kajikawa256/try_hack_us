<?php $title = "トップページ";?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/top.css">

       <div class="contents">
                <!-- コンテンツ部分 -->
                <h2 class="tops">あなたのセキュリティは本当に安全ですか？</h2>
                <div class="ranking">
                <p>ランキング</p>
                <p>1位<br>@@@</p>
                </div>
                <h1 class="top">ようこそ！<br>〇〇さん</h1>

                <button class="btn" onclick="location.href='../question/ques_page_1.php'">問題へ</button>

                <div class="tabs">
                        <input id="all" type="radio" name="tab_item" checked>
                        <label class="tab_item" for="all">脆弱性とは</label>
                        <input id="programming" type="radio" name="tab_item">
                        <label class="tab_item" for="programming">脆弱性の例</label>
                        <input id="design" type="radio" name="tab_item">
                        <label class="tab_item" for="design">ヴぁヴぁばぁ</label>
                        <!-- 脆弱性とは -->
                        <div class="tab_content" id="all_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">コンピュータのOSやソフトウェアにおいて、プログラムの不具合や設計上のミスが原因となって発生した情報セキュリティ上の欠陥のことを言います。</p>
                                </div>
                        </div>
                        <!-- 例 -->
                        <div class="tab_content" id="programming_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">
                                                <ul>
                                                        <li>SQLインジェクション</li>
                                                        <li>クロスサイト・スクリプティング</li>
                                                        <li>CSRF（クロスサイト・リクエスト・フォージェリ）
                                                        <li>パス名パラメータの未チェック/ディレクトリ・トラバーサル</li>
                                                        <li>OSコマンド・インジェクション</li>
                                                        <li>セッション管理の不備</li>
                                                        <li>HTTPヘッダ・インジェクション</li>
                                                        <li>HTTPSの不適切な利用</li>
                                                        <li>サービス運用妨害(DoS)</li>
                                                        <li>メール不正中継</li>
                                                </ul>
                                        </p>
                                </div>
                        </div>
                        <!--  -->
                        <div class="tab_content" id="design_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">ヴぁヴぁばぁ</p>
                                </div>
                        </div>
                </div>


                <p class="text">
                特殊文字を適切に処理できていないと、スクリプトを実行できてしまったり、意図しない動作が行わ
                <br>れる可能性があります。例を挙げるとSQLインジェクションやXXSなどです。これらの脆弱性は実
                <br>際に体験してみないと理解をすることが難しいと考えました。脆弱性を実際に攻撃できる謎解き
                <br>サイトです。ただ単にコピペで入力して処理を実行するだけでは面白みがないのでCTFで使われ
                <br>ているflagのようなものを用意することで脆弱性の学習と同時に謎解きも楽しめるというサイト
                <br>です。
                </p>
                
        </div>
<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->