
<?php
//Connecter la base des données
require 'config/connexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="css/style.css">
<style>
.matri{
    border:2px solid blue;
}
.form{
    background-color: #15172b;
  border-radius: 20px;
  box-sizing: border-box;
  height: 500px;
  padding: 20px;
  width: 330px;
  display: block;
    margin-left: auto;
    margin-right: auto
}
.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 2px;
}
.input {
  background-color: #303245;
  border-radius: 12px;
 
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
  margin :5px;
 
  
}
.in{  background-color: #303245;
    border-radius: 12px;
    font-size: 18px;
    color: #eee;
    outline: 0;
    padding: 4px 20px 0;
    width: 25%;
    height: 50px;
    margin-top :10px;
    margin-left:10px;
}
::placeholder {
  color: white;
  font-size: 1em;
}

</style>
</head>
<body>
  <div>
    <form method="get">
        <input name="search" type="text" placeholder="chercher" class="in" >
    </form>
</div>
 <div class="form">   



    <div  class="input-container ic1">
<form action="ajouter.php" method="post"  >
<input  type="text" name="matricule" placeholder="matricule" class="input" > 
<input type="text" name="nom" placeholder="nom"  class="input">
<input type="text" name="prenom" placeholder="prenom"  class="input">
<input type="text" name="date_naissance" placeholder="date"  class="input">
<input type="text" name="salair" placeholder="salair"  class="input">
<input type="text" name="fonction" placeholder="fonction"  class="input">
<input type="text" name="departement" placeholder="un département"  class="input">
<button type="submit" class="btnn btn-primary mt-1" class="btNN"  >ajoute</button>
</form>
</div>
</div>
<div class=" ms-25">
<table class="table ">
<tr>
<th >une matricule</th>
<th >un nom</th>
<th>un prénom</th>
<th>une date de naissance</th>
<th> un salaire</th>
<th>une fonction</th>
<th>un dèpartement</th>
<th>un photo</th>
<th  >action</th>

</tr>
<?php
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql="SELECT * FROM employe WHERE matricule like '%$search%' OR nom like '%$search%'";
} else {
    $sql="SELECT * FROM employe";
}

$exc=mysqli_query($connet,$sql);
while($result=mysqli_fetch_assoc($exc)){
?>
<tr>
    <td><?php echo $result['matricule']?></td>
    <td><?php echo $result['nom']?></td>
    <td><?php echo $result['prenom']?></td>
    <td><?php echo $result['date_naissance']?></td>
    <td><?php echo $result['salair']?></td>
    <td><?php echo $result['fonction']?></td>
    <td><?php echo $result['departement']?></td>
     <td> <img src="<?php echo $result['photo'] ?>" width="40" height="40" /></td>
    <td><a href="supprimer.php?delete=<?php echo $result['matricule']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">supprimer</a>
    <a href="update.php?matricule=<?php echo $result['matricule']?>" class="btn btn-info">modifier</a>
 
</td>

</tr>
<?php
}
?>

</table>
</div>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<html>
