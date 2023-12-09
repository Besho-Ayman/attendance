<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);



// استقبال الـ ID من النموذج
$record_id = $_POST['record_id'];

// إجراء عملية الحذف
$sqll = "DELETE FROM ends WHERE id = $record_id";

if ($conn->query($sqll) === TRUE) {
    echo "تم حذف السجل بنجاح";
} else {
    echo "خطأ في عملية الحذف: " . $conn->error;
}

$conn->close();



?>
