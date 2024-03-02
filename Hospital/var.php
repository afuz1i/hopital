<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .presentation {
            text-align: center;
            color: #fff;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            animation: neon 2s infinite;
        }

        @keyframes neon {
            0% { text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000; }
            50% { text-shadow: 0 0 20px #ff0000, 0 0 30px #ff0000; }
            100% { text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000; }
        }

        p {
            font-size: 24px;
            margin-bottom: 40px;
            animation: fade-in 2s;
        }

        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="presentation">
            <?php
            // Connexion à la base de données
            $db_host = "localhost";
            $db_username = "root";
            $db_password = "";
            $db_name = "hopital";

            $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
            if (!$conn) {
                echo '<h1>Échec de la connexion à la base de données:</h1><p class="error-message">' .   mysqli_connect_error() . '</p>';
            } else {
                // Récupérer les valeurs du formulaire
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];
                $sexe = $_POST['sexe'];
                $region = $_POST['region'];
                $ville = $_POST['ville'];
                $arrondissement = $_POST['arrondissement'];
                $choix_hopital = $_POST['choix_hopital'];
                $docteur = $_POST['docteur'];
                $choix_docteur = $_POST['choix_docteur'];
                $choix_specialite = $_POST['choix_specialite'];
                $date = $_POST['date'];
                $horaire = $_POST['horaire'];
                $telephone = $_POST['telephone'];
                $paiement = $_POST['paiement'];
                $frais = $_POST['frais'];

                // Insérer les données dans la base de données
                $sql = "INSERT INTO rendez_vous (nom, prenom, age, sexe, region, ville, arrondissement, choix_hopital, docteur, choix_docteur, choix_specialite, date, horaire, telephone, paiement, frais)
                        VALUES ('$nom', '$prenom', $age, '$sexe', '$region', '$ville', '$arrondissement', '$choix_hopital', '$docteur', '$choix_docteur', '$choix_specialite', '$date', '$horaire', '$telephone', '$paiement', '$frais')";

                if (mysqli_query($conn, $sql)) {
                    echo '<h1>Les données ont été enregistrées avec succès.</h1>';
                } else {
                    echo '<h1>Erreur lors de l\'enregistrement des données:</h1><p class="error-message">' . mysqli_error($conn) . '</p>';
                }

                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
</body>
</html>