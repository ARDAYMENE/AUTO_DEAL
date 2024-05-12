
<?php
session_start();
include "cnx.php";

if(isset($_GET["Email"])&& isset($_GET["Motdepasse"])) {
   
    $email = $_GET["Email"];
    $password = $_GET["Motdepasse"];
     
    $Nom = $_GET["Nom"];
  

    $sql = "SELECT * FROM client WHERE Email='$email' AND motDePasse='$password'";
   
   
    $result = mysqli_query($link, $sql);
  
      
    if(mysqli_num_rows($result) == 1) {
        $raw =mysqli_fetch_assoc($result);
        if($raw['Role']=='admin'){
           // استدعاء صفحة ادمين
           header ("Location: entre.html");
            exit();
        }
       
       else{
       
       // $_SESSION['Nom'] = $row['Nom'];
       $Nom=$raw['Nom'];
        $_SESSION['Nom']=$Nom;
      
        $_SESSION['CIN'] = $raw['CIN'];
        header("location: index.php");
      
        exit();}
    } else {

        header ("Location: erreur.html");
    }
   
    mysqli_free_result($result);
   
    mysqli_close($link);
 } else {
   
    echo "يرجى ملء جميع الحقول المطلوبة";
}
?>
