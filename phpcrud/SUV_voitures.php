<?php
require_once 'config.php';
$sql = "SELECT * FROM voiture WHERE type = 'SUV'";
$voitures = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ecommerce Website</title>
</head>
<body>
    <?php
    include_once 'header.php';
    ?>

    <main>
        <?php
        while($row = mysqli_fetch_assoc($voitures)) {
            ?>
            <div class="card">
                <div class="image">
                    <img src="uploaded_img/<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </p>

                    <p> Marque : <?php echo $row["marque"]; ?> </p>
                    <p> Model : <?php echo $row["model"]; ?> </p>
                    <p> Couleur : <?php echo $row["couleur"]; ?> </p>
                    <p> Energie : <?php echo $row["energie"]; ?> </p>
                    <p> Boite : <?php echo $row["boite"]; ?> </p>
                    <p> Nembre de porte : <?php echo $row["porte"]; ?> </p>
                </div>
                <button class="add" data-id="<?php echo $row["prix"]; ?>"><?php echo $row["prix"]; ?>,00 DZD/Jour</button>
            </div>
            <?php
        }
        ?>
    </main>
</body>
</html>
