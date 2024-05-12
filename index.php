<?php
session_start();
// التحقق مما إذا كانت الجلسة معرفة ومحملة بقيمة الاسم
if(isset($_SESSION['Nom'])) {
    // استخدام الاسم المخزن في الجلسة بشكل صحيح
    $Nom = $_SESSION['Nom'];
} else {
    // في حالة عدم وجود قيمة محملة في الجلسة، يمكنك توجيه المستخدم لتسجيل الدخول مرة أخرى أو أي عملية أخرى
    header("Location: insert.php");
    exit(); // تأكد من خروج من السكربت بعد عملية التوجيه
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="m.css">
  <title>Type de voiture</title>
</head>
<body>
    <div class="sidenav">
        <ul>
            <li>
                <i class='bx bx-user-circle'></i>
                <!-- عرض اسم المستخدم -->
                <a href="profile.php"><?php echo $Nom; ?></a>
            </li>
        </ul>       
    </div>
    <div class="h"><h2>TYPE DE VOITURE</h2></div>
    <div class="type">
        <div class="bouton"><a href="#" > <img src="resources/b.png" alt="type sport"></a></div>
        <div class="bouton"><a href="#" > <img src="resources/c.png" alt="type LUX"></a></div>
        <div class="bouton"><a href="#" > <img src="resources/d.png" alt="type SUV"></a></a></div>
    </div>
</body>
</html>
