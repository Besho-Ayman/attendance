function submitAttendance() {
    var studentID = document.getElementById("studentID").value;
    var status = document.getElementById("status").value;

    // إرسال البيانات إلى ملف PHP باستخدام XMLHttpRequest أو fetch
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process_attendance.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    // يمكنك إضافة أي بيانات إضافية هنا
    var data = "studentID=" + studentID + "&status=" + status;

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // يمكنك تحديث واجهة المستخدم أو إظهار رسالة نجاح
            alert("تم تسجيل الحضور/الغياب بنجاح!");
        }
    };

    xhr.send(data);
}
