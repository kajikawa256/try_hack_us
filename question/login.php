<?php 
  $page = filter_input(INPUT_GET,"page");

  //正解パス
  switch($page){
    case "top":
    case "home":
    case "index" :$page = "../top/index.php"; break;
    case "ranking" :$page = "../ranking/ranking.php"; break;
    case "/etc/master.passwd":
    case "/etc/security/passwd":
    case "/etc/tcb/aa/user/":
    case "../etc/secret.txt":
    case "../etc/secret.php":
    case "../etc/secret":
    case "../secret":
    case "../users":
    case "/.secure/etc/passwd":$page = "../etc/secret.php";break;
    default: $page = "ques_page_3.php";
  }

  require_once("./$page");

?>

