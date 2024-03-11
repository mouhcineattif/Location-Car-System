<?php 
require_once 'includes/database.php';
$id = $_POST['id'];
$sqlStatement = $sqlState->prepare('DELETE FROM voitures WHERE id=?');
$delete = $sqlStatement->execute([$id]);
header('location:home.php');

