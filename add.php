<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php
    require_once 'includes/database.php';
    include_once 'includes/navbar.php';
        if(isset($_POST['add'])){
            $marque = htmlspecialchars($_POST['marque']);
            $matricule = htmlspecialchars($_POST['matricule']);
            $modele = htmlspecialchars($_POST['modele']);
            if (!empty($marque) && !empty($matricule) && !empty($modele)){
                $voiture = $sqlState->prepare('INSERT INTO voitures VALUES(null,?,?,?)');
                $voiture->execute([$marque,$matricule,$modele]);
                header('Location: home.php');
                ?>
            
                <?php
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                Fill in the fields!
                </div>
                <?php
            }
        }    
    ?>
<div class="container">
<form method='POST'>
  <div class="my-5">
    <label for="exampleInputEmail1" class="form-label">Marque</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name='marque' aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Modele</label>
    <input type="text" class="form-control" name='matricule' id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Version</label>
    <input type="number" class="form-control" name='modele' id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary" name='add'>Add Car</button>
</form>
</div>
</body>
</html>