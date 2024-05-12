<?php
session_start();
include "seconx.php";
// تحديد قيمة $CIN بشكل صحيح
$CIN = $_SESSION['CIN']; // يجب أن تكون القيمة مخزنة في الجلسة من الصفحة السابقة

// التحقق من وجود بيانات تم تقديمها لتحديث الملف الشخصي
if (isset($_POST['update_profile'])) {
    // استخراج البيانات المرسلة من النموذج
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    // تحديث الاسم والبريد الإلكتروني
    $update_query = mysqli_query($conn, "UPDATE `client` SET Nom = '$update_name', Email = '$update_email' WHERE CIN = '$CIN'");

    // التحقق من نجاح عملية التحديث
    if ($update_query) {
        $message[] = 'تم تحديث الملف الشخصي بنجاح!';
    } else {
        $message[] = 'فشل في تحديث الملف الشخصي!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- رابط ملف ال CSS المخصص -->
    <link rel="stylesheet" href="u.css">
</head>

<body>

    <div class="update-profile">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM `client` WHERE CIN = '$CIN'");
        if (mysqli_num_rows($sql) > 0) {
            $fetch = mysqli_fetch_assoc($sql);
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch['image'] == '') {
                echo '<img src="images/default-avatar.png">';
            } else {
                echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            if (isset($message)) {
                foreach ($message as $msg) {
                    echo '<div class="message">' . $msg . '</div>';
                }
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>اسم المستخدم:</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['Nom']; ?>" placeholder="" class="box">
                    <span>البريد الإلكتروني:</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['Email']; ?>" class="box">
                    <span>تحديث الصورة الشخصية:</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <span>كلمة المرور القديمة:</span>
                    <input type="password" name="old_pass" placeholder="أدخل كلمة المرور السابقة" class="box">
                    <span>كلمة مرور جديدة:</span>
                    <input type="password" name="update_pass" placeholder="أدخل كلمة مرور جديدة" class="box">
                    <span>تأكيد كلمة المرور:</span>
                    <input type="password" name="confirm_pass" placeholder="تأكيد كلمة المرور الجديدة" class="box">
                </div>
            </div>
            <input type="submit" value="تحديث" name="update_profile" class="btn">
            <a href="home.php" class="delete-btn">إلغاء</a>
        </form>
    </div>

</body>

</html>
