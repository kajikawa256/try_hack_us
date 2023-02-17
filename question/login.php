<?php 
  $page = filter_input(INPUT_GET,"page");

  switch($page){
    case "top":
    case "index" :$page = "../top/index.php"; break;
    default: $page = "ques_page_3.php";
  }

  require_once("./$page");

?>

