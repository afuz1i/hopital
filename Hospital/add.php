<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hopital";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$region = $_POST['region'];
$sexe = $_POST['sexe'];
$ville = $_POST['ville'];
$arrondissement = $_POST['arrondissement'];
$choix_hopital = $_POST['choix_hopital'];
$rencontre = $_POST['rencontre'];
$domaine_souhaiter = $_POST['domaine_souhaiter'];
$temps_passage = $_POST['temps_passage'];
$horaire = $_POST['horaire'];
$frais_consultation = $_POST['frais_consultation'];
$moyen_paiement = $_POST['moyen_paiement'];
$message = $_POST['message'];
// Insérer les données dans la base de données
$sql = "INSERT INTO rendezvous (nom, prenom, age, region, sexe, ville, arrondissement, choix_hopital, rencontre, domaine_souhaiter, temps_passage, horaire, frais_consultation, moyen_paiement, message)
        VALUES ('$nom', '$prenom', '$age', '$region', '$sexe', '$ville', '$arrondissement', '$choix_hopital', '$rencontre', '$domaine_souhaiter', '$temps_passage', '$horaire', '$frais_consultation', '$moyen_paiement',  '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Rendez-vous enregistré avec succès!";
} else {
    echo "Erreur lors de l'enregistrement du rendez-vous: " . mysqli_error($conn);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>