<?php
session_start();
include "cnx.php";

if(isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $new_password = $_GET['new_password'];
    // يمكنك تحديث الحقول الأخرى هنا مثل كلمة المرور الجديدة ورفع صورة الملف الشخصي

    // تحديث المعلومات في قاعدة البيانات
    $update_query = mysqli_query($link, "UPDATE client SET Nom='$username' WHERE CIN={$_SESSION['CIN']} AND motDePasse='$password'");
    if($update_query) {
      
        // تحديث المعلومات بنجاح
        //echo "تم تحديث المعلومات بنجاح.";
        
    if(isset($_GET['new_password']) && !empty($_GET['new_password'])) {
        $new_password = $_GET['new_password'];
        // قم بتحديث كلمة المرور في قاعدة البيانات
        $update_password_query = mysqli_query($link, "UPDATE client SET motDePasse='$new_password' WHERE CIN={$_SESSION['CIN']}");
        if($update_password_query) {
          echo "تم تحديث المعلومات بنجاح.";
        }
    }
}
else {
    // خطأ في عملية التحديث
    echo "حدث خطأ أثناء تحديث المعلومات.";
}
}
?>




