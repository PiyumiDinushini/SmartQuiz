<?php   session_start(); ?>

<?php require_once('include/connection.php');?>

<?php
    //check for form submission
    if(isset($_POST['login'])){

        $errors=array();
        

        //check if the username and password has been entered 
        if(!isset($_POST['email']) || strlen(trim($_POST['email']))<1){
            $errors[]="Username is Missing/Invalid";
        }

        if(!isset($_POST['password']) || strlen(trim($_POST['password']))<1){
            $errors[]="Password is Missing/Invalid";
        }

        //check if there are any error in the form
        if(empty($errors)){

            //save username and password into variables
            $email=mysqli_real_escape_string($connection,$_POST['email']);
            $password=mysqli_real_escape_string($connection,$_POST['password']);
            $hashed_password=sha1($password);
            
            //prepare database query
            $query="SELECT * FROM user WHERE 
                    email='{$email}' AND password='{$hashed_password}' LIMIT 1";

            $result_set=mysqli_query($connection,$query);

            if($result_set){
                //query successful

                if(mysqli_num_rows($result_set)==1){
                    //valid user found
                    $user=mysqli_fetch_assoc($result_set);
                    $_SESSION['user_id']=$user['id'];
                    $_SESSION['first_name']=$user['first_name'];
            

                    $result_set=mysqli_query($connection,$query);

                    if(!$result_set){
                        die("Database query faild");
                    }

                    //redirect to users.php
                    header('Location:quiz.php?loggedin=yes');

                }
                else{
                    //username and password invalid 
                    $errors[]="Invalid Username / Password";    
                }
            }

            else{
                $errors[]="Database query failed";
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
    <title>www.SmartQuiz.com/login user</title>
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

<form action="login.php" method="POST" class="loginform">
            <fieldset>
                <legend><h1>LOGIN</h1></legend>

                <?php
                    if(isset($errors)&& !empty($errors)){
                        echo '<p class="error">Invalid UserName / Password</p>';
                    }

                ?>

                <p>
                <label for="">UserName:</label>
                <input type="text" name="email" id="" placeholder="Enter Email Address">
                </p>

                <p>
                <label for="">Password:</label>
                <input type="password" name="password" id="" placeholder="Enter Password">
                </p>

                <p>
                <button type="submit" name="login">Login</button>
                </p>

                <p>Not a user ?  <a href="register.php"><b>Register Here</b></a></p>
            </fieldset>
        </form>















<div class="logfooter">
    <p>Copyright &copy; 2019 .All right received</p>
</div>    
</body>
</html>

<?php
	mysqli_close($connection);
?>