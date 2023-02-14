<?php $title = "トップページ";?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/sign_up.css">

<h2>新規登録</h2>

  <form action="../top/index.php" method="POST">
    <div>
      <label class="label" for="name">名前</label>
      <input id="name" type="text" name="name">
    </div>

    <div>
      <label class="label" for="e-mail">パスワード</label>
      <input id="e-mail" type="email" name="email">
    </div>

    <div>
      <input type="submit">
    </div>

  </form>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->