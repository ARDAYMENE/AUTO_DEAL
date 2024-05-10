<?php
@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){
   $marque = $_POST['marque'];
   $model = $_POST['model'];
   $couleur = $_POST['couleur'];
   $matricule = $_POST['matricule'];
   $energie = $_POST['energie'];
   $boite = $_POST['boite'];
   $type = $_POST['type'];
   $porte = $_POST['porte'];
   $prix = $_POST['prix'];
   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   if(empty($marque) || empty($model) || empty($couleur) || empty($matricule) || empty($energie) || empty($boite) || empty($type) || empty($porte) || empty($prix) || empty($image)){
      $message[] = 'please fill out all!';    
   } else {
      $update_data = "UPDATE voiture SET marque='$marque', model='$model', couleur='$couleur', matricule='$matricule', energie='$energie', boite='$boite', type='$type', porte='$porte', prix='$prix', image='$image' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($image_tmp_name, $image_folder);
         header('location:admin_page.php');
      } else {
         $message[] = 'Could not update the product!';
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">
   <div class="admin-product-form-container centered">
      <?php
      $select = mysqli_query($conn, "SELECT * FROM voiture WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){
      ?>
      <form action="" method="post" enctype="multipart/form-data">
         <h3 class="title">Update the product</h3>
         <input type="text" placeholder="Entrez la marque" name="marque" class="box" value="<?php echo $row['marque']; ?>">
         <input type="text" placeholder="Entrez le modèle" name="model" class="box" value="<?php echo $row['model']; ?>">
         <input type="text" placeholder="Entrez la couleur" name="couleur" class="box" value="<?php echo $row['couleur']; ?>">
         <input type="number" placeholder="Entrez le matricule" name="matricule" class="box" value="<?php echo $row['matricule']; ?>">
         <input type="text" placeholder="Entrez le type d'énergie" name="energie" class="box" value="<?php echo $row['energie']; ?>">
         <input type="text" placeholder="Entrez le type de boîte" name="boite" class="box" value="<?php echo $row['boite']; ?>">
         <input type="text" placeholder="Entrez le type de voiture" name="type" class="box" value="<?php echo $row['type']; ?>">
         <input type="number" placeholder="Entrez le nombre de portes" name="porte" class="box" value="<?php echo $row['porte']; ?>">
         <input type="number" placeholder="Entrez le prix" name="prix" class="box" value="<?php echo $row['prix']; ?>">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
         <input type="submit" value="Update product" name="update_product" class="btn">
         <a href="admin_page.php" class="btn">Go back!</a>
      </form>
      <?php }; ?>
   </div>
</div>

</body>
</html>
