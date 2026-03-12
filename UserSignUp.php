<?php
session_start();
include('include/config.php');
error_reporting(0);

if(isset($_POST['signup'])) {

    // Code for student ID
    $count_my_page = "studentid.txt";

    if(!file_exists($count_my_page)) {
        file_put_contents($count_my_page,"0");
    }

    $hits = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fputs($fp, "$hits[0]");
    fclose($fp);
    $StudentId = $hits[0];

    // Form values
    $fname = $_POST['fullanme'];          // keep same as input name
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);   // simple hashing
    $status = 1;

    // Insert query
    $sql = "INSERT INTO tblstudents(StudentId, FullName, MobileNumber, EmailId, Password, Status) 
            VALUES(:StudentId, :fname, :mobileno, :email, :password, :status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':StudentId', $StudentId, PDO::PARAM_STR);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId) {
        echo '<script>alert("Your Registration was successful! Your Student ID is: '.$StudentId.'");</script>';
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>OLMS | Student Signup</title>
    <script type="text/javascript">
    function valid() {
        if(document.signup.password.value != document.signup.confirmpassword.value) {
            alert("Password and Confirm Password do not match!");
            document.signup.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>
<body>

<h2>User Signup</h2>

<form name="signup" method="post" onsubmit="return valid();">
    <label>Full Name:</label>
    <input type="text" name="fullanme" required /><br><br>

    <label>Mobile Number:</label>
    <input type="text" name="mobileno" maxlength="10" required /><br><br>

    <label>Email:</label>
    <input type="email" name="email" required /><br><br>

    <label>Password:</label>
    <input type="password" name="password" required /><br><br>

    <label>Confirm Password:</label>
    <input type="password" name="confirmpassword" required /><br><br>

    <button type="submit" name="signup">Register Now</button>
</form>

</body>
</html>
<style>
body{
    margin:0;
    padding:0;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg,#ff7e5f,#feb47b,#6a11cb,#2575fc);
    background-size: 400% 400%;
    animation: gradientBG 10s ease infinite;
}

@keyframes gradientBG{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}

.content-wrapper{
    padding-top:50px;
}

.panel{
    background:white;
    border-radius:10px;
    padding:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.panel-heading{
    font-size:22px;
    font-weight:bold;
    text-align:center;
    color:white;
    background:linear-gradient(45deg,#ff416c,#ff4b2b);
    padding:15px;
    border-radius:8px;
}

.form-group label{
    font-weight:bold;
}

.form-control{
    width:100%;
    padding:10px;
    border-radius:5px;
    border:1px solid #ccc;
    margin-top:5px;
}

.form-control:focus{
    border-color:#ff416c;
    box-shadow:0 0 8px rgba(255,65,108,0.5);
}

.btn-danger{
    width:100%;
    padding:12px;
    border:none;
    border-radius:5px;
    font-size:16px;
    font-weight:bold;
    background:linear-gradient(45deg,#ff416c,#ff4b2b);
    color:white;
    cursor:pointer;
    transition:0.3s;
}

.btn-danger:hover{
    transform:scale(1.05);
    background:linear-gradient(45deg,#6a11cb,#2575fc);
}

.header-line{
    color:white;
    font-size:28px;
    font-weight:bold;
    text-align:center;
    margin-bottom:30px;
}

form{
width:400px;
margin:auto;
background:white;
padding:20px;
box-shadow:0px 0px 10px gray;
}
</style>