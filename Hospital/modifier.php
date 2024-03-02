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

            // connexion a la base d
            include_once "connexion.php";
            // on recupere le id dans le lien 
             $id = $_GET['id'];
            // requete d'ajouer les infos du patients 
            $req = mysqli_query($con, "SELECT * FROM patient WHERE id=$id");
            $row = mysqli_fetch_assoc($req);


    // verifier que le bouton ajouter a bien été cliqué 
    if(isset($_POST['button'])){
            // extraction des informations envoyé  dans des variables par la methode POST
            extract($_POST);
            // verifier que tous les champs onts ete remplis 
            if(isset($nom) && isset($prenom) && $age && isset($sexe)){
                // requete de modification 
                $req = mysqli_query($con, "UPDATE patient SET nom = '$nom' , prenom = '$prenom' , age = '$age', sexe = '$sexe' WHERE id = $id ");

                    if($req){

                        // si la requete a ete effectuée avec succes , on fait la redirection 
                        header("location:index.php");
                    }else{
                        // si non

                        $message = "Patient non Modifiier";
                    }
            }else{
                // si non
                $message  = "veuillez  remplir tous les champs !";
            }
       
    }
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/icons8_left_arrow_100px.png"> Retour</a>
        <h2> Modifier le patient : <?=$row['nom'] ?></h2>
        <p class="erreur_message">
          <?php 
          if(isset($message)){

            echo $message;
          }
          
          
          ?>
        </p>
        <form action="" method="POST">
            <label >Nom</label>
            <input type="text" name="nom" value="<?=$row['nom'] ?>">
            <label for=""> Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom'] ?>">
            <label >Age</label>
            <input type="number" name="age" value="<?=$row['age'] ?>">
            <label for=""> Sexe</label>
            <input type="text" name="sexe" value="<?=$row['sexe'] ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div> 
</body>
</html>