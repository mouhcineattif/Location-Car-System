<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/foreigns.css">
    <link rel="stylesheet" href="css/dataTable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body class='body'>
    <?php 
    require_once 'includes/database.php';
    include_once 'includes/navbar.php';
    $voitures = $sqlState->query('SELECT * FROM voitures');
    $voitures_data = $voitures->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $voiture = $sqlState->prepare("DELETE FROM voitures WHERE id=?");
        $voiture->execute([$id]);
    }
    
    ?>
<div class="container">
<table class="table" border=1>
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Marque</th>
      <th scope="col">Modele</th>
      <th scope="col">Version</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($voitures_data as $car){
        echo '
        <tr>
            <td><span class="badge rounded-pill bg-info text-light">'.$car->id.'</span></td>
            <td>'.$car->marque.'</td>
            <td>'.$car->matricule.'</td>';
            if($car->modele >= 2018){
              echo '<td><span class="badge  bg-success text-light">'.$car->modele.'</td>';
            }elseif($car->modele < 2018 && $car->modele > 2010){
              echo '<td><span class="badge  bg-warning text-light">'.$car->modele.'</td>';
            }else{
              echo '<td><span class="badge  bg-danger text-light">'.$car->modele.'</td>';

            }
        ?>
        <td>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $car->id; ?>">
                <input type='submit' formaction='delete.php'  class='delete text-light' name='delete' value='Delete' onclick='return confirm("Do You Want To delete This Car?")'>
                <input type='submit' formaction='edit.php'  class='update text-dark' name='modifier' value='Edit'>
            </form>
        </td>
        <?php
    }
    
    ?>
  </tbody>
</table>
</div>
</body>
</html>
