<?php
    $article=true;
    include_once("header.php");
    include_once("main.php");

if(!empty($_POST["inputdesc"])&&!empty($_POST["inputpu"])){
      $query="insert into articles(description,prix_unitaire)value(:desc,:pu)";
      $pdostmt=$pdo->prepare($query);
      $pdostmt->execute(["desc"=>$_POST["inputdesc"],"pu"=>$_POST["inputpu"]]);
      $pdostmt->closeCursor();
      header("Location:articles.php");
}
?>          
<h1 class="mt-5">Ajouter un article</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6">
     <label for="inputdesc">Description</label>
    <textarea class="form-control" placeholder="mettre la description" id="inputdesc" name="inputdesc" required></textarea>
  </div>
  <div class="col-md-6">
    <label for="inputprix_unitaire" class="form-label">PU</label>
    <input type="text" class="form-control" id="inputpu" name="inputpu"required>
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
