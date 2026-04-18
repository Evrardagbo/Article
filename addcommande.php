<?php
    $commande=true;
    include_once("header.php");
    include_once("main.php");
    $query="select idclients from clients";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute();

if(!empty($_POST["inputidcl"])&&!empty($_POST["inputdate"])){
      $query="insert into commandes(idclients,date) values (:idcl,:date)";
      $pdostmt=$pdo->prepare($query);
      $pdostmt->execute(["idcl"=>$_POST["inputidcl"],"date"=>$_POST["inputdate"]]);
      $pdostmt->closeCursor();
      header("Location:commandes.php");
}
?>          
<h1 class="mt-5">Ajouter une commande</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6"> 
     <label for="inputidcl" class="form-label">ID client</label>
     <select class="form-control"  name="inputidcl" required>
        <?php
        foreach($objstmt->fetchAll(PDO::FETCH_NUM) as $tab){
          foreach($tab as $elmt){
              echo "<option value=".$elmt.">".$elmt."</option>";
  }
        }
    ?>
</select>
  </div>
  <div class="col-md-6">
    <label for="inputdate" class="form-label">Date</label>
    <input type="date" class="form-control" id="inputdate" name="inputdate" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>

  </div>
</main>

<?php
include_once("footer.php");
?>
