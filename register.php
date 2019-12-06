<?php   session_start(); ?>

<?php require_once('include/connection.php')?>

<?php

$errors=array();

$first_name='';
$last_name='';
$email='';
$password='';
$confirm_password='';

    //check for form submission
    if(isset($_POST['register'])){
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        
        //checking required fields
        $req_fields=array('first_name','last_name','email','password','confirm_password');

        foreach($req_fields as $field){
            if(empty(trim($_POST[$field]))){
                $errors[]=$field." is required";
            }
        }

        //checking max length
        $max_length_fields=array('first_name'=>50,'last_name'=>100,'email'=>100,'password'=>40,'confirm_password'=>40);

        foreach($max_length_fields as $field=>$max_length){
            if(strlen(trim($_POST[$field]))>$max_length){
                $errors[]=$field." must be less than ".$max_length." characters";
            }
        } 
        
        //checking if email address already exist
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $query="SELECT * FROM user WHERE email='{$email}' LIMIT 1";

        $result_set=mysqli_query($connection,$query);
        
        if($result_set){
            if(mysqli_num_rows($result_set)==1){
                $errors[]="Email already exist";
            }
        }

        //checking password are same
        $password=mysqli_real_escape_string($connection,$_POST['password']);
        $confirm_password=mysqli_real_escape_string($connection,$_POST['confirm_password']);

        if($password!=$confirm_password){
            $errors[]="Passwords need to be same";
        }

        if(empty($errors)){
            //errors not found ... register new user

            $first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
            $last_name=mysqli_real_escape_string($connection,$_POST['last_name']);
            $hashed_password=sha1($password);

            $query="INSERT INTO user (first_name,last_name,email,password) VALUES
            ('{$first_name}','{$last_name}','{$email}','{$hashed_password}')";

            $result=mysqli_query($connection,$query);

            if($result){
                header('Location:login.php?registered user=true');
            }
            else{
                $errors[]="Fail to register new user";
            }

        }

     }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>www.SmartQuiz.com/register user</title>
    <link rel="stylesheet" href="css/css1.css" class="">



</head>
<body>

<header>
    <div class="sitename"><a href="">SmartQuiz.com</a></div>
    <div class="nav">
        <ul>
        <li><a href="home.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>
        </ul>
    </div>
</header>

<form action="register.php" method="post" class="registerform">
    <fieldset>
    <legend><h2>REGISTER NOW</h2></legend>
    
    <?php

    if(!empty($errors)){
        echo "<div class='errmsg'>";
        echo "<b>There were errors on your form</b><br>";
        foreach($errors as $error){
            echo $error ."<br>";
        }
        echo "</div>";
    }

    ?>
   

        <p>
        <label for="">First Name:</label>
        <input type="text" name="first_name" <?php echo 'value="' .$first_name .'"'; ?>>
        </p>
        <p>
        <label for="">Last Name:</label>
        <input type="text" name="last_name" <?php echo 'value="' .$last_name .'"'; ?>>
        </p>
        <p>
        <label for="">Email Address:</label>
        <input type="email" name="email" <?php echo 'value="' .$email .'"'; ?>>
        </p>
        <p>
        <label for="">Password:</label>
        <input type="password" name="password">
        </p>
        <p>
        <label for="">Confirm Password:</label>
        <input type="password" name="confirm_password">
        </p>
        <p>
        <button type="submit" name="register">Register</button>
        </p>

<p>Already a user ?  <a href="login.php"><b>LOGIN Here</b></a></p>
</fieldset>
</form>















<div class="regfooter">
    <p>Copyright &copy; 2019 .All right received</p>
</div>    
</body>
</html>

<?php
	mysqli_close($connection);
?>