<?php
$article=true;
include_once("header.php");
include_once("main.php");

if(!empty($_POST)){
      $query="update articles set description=:desc,prix_unitaire=:pu where idarticles=:id";
      $pdostmt=$pdo->prepare($query);
      $pdostmt->execute(["desc"=>$_POST["inputdesc"],"pu"=>$_POST["inputpu"],"id"=>$_POST["myid"]]);
      header("Location:articles.php");
}       
if(!empty($_GET["id"])){
        $query="select * from articles where idarticles=:id";
        $pdostmt=$pdo->prepare($query);
        $pdostmt->execute(["id"=>$_GET["id"]]);
        while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
?>
  <h1 class="mt-5">Modifier un article</h1>
<form class="row g-3" method="POST">
    <input type="hidden" name="myid" value="<?php echo $row["idarticles"] ?>"/>
  <div class="col-md-6">
     <label for="inputdesc">Description</label>
    <textarea class="form-control" id="inputdesc" name="inputdesc" required><?php echo $row["description"]?></textarea>
  </div>
  <div class="col-md-6">
    <label for="inputpu" class="form-label">PU</label>
    <input type="text" class="form-control" id="inputpu" name="inputpu" value="<?php echo $row["prix_unitaire"]?>" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Modifier</button>
 </div>
</form>
</div>
</main>
<?php
endwhile;
$pdostmt->closeCursor();
}
?>
<?php
include_once("footer.php");
?>
