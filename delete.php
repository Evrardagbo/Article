<?php
include_once("main.php");

if(!empty($_GET["id"])){
  $query="delete from clients where idclients=:id";
  $objstmt=$pdo->prepare($query);
  $objstmt->execute(["id"=>$_GET["id"]]);
  $objstmt->closeCursor();
  header("Location:clients.php");    
}

if(!empty($_GET["idarticles"])){
  $query="delete from articles where idarticles=:id";
  $objstmt=$pdo->prepare($query);
  $objstmt->execute(["id"=>$_GET["idarticles"]]);
  $objstmt->closeCursor();
  header("Location:articles.php");    
}
if(!empty($_GET["idcmd"])){
  $query="delete from commandes where idcommandes=:id";
  $objstmt=$pdo->prepare($query);
  $objstmt->execute(["id"=>$_GET["idcmd"]]);
  $objstmt->closeCursor();
  header("Location:commandes.php");    
}
?>