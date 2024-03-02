<?php 
// demarrage de la session 
session_start();

if (isset($_POST['boutton-valider'])){
// si on clique sur le bouton: alors 


//  nous allons verifier les information du formulaire 

if(isset($_POST['email']) && isset($_POST['mdp'])){
    // verification
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$erreur = ""; 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_base_données = "hopital";
$con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_données);
// requete de selection de tous ls users 

$req = mysqli_query($con, "SELECT * FROM admins WHERE email='$email' AND mdp ='$mdp' ");
$num_ligne  = mysqli_num_rows($req); // compter le nombre rpa
if($num_ligne > 0 ){
    header("location: index.php"); // si le nombre de ligne est >0 , on sera rediger vers la page bienvenu
    // nous allons créér une variable de type session qui vas contenir l'email de users 
    $_SESSION['email'] = $email;


}else{
     $erreur = "Adresse Mail ou Mots de passe Incorrectes !";
   
}

}

}

?>    
    
    
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login enregistration</title>
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style></style>
</head>
<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <div class="from-box login ">
            <h2> Login</h2>
            <?php 
            
            if(isset($erreur)){

                echo "<p class='Erreur'>".$erreur ."</p>";
            }
            
            
            ?>
            <form action="" method="POST"> <!-- on ne met rien au niveau de l'action , pour pouvoir envoyé les données dans les même pages -->
                <div class="input-box">
                    <input type="text" name="email" required>
                    <label > Adresse Mail </label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="mdp" required>
                    <label > Mots de passe  </label>
                    <i class='bx bxs-lock-alt' ></i>
                </div>  
                    <button type="submit" class="btn" value="valider" name="boutton-valider">Login</button>
                    <div class="logreg-link">
                        <p>Vous n'avez pas de compte ? <a href="#" class="register-link"> Sign Up </a></p>
                    </div>
            </form>

        </div>
        <div class="info-text login ">
            <h2>Bienvenue</h2>
        
        </div>
    </div>
</body>
</html>