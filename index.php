<?php 

require_once ("config.php");


$root = new Usuario();
$root->loadbyid(2);



echo $root;

 ?>