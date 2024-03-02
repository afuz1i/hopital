<!DOCTYPE html>
<html>
<head>
    <title>Tableau des rendez-vous</title>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
    <div class="container">
        <?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hopital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Requête de sélection des rendez-vous
$sql = "SELECT specialite, ville, quartier, sexe, nompatient FROM assistant";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage du tableau des rendez-vous
    echo "<h1>Tableau des rendez-vous</h1>";
    echo "<table>
            <tr>
                <th>Spécialité</th>
                <th>Ville</th</th>
                <th>Quartier</th>
                <th>Sexe</th>
                <th>Nom du patient</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['specialite']."</td>
                <td>".$row['ville']."</td>
                <td>".$row['quartier']."</td>
                <td>".$row['sexe']."</td>
                <td>".$row['nompatient']."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Aucun rendez-vous trouvé.";
}

$conn->close();
?>

        <br><br>

        <!-- <a href="index.php">Retour à la page de sélection</a> -->
    </div>
</body>
</html>