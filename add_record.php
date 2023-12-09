<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال الـ ID وتاريخ الحضور واسم العمود من النموذج
$record_id = $_POST['record_id'];
// $record_date = $_POST['record_date'];
$user_provided_column = $_POST['attendance_column'];
$attendance_column = 'attendance0' . $user_provided_column;
// $attendance_column = $_POST['attendance_column'];
$attendance_date = date('Y-m-d H:i:s');

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// إجراء عملية التحديث
$sql = "UPDATE ends SET $attendance_column = '$attendance_date' WHERE id = '$record_id' AND $attendance_column = '0000-00-00'";

if ($conn->query($sql) === TRUE) {
    echo "تم تحديث التاريخ بنجاح";
} else {
    echo "خطأ في عملية التحديث: " . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
