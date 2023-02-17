<?php 
  $page = filter_input(INPUT_GET,"page");
  require_once("./". str_replace("'","",$page) ." ");
  
?>

