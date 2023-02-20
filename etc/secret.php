<?php

// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

 //db接続処理
 try {
  //db接続設定
  $dbConnection = new dbConnection();
  $db = $dbConnection->connection();

  // SQL文
  $stmt = $db -> query("SELECT username,password FROM dummytable WHERE level = 3");
  $stmt -> execute();
  $result = $stmt -> fetch(PDO::FETCH_ASSOC); 

}catch (PDOExeption $e) {
  echo $poe;
}catch(Exception $poe){
  echo $poe; 
}finally{
  $db = null;
  $stmt = null;
}

echo "<pre>";
var_dump($result);
echo "</pre>";

?>