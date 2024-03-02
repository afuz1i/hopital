<!DOCTYPE html>
<html>
<head>
    <title>Tableau des rendez-vous</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeIn 1s;
        }
        
        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }
        
        th {
            background-color: #007bff;
            color: #fff;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Âge</th>
            <th>Sexe</th>
            <th>Région</th>
            <th>Ville</th>
            <th>Arrondissement</th>
            <th>Choix de l'hôpital</th>
            <th>Docteur</th>
            <th>Choix du médecin</th>
            <th>Choix de la spécialité</th>
            <th>Date</th>
            <th>Horaire</th>
            <th>Numéro de téléphone</th>
            <th>Mode de paiement</th>
            <th>Frais de Consultation</th>
        </tr>
        <?php
        // Connexion à la base de données
        $db_host = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "hopital";

        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
        if (!$conn) {
            die("Échec de la connexion à la base de données: " . mysqli_connect_error());
        }

        // Récupérer les données de la base de données
        $sql = "SELECT * FROM rendez_vous";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['sexe'] . "</td>";
                echo "<td>" . $row['region'] . "</td>";
                echo "<td>" . $row['ville'] . "</td>";
                echo "<td>" . $row['arrondissement'] . "</td>";
                echo "<td>" . $row['choix_hopital'] . "</td>";
                echo "<td>" . $row['docteur'] . "</td>";
                echo "<td>" . $row['choix_docteur'] . "</td>";
                echo "<td>" . $row['choix_specialite'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['horaire'] . "</td>";
                echo "<td>" . $row['telephone'] . "</td>";
                echo "<td>" . $row['paiement'] . "</td>";
                echo "<td>" . $row['frais'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='15'>Aucune donnée trouvée.</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>