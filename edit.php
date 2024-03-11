<?php
require_once 'includes/database.php'; // Include your database connection
include_once 'includes/navbar.php';

// Initialize $car variable
$car = null;
if(!isset($_POST['modifier'])){
    header('location:home.php');
};
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $voiture = $sqlState->prepare("SELECT * FROM voitures WHERE id=?");
    $voiture->execute([$id]);
    $car = $voiture->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $marque = $_POST['marque'];
    $matricule = $_POST['matricule'];
    $modele = $_POST['modele'];

    try {
        $update = $sqlState->prepare("UPDATE voitures SET marque=:marque, matricule=:matricule, modele=:modele WHERE id=:id");
        $update->bindParam(':id', $id);
        $update->bindParam(':marque', $marque);
        $update->bindParam(':matricule', $matricule);
        $update->bindParam(':modele', $modele);
        $update->execute();
        header("Location: home.php"); // Redirect to the page where the table is displayed
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); // Output any errors
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/foreigns.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Car</title>
</head>
<body>
<div class="container">
    <h2 align='center'>Edit Car</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" class="form-control" id="marque" name="marque" value="<?php echo isset($car) ? $car->marque : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="matricule" class="form-label">Modele</label>
            <input type="text" class="form-control" id="matricule" name="matricule" value="<?php echo isset($car) ? $car->matricule : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="modele" class="form-label">Version</label>
            <input type="text" class="form-control" id="modele" name="modele" value="<?php echo isset($car) ? $car->modele : ''; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo isset($car) ? $car->id : ''; ?>">
        <button type="submit" class="delete" name="return">Return</button>
        <button type="submit" class="update text-dark" name="update" >Update</button>
   
    </form>
</div>
</body>
</html>
