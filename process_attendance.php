<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// فحص الاتصال
$name = $_POST['name'];
$level = $_POST['level'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$currentDateTime = date('Y-m-d H:i:s');

// إجراء عملية الإدراج
$sql = "INSERT INTO ends (name, level, phone, address, data) VALUES ('$name', '$level', '$phone', '$address', '$currentDateTime')";
if ($conn->query($sql) === TRUE) {
    echo "تمت عملية الإدراج بنجاح";

    // Get the last inserted ID
    $lastID = $conn->insert_id;

    // Update the attendance columns dynamically
    for ($i = 1; $i <= 3; $i++) {
        $attendanceColumnName = "attendance0$i";
        $attendanceValue = isset($_POST[$attendanceColumnName]) ? $_POST[$attendanceColumnName] : 'No';
        $updateSQL = "UPDATE end SET $attendanceColumnName = '$attendanceValue' WHERE id = $lastID";
        $conn->query($updateSQL);
    }
} else {
    echo "خطأ في عملية الإدراج: " . $conn->error;
}


$conn->close();



?>
