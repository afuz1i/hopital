

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
        }
        
        .form {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 1s;
        }
        
        .back_btn {
            display: inline-block;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-bottom: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        
        .back_btn:hover {
            background-color: #0056b3;
        }
        
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        
        .erreur_message {
            color: #ff0000;
            margin-bottom: 20px;
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
       
        select{

            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }    



        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            display: inline-block;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <?php 
    // verifier que le bouton ajouter a bien été cliqué 
    if(isset($_POST['button'])){
        // extraction des informations envoyées dans des variables par la méthode POST
        extract($_POST);
        // vérifier que tous les champs ont été remplis 
        if(isset($nom) && isset($prenom) && isset($age) && isset($sexe)){
            // connexion à la base 
            include_once "connexion.php";

            // requête d'ajout
            $req = mysqli_query($con, "INSERT INTO patient VALUES(NULL, '$nom', '$prenom', '$age', '$sexe')");
            if($req){
                // si la requête a été effectuée avec succès, on fait la redirection 
                // header("location:index.php");
                $message = "Patient ajouté";
            }else{
                // si non
                $message = "Patient non ajouté";
            }
        }else{
            // si non
            $message  = "Veuillez remplir tous les champs !";
        }
    }
    ?>
    <div class="form">
        <a href="conn.php" class="back_btn"><img src="images/icons8_right_40px.png">Suivant</a>
        <h2>Ajouter un Patient</h2>
        <p class="erreur_message">
            <?php
            // si la variable message existe, affichons son contenu 
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" required>
            <label for="">Prénom</label>
            <input type="text" name="prenom" required>
            <label>Age</label>
            <input type="number" name="age" required>
            <label for="">Sexe</label>
            <select class="form-control" name="sexe" id="sexe"   required>
                <option value="masculin" >Masculin</option>
                <option value="feminin">Féminin</option>
            </select>
            
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>