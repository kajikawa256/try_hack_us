<?php
/*
  DB接続情報
*/
// 管理者アカウント
define("DB_HOST", "localhost");
define("DB_USER", "spic22_hack02");
define("DB_PASS", "C2vaVW6w");
define("DB_NAME", "spic22_hack02");
define("DB_CHARSET", "utf8mb4");

// ダミーアカウント
// define("DB_HOST", "localhost");
// define("DB_USER", "dummyUser");
// define("DB_PASS", "iamking");
// define("DB_NAME", "try_hack_us");
// define("DB_CHARSET", "utf8mb4");

class dbConnection
{
  function connection()
  {
    try {
      // データソース名を設定
      $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
      // $dbにPDOのインスタンス生成
      $db = new PDO($dsn, DB_USER, DB_PASS);

      //　PODの動作オプションを指定
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);                 // ステートメントのエミュレーションをオフ
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         // エラーを表示する
      $db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);    // 空文字をnullに変換
      $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);                   // 小文字を大文字に変換
      $db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);                       // autocommitをオフ

      return $db;
    } catch (PDOException $poe) {
      echo $poe;
    } finally {
      // nullにして接続を終了
      $db = null;
    }
  }
}
