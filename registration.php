<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="title">
        REGISTRATION
    </div>
<?php
        if(isset($_POST['register'])){
            include 'config.php';

            $id = mysqli_real_escape_string($con, $_POST['id']);
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $father = mysqli_real_escape_string($con, $_POST['father']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            $dob = mysqli_real_escape_string($con, $_POST['dob']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $role = mysqli_real_escape_string($con, $_POST['role']);
            $gender = mysqli_real_escape_string($con, $_POST['gender']);

            $sql = "SELECT * FROM tableform WHERE id = {$id}";
            $res = mysqli_query($con, $sql) or die("Query Failed");

            if(mysqli_num_rows($res)>0){
                echo "<script>alert('ID is already exist!');</script>";
            }
            else{
                $ins = "INSERT INTO tableform VALUES({$id},'{$name}','{$father}','{$email}','{$password}','{$dob}',{$phone},'{$role}','{$gender}')";
                $result = mysqli_query($con, $ins) or die("Query Failed");
                header("Location: http://localhost/attendance/login.php");
            }
        }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Id</span>
                <input type="number" name="id" placeholder="Enter Your id" required>
            </div>
            <div class="input-box">
                <span class="details">Name</span>
                <input type="text" name="name" placeholder="Enter Your Name" required>
            </div>
            <div class="input-box">
                <span class="details">Father's Name</span>
                <input type="text" name="father" placeholder="Enter Your Father's Name" required>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="email" placeholder="Enter Your email" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Enter Your Name" required>
            </div>
            <div class="input-box">
                <span class="details">D.O.B</span>
                <input type="date" name="dob" placeholder="Enter Your D.O.B" required>
            </div>
            <div class="input-box">
                <span class="details">Phone</span>
                <input type="tel" name="phone" placeholder="Enter Your Phone Number" required>
            </div>
            <div class="input-box">
                <span class="details">Role: </span>
                <select name="role" class="role" required>
                    <option value="0" name="role">Student</option>
                    <option value="1" name="role">Admin</option>
                </select>
            </div>
        </div>

        <div class="gender-details">
            <span class="gender-title">Gender</span>
            <div class="category">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="male" value="Male">
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" value="Female">
                <label for="others">Others</label>
                <input type="radio" name="gender" id="others" value="Others">
            </div>
        </div>

        <div class="button">
            <input type="submit" name="register" value="Register">
        </div>
    </form>



</div>
</body>
</html>