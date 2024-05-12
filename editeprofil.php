<?php
session_start();
include "cnx.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // يمكنك تحديث الحقول الأخرى هنا مثل كلمة المرور الجديدة ورفع صورة الملف الشخصي

    // تحديث المعلومات في قاعدة البيانات
    $update_query = mysqli_query($link, "UPDATE users SET username='$username' WHERE id={$_SESSION['user_id']} AND password='$password'");
    if($update_query) {
        // تحديث المعلومات بنجاح
        echo "تم تحديث المعلومات بنجاح.";
    } else {
        // خطأ في عملية التحديث
        echo "حدث خطأ أثناء تحديث المعلومات.";
    }
}
?>
