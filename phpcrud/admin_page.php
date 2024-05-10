<?php

@include 'config.php';

if(isset($_POST['Ajouter'])){

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

   if(empty($marque) || empty($model) || empty($couleur)|| empty($matricule) || empty($energie)|| empty($boite) || empty($type)|| empty($porte) || empty($prix)|| empty($image) ){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO voiture(marque,model,couleur,matricule,energie,boite,type,porte,prix,image) VALUES('$marque', '$model', '$couleur', '$matricule', '$energie', '$boite', '$type', '$porte', '$prix', '$image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM voiture WHERE id = $id");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

<div class="admin-product-form-container">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <h3>Ajoutez une nouvelle voiture</h3>
        <input type="text" placeholder="Entrez la marque" name="marque" class="box">
        <input type="text" placeholder="Entrez le modèle" name="model" class="box">
        <input type="text" placeholder="Entrez la couleur" name="couleur" class="box">
        <input type="number" placeholder="Entrez le matricule" name="matricule" class="box">
        <input type="text" placeholder="Entrez le type d'énergie" name="energie" class="box">
        <input type="text" placeholder="Entrez le type de boîte" name="boite" class="box">
        <select name="type" class="box">
            <option value="Luxe">Luxe</option>
            <option value="SUV">SUV</option>
            <option value="Sport">Sport</option>
        </select>
        <input type="number" placeholder="Entrez le nombre de portes" name="porte" class="box">
        <input type="number" placeholder="Entrez le prix" name="prix" class="box">
        <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
        <input type="submit" class="btn" name="Ajouter" value="Ajouter">
    </form>
</div>


   <?php

   $select = mysqli_query($conn, "SELECT * FROM voiture");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>image</th>
            <th>marque</th>
            <th>model</th>
            <th>couleur</th>
            <th>matricule</th>
            <th>energie</th>
            <th>boite</th>
            <th>type</th>
            <th>nombre de portes</th>
            <th>prix/jour</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['marque']; ?></td>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo $row['couleur']; ?></td>
            <td><?php echo $row['matricule']; ?></td>
            <td><?php echo $row['energie']; ?></td>
            <td><?php echo $row['boite']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['porte']; ?></td>
            <td><?php echo $row['prix']; ?>.00DZD/Jour</td>
            <td>
                  <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                  <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>

         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>