<?php 
$email = $_POST['email'];
$pass= $_POST['pass'];
//CONECT DATABASE 
$con = new mysqli("localhost","root","","mis");
//CHECK CONECT DATABASE 
if ($con->connect_error) {
    die("Faild to connect : ".$con->connect_error);
} else {
    $stmt = $con->prepare("select * from login where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data ['pass'] === $pass){
            echo "<h1 style='text-align:center; color:yellow; margin:250px 0;font-size:85px;background-color:#e9393985;'>تم تسجيل الدخول بنجاح </h1>";
            echo "<a href='./select.html' style='font-size:30px; display:flex; justify-content:center; color:white;'>الدخول الان </a>";
            echo "<body style='background-size:cover;background-image:url(.//Project/the-medicine-5103043_1920.jpg);'></body>";

        } else {
            echo "<h2 style='text-align:center; color:red; font-size:80px; margin-top:200px; border:1px solid black; '> الباسورد خطأ </h2>";
            echo '<a href="./Project/login.html" style="font-size:45px; text-decoration:none; border:1px solid blue">حاول مرة اخري</a>';
        } 
    } else {
        echo "<h1 style='text-align:center; color:red; font-size:80px; margin-top:200px; border:1px solid black; '> البريد الالكتروني ليس صحيح </h1>";
        echo '<a href="./Project/login.html" style="font-size:45px; text-decoration:none;">حاول مرة اخري</a>';
    }
}
?>





