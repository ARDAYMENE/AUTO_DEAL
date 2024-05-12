<?php
session_start();
if(isset($_SESSION['Nom'])) {
    $Nom = $_SESSION['Nom'];
    // استخدام قيمة $Nom بشكل صحيح
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="Pro.css">
    <!-- Icon Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">

        <input type="checkbox" id="click">
        <label for="click">
            <i class='menu-btn bx bx-menu'></i>
            <i class='close-btn bx bx-x-circle'></i>
        </label>

        <div class="sidenav">
            <div class="logo">
                <h2>Auto Deal </h2>
            </div>

            <div class="search_bar">
                <form action="#">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search...">
                </form>
            </div>

            <div class="menu_text">
                <p>Menu</p>
            </div>

            <div class="icon_items">
                <ul>
                    <li class="active">
                        <i class='bx bxs-home'></i>
                        <a href="#">Accuiel</a>
                    </li>
                    <li>
                        <i class='bx bx-user-circle'></i>
                        <a href="editeprofil1.html"><?php echo $Nom; ?></a>
                    </li>
                    <li>
                        <i class='bx bx-chat'></i>
                        <a href="#">Message</a>
                    </li>
                    <li>
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <a href="#">Activité</a>
                    </li>
                    <li>
                        <i class='bx bxs-shopping-bag'></i>
                        <a href="index.php">Products</a>
                    </li>
                    <li>
                        <i class='bx bxs-bell'></i>
                        <a href="#">Notification</a>
                    </li>
                   
                    <li>
                        <i class='bx bxs-help-circle' ></i>
                        <a href="#">Aide</a>
                    </li>
                    <li>
                        <i class='bx bxs-cog'></i>
                        <a href="#">Setting</a>
                    </li>
                    <li>
                        <i class='bx bx-log-in'></i>
                        <a href="accueil.html">Déconnecté</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>