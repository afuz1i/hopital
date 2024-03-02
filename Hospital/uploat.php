
// Vérifier si le formulaire a été soumis
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Vérifier s'il y a une image téléversée
//     if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
//         $targetDir = "images/1.jpg"; // Répertoire de destination des images
//         $targetFile = $targetDir . basename($_FILES["image"]["name"]); // Chemin complet du fichier cible

//         // Vérifier si le fichier est une image réelle
//         $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
//         $allowedExtensions = array("jpg", "jpeg", "png", "gif");
//         if (in_array($imageFileType, $allowedExtensions)) {
//             // Déplacer le fichier téléversé vers le répertoire de destination
//             echo "correct type de fichier";
//             if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
//                 echo "L'image a été téléversée avec succès.";
//             } else {
//                 echo "Une erreur s'est produite lors du téléversement de l'image.";
//             }
//         } else {
//             echo "Seules les images de type JPG, JPEG, PNG et GIF sont autorisées.";
//         }
//     } else {
//         echo "Aucune image n'a été téléversée.";
    }
}
