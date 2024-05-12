<?php
session_start();
include "cnx.php";

$error_message = "";

if(isset($_GET["Nom"]) && isset($_GET["Prénom"]) && isset($_GET["Email"]) && isset($_GET["Motdepasse"]) && isset($_GET["Datedenaissance"]) && isset($_GET["Numerodetéléphone"])) {
    $Nom = $_GET["Nom"];
    $prénom = $_GET["Prénom"];
    $email = $_GET["Email"];
    $mdp = $_GET["Motdepasse"];
    $date = $_GET["Datedenaissance"];
    $téléphone = $_GET["Numerodetéléphone"];
  
    // Vérifier si les champs ne sont pas vides
    if(empty($Nom) || empty($prénom) || empty($email) || empty($mdp) || empty($date) || empty($téléphone)) {
        $error_message = "Tous les champs sont obligatoires!";
    }
    else {
        // Vérification de l'e-mail unique
        $verify_query = mysqli_query($link,"SELECT Email FROM client WHERE Email='$email'");
        if(mysqli_num_rows($verify_query) != 0 ){
            $error_message = "Cet e-mail est déjà utilisé, veuillez en choisir un autre!";
        }
        else {
            // Insertion des données dans la base de données
            $req = mysqli_query($link,"INSERT INTO client(Nom,Prénom,Téléphone,Email,motDePasse,DateDeNaissance) VALUES ('$Nom','$prénom','$téléphone','$email','$mdp','$date')") or die("Erreur lors de l'insertion");
            if($req){
                // تخزين اسم المستخدم في الجلسة
                $_SESSION['Nom'] = $Nom;
                header("Location: index.php"); // Redirection vers index.php en cas de succès
                exit();
            }
            else {
               $error_message = "Erreur d'insertion";
            }
        }
    }
}

// Afficher le message d'erreur
if(!empty($error_message)) {
    // إذا كان هناك خطأ، يمكنك توجيه المستخدم إلى صفحة الخطأ أو طباعة رسالة الخطأ
    header ("Location: erreur.html");
    exit();
}
?>
