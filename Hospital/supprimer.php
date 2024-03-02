<?php 
// connexion a la base de données 
include_once "connexion.php";

// recupération de l'id dans le lien 
$id = $_GET['id'];
$req = mysqli_query($con, "DELETE FROM patient WHERE id=$id");
// redirection vers la page.php

header("location:index.php")

?>