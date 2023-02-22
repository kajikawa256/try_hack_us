<?php $title = "トップページ";?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/top.css">

       <div class="contents">
                <!-- コンテンツ部分 -->
                <h2 class="tops">あなたのセキュリティは本当に安全ですか？</h2>

                <h1 class="top">ようこそ！<br><?= $_SESSION["name"] ?>さん</h1>

                <div class="tabs">
                        <input id="all" type="radio" name="tab_item" checked>
                        <label class="tab_item" for="all">脆弱性とは</label>
                        <input id="programming" type="radio" name="tab_item">
                        <label class="tab_item" for="programming">脆弱性の例</label>
                        <input id="design" type="radio" name="tab_item">
                        <label class="tab_item" for="design">脆弱性対策</label>
                        <!-- 脆弱性とは -->
                        <div class="tab_content" id="all_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">コンピュータのOSやソフトウェアにおいて、プログラムの不具合や設計上のミスが原因となって発生した情報セキュリティ上の欠陥のことを言います。 脆弱性には深刻な影響を及ぼすものもあり、悪用されるとシステムを乗っ取られたり、重要な情報が漏えいしたり、別の攻撃の踏み台にされる危険性があります</p>
                                </div>
                        </div>
                        <!-- 例 -->
                        <div class="tab_content" id="programming_content">
                                <div class="tab_content_description">
                                        <p class="c-txtsp">
                                                <ul class="topul">
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
                                        <p class="c-txtsp">①最新の実装ガイドを確認して脆弱性となるポイントをなくす
                                                        <br>②ソフトウェアアップデートを適用する
                                                        <br>③定期的に診断を行う
                                                        <br>④脆弱性対策ツールを使用して、脆弱性となるポイントを洗い出す</p>
                                </div>
                        </div>
                </div>

                <p class="text">
                今まで学習してきたエスケープ処理やPOST通信を行う理由を理解していない人が多くいると思いました。特殊文字を適切に処理できていないと、スクリプトを実行できてしまったり、意図しない処理が動作する可能性があります。例を挙げるとSQLインジェクションやディレクトリトラバーサルなどです。これらの脆弱性は実際に体験してみないと理解することが難しいと考えました。
そこで脆弱性を実際に攻撃できる腕試しサイトを作ることにしました。このサイトではパスワード認証を実際に攻撃して不正ログインするというハッキング体験ができます。
                </p>
                <!-- 問題に移動 -->

                <div class="button001">
                        <a href="../question/index.php">問題へ</a>
                </div>
        </div>
<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->