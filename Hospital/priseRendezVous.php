<!-- index.php -->
<html>
<head>
    <title>Formulaire de rendez-vous</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #ff0000;
            padding-top: 40px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 20px;
            color: #0000ff;
        }

        .form-control {
            width: 100%;
            height: 40px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
        }

        select.form-control {
            height: 40px;
        }

        .form-check {
            margin-bottom: 10px;
        }

        .btn {
            font-size: 18px;
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #990000;
        }

        .remarque {
            font-size: 14px;
            color: #999;
            margin-top: 20px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 28px;
            }

            label {
                font-size: 18px;
            }

            .form-control,
            select.form-control {
                height: 35px;
                font-size: 14px;
            }

            .btn {
                font-size: 16px;
                padding: 8px 16px;
            }

            .remarque {
                font-size: 12px;
            }

            table {
                font-size: 12px;
            }

            td {
                padding: 5px;
            }
        }
    </style>
</head>
<body>




<div class="container">
    <h1>Formulaire de rendez-vous</h1>
    <form id="rendez-vous-form"" action="var.php" method="post">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" name="prenom" id="prenom" required>
        </div>
        <div class="form-group">
            <label for="age">Âge:</label>
            <input type="number" class="form-control" name="age" id="age" required>
        </div>
        <div class="form-group">
            <label for="sexe">Sexe:</label>
            <select class="form-control" name="sexe" id="sexe" required>
                <option value="masculin">Masculin</option>
                <option value="feminin">Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="region">Région:</label>
            <select class="form-control" name="region" id="region" required>
                <option value="centre">Centre</option>
                <option value="littoral">Littoral</option>
                <option value="nord">Nord</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ville">Ville:</label>
            <select class="form-control" name="ville" id="ville" required>
                <option value="douala">Douala</option>
                <option value="yaounde">Yaoundé</option>
                <option value="douala">Buea</option>
                <option value="yaounde">Dschang</option>
            </select>
        </div>
        <div class="form-group">
            <label for="arrondissement">Arrondissement :</label>
            <select class="form-control" id="arrondissement" name="arrondissement" onchange="populateHospitals()" required>
            <option value="arrondisement0">...</option>
                <option value="arrondisement1">Douala 1er</option>
                <option value="arrondisement2">Douala 2e</option>
                <option value="arrondisement3">Douala 3e</option>
                <option value="arrondisement4">Douala 4e</option>
                <option value="arrondisement5">Douala 5e</option>
            </select>
        </div>
        <div class="form-group">
            <label for="choix_hopital">Choix de l'hôpital :</label>
            <select class="form-control" id="choix_hopital" name="choix_hopital" required>
            </select>
        </div>
        
        <div class="form-group">
    <label>Choix du docteur :</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="docteur" id="specialiste" value="specialiste" required>
        <label class="form-check-label" for="specialiste">Spécialiste</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="docteur" id="generaliste" value="generaliste" required onclick="showGeneralisteList()">
        <label class="form-check-label" for="generaliste">Généraliste</label>
    </div>
</div>

<div class="form-group">
    <label for="choix_docteur">Choix du médecin :</label>
    <select class="form-control" id="choix_docteur" name="choix_docteur" required>
    </select>
</div>
        <div class="form-group">
            <label for="choix_specialite">Choix de la spécialité:</label>
            <select class="form-control" name="choix_specialite" id="choix_specialite" required>
                <option value="dentiste">Dentiste</option>
                <option value="cardiologue">Cardiologue</option>
                <option value="pediatre">Pediatre</option>
                <option value="Dermatologue">Dermatologue</option>
                <option value="Chirugie_générale">Chirugie_générale</option>
                <option value="neurologue">Neurologue</option>
                <option value="Oncologue">Oncologue</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>
        <div class="form-group">
           
            <table>
            <div class="form-group">
            <label for="horaire">Horaire:</label>
            <table class="horaire-table">
                <tr>
                    <td><label><input type="radio" name="horaire" value="Lundi  08h-45"> Lundi 08h-45</label></td>
                    <td><label><input type="radio" name="horaire" value="Lundi  09h-30"> Lundi 09h-30</label></td>
                    <td><label><input type="radio" name="horaire" value="Lundi  10h-15"> Lundi10h-15</label></td>
                    <td><label><input type="radio" name="horaire" value="Lundi  11h-40"> Lundi 11h-40</label></td>
                    <td><label><input type="radio" name="horaire" value="Lundi  12h-15"> Lundi 12h-15</label></td>
                    <td><label><input type="radio" name="horaire" value="Lundi  12h-40"> Lundi 12h-40</label></td>
                    <td><label><input type="radio" name="horaire" value="Lundi  13h-15"> Lundi 13h-15</label></td>
                </tr>  
                <tr>
                    <td><label><input type="radio" name="horaire" value=" Mardi  08h-45"> Mardi  08h-45</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mardi  09h-30"> Mardi 09h-30</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mardi  10h-15"> Mardi 10h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mardi  11h-40"> Mardi 11h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mardi  12h-15"> Mardi 12h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mardi  12h-40"> Mardi 12h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mardi  13h-15"> Mardi 13h-15</label></td>
                </tr>  

                <tr>
                    <td><label><input type="radio" name="horaire" value=" Mercredi  08h-45">  Mercredi  08h-45</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mercredi  09h-30"> Mercredi 09h-30</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mercredi  10h-15">  Mercredi10h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mercredi  11h-40"> Mercredi 11h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mercredi  12h-15"> Mercredi 12h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mercredi  12h-40">  Mercredi 12h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Mercredi  13h-15"> Mercredi 13h-15</label></td>
                </tr>  

                
                <tr>
                    <td><label><input type="radio" name="horaire" value=" Jeudi 08h-45">  Jeudi 08h-45</label></td>
                    <td><label><input type="radio" name="horaire" value=" Jeudi 09h-30"> Jeudi 09h-30</label></td>
                    <td><label><input type="radio" name="horaire" value=" Jeudi 10h-15">  Jeudi10h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Jeudi  11h-40"> Jeudi 11h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Jeudi  12h-15"> Jeudi12h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Jeudi 12h-40">  Jeudi 12h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Jeudi 13h-15"> Jeudi 13h-15</label></td>
                </tr>  
                
                <tr>
                    <td><label><input type="radio" name="horaire" value="Vendredi08h-45">  Vendredi  08h-45</label></td>
                    <td><label><input type="radio" name="horaire" value="Vendredi  09h-30"> Vendredi 09h-30</label></td>
                    <td><label><input type="radio" name="horaire" value=" Vendredi 10h-15"> Vendredi10h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Vendredi 11h-40"> Vendredi 11h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Vendredi  12h-15"> Vendredi 12h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Vendredi 12h-40">  Vendredi 12h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Vendredi  13h-15"> Vendredi 13h-15</label></td>
                </tr>  
                <tr>
                    <td><label><input type="radio" name="horaire" value="Samedi 08h-45"> Samedi  08h-45</label></td>
                    <td><label><input type="radio" name="horaire" value="Samedi  09h-30"> Samedi 09h-30</label></td>
                    <td><label><input type="radio" name="horaire" value=" Samedi 10h-15"> Samedi 10h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Samedi 11h-40"> Samedi 11h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Samedi  12h-15"> Samedi 12h-15</label></td>
                    <td><label><input type="radio" name="horaire" value="Samedi  12h-40">  Samedi 12h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Samedi 13h-15"> Samedi 13h-15</label></td>
                </tr>  
                <tr>
                    <td><label><input type="radio" name="horaire" value="Dimanche 08h-45">  Dimanche  08h-45</label></td>
                    <td><label><input type="radio" name="horaire" value="Dimanche  09h-30"> Dimanche 09h-30</label></td>
                    <td><label><input type="radio" name="horaire" value=" Dimanche 10h-15"> Dimanche 10h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Dimanche 11h-40">Dimanche 11h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Dimanche  12h-15"> Dimanche 12h-15</label></td>
                    <td><label><input type="radio" name="horaire" value=" Dimanche 12h-40">  Dimanche 12h-40</label></td>
                    <td><label><input type="radio" name="horaire" value=" Dimanche  13h-15"> Dimanche 13h-15</label></td>
                </tr>  
                
            </table>
        </div>
        <div class="form-group">
            <label for="telephone">Numéro de téléphone:</label>
            <input type="tel" class="form-control" name="telephone" id="telephone" required>
        </div>
        <div class="form-group">
            <label for="paiement">Mode de paiement:</label>
            <select class="form-control" name="paiement" id="paiement" required>
                <option value="OM">Orange Money</option>
                <option value="MTN MOMO">MTN Mobile Money</option>
            </select>
        </div>

        <div class="form-group">
            <label for="frais">Frais de Consultation:</label>
            <select class="form-control" name="frais" id="frais" required>
                <option value="3000">3000/Generaliste</option>
                <option value="5000">5000/Specialiste</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="button">Envoyer</button>
        <!-- <button type="reset" class="btn btn-primary" style="position: relative;left:899px;">Annuler</button> -->
    </form>
    <p class="remarque"><em style="text-decoration: underline;">NB:</em> Veuillez noter que des frais de remboursement de 10% seront appliqués en cas d'annulation.</p>
    <p class="remarque" >Bien vouloir envoyer de l'argent au numéro suivant *658968639(Orange Money) & *681511128(MTN Mobile Money).</p>
    <p class="remarque"> <em style="text-decoration: underline;">RQ:</em>Le choix d'un docteur Specialiste est obligatoire même si un docteu n'est pas valider selectionner sur les trois points </p>
</div>

<!-- </div> <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>  -->
<script>   function populateHospitals() { var arrondissement = document.getElementById("arrondissement").value; var choix_hopital = document.getElementById("choix_hopital");   choix_hopital.innerHTML = "";   if (arrondissement === "arrondisement1") { var option1 = document.createElement("option"); option1.text = "Hôpital Laquintinie"; choix_hopital.add(option1); 
var option2 = document.createElement("option"); option2.text = "Hôpital Général de Douala"; choix_hopital.add(option2); } else if (arrondissement === "arrondisement2") 
{ var option3 = document.createElement("option"); option3.text = "Hôpital de District de Nylon"; choix_hopital.add(option3); var option4 = document.createElement("option"); option4.text = "Hôpital de la cité des palmiers"; choix_hopital.add(option4); } 
else if (arrondissement === "arrondisement3") 
{ var option5 = document.createElement("option"); option5.text = "Hôpital Laquitinie "; choix_hopital.add(option5); var option6 = document.createElement("option"); option6.text = "Centre de santé d'Akwa Nord"; choix_hopital.add(option6);  }    
else if (arrondissement === "arrondisement4") 
{ var option7 = document.createElement("option"); option7.text = "Hôpital Général de Douala Deîdo "; choix_hopital.add(option7); var option8 = document.createElement("option"); option8.text = "Centre Médical d'Arrondissement de Deîdo"; choix_hopital.add(option8);  } 
else if (arrondissement === "arrondisement5") 
{ var option9 = document.createElement("option"); option9.text = "Hôpital Général de Douala Bonapriso"; choix_hopital.add(option9);  var option10= document.createElement("option"); option10.text = "Clinique Bonapriso"; choix_hopital.add(option10); var option11= document.createElement("option"); option11.text = "Centre Médical d'Arrondissement de Bonapriso"; choix_hopital.add(option11);  } 
// else if (arrondissement === "arrondisement6") 
// { var option11 = document.createElement("option"); option11.text = "Hôpital 11"; choix_hopital.add(option11); var option12 = document.createElement("option"); option12.text = "Hôpital 12"; choix_hopital.add(option12);  } 
      }  $("#rendez-vous-form").submit(function (event) { event.preventDefault(); $.ajax({ url: "submit.php", type: "post", data: $("#rendez-vous-form").serialize(), success: function () {  $("#success-message").show();  $("#rendez-vous-form")[0].reset(); } }); }); </script>
<!-- <script>
    document.getElementById("rendez-vous-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission

  // Get the values from the form fields
  var nom = document.getElementById("nom").value;
  var prenom = document.getElementById("prenom").value;
  var age = document.getElementById("age").value;
  var sexe = document.getElementById("sexe").value;
  var region = document.getElementById("region").value;
  var ville = document.getElementById("ville").value;
  var arrondissement = document.getElementById("arrondissement").value;
  var choix_hopital = document.getElementById("choix_hopital").value;
  var docteur = document.querySelector('input[name="docteur"]:checked').value;
  var choix_docteur = document.getElementById("choix_docteur").value;
  var choix_specialite = document.getElementById("choix_specialite").value;
  var date = document.getElementById("date").value;
  var horaire = document.querySelector('input[name="horaire"]:checked').value;

  // Display the success message
  alert("Enregistrement OK");
});
</script> -->
<script>
    function showGeneralisteList() {
        var selectDocteur = document.getElementById("choix_docteur");
        selectDocteur.innerHTML = ""; // Réinitialiser la liste des médecins

        // Ajouter les options des médecins généralistes
        var generalisteOptions = [
            { value: "docteur0", label: "..." },
            { value: "docteur1", label: "Docteur 1" },
            { value: "docteur2", label: "Docteur 2" },
            { value: "docteur3", label: "Docteur 3" }
            // Ajoutez d'autres médecins généralistes si nécessaire
        ];

        for (var i = 0; i < generalisteOptions.length; i++) {
            var option = document.createElement("option");
            option.value = generalisteOptions[i].value;
            option.text = generalisteOptions[i].label;
            selectDocteur.appendChild(option);
        }
    }
</script>

</body>
</html>

