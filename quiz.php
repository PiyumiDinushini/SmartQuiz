<?php   session_start(); ?>
<?php
    require_once("include/connection.php");
?>
<?php
    //checking if user logged in
    if(!isset($_SESSION['user_id'])){
        header('Location:home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>www.SmartQuiz.com/quiz</title>
 


<style>
body{
    padding: 0;
    margin: 0;
    background-color:#f4f4f4 ;
}
header{
    padding: 30px;
    color: white;
    background: #35424a;
    overflow: auto;
    border-bottom:#e8491d 3px solid;
}
header .sitename a{
    margin-left: 20px;
    float: left;
    text-decoration:none;
    color: #e8491d;
    font-size: 35px;
}
ul{
    float: right;
   
}
ul li{
    display: inline;
}
ul li a{
	text-decoration:none;
	color:#ffffff;
	padding:10px 30px;
	text-align:center;
}
ul li a:hover
{
	background-color:#ffffff;
	color:#35424a;
	border-radius:8px;
	font-weight:bold;	
}


header .current a
{
	color:#e8491d;
	font-weight:bold;
}

.footer {
	padding:10px;
	margin-top:100px;
	color:#ffffff;
	background-color:#35424a;
	text-align:center;
}
table{
	margin:40px auto;
	background-color:white;
	padding:40px;
}

th{
	font-size:30px;
}
tr{
	font-size:16px;
}

.problem{
	font-size:20px;
	background-color:#f8f2f1;
}
.get_res{
	font-size:20px;
	background-color:#f8f2f1;
	margin-left:600px;
	margin-bottom:20px;
	padding:15px;
	border-radius:6px;
}

</style>



</head>
<body>

<header>
    <div class="sitename"><a href="">SmartQuiz.com</a></div>
    <div class="nav">
        <ul>
        <li ><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
</header>


<form action="answers.php" method="post">
<table   cellpadding="10px" >
<th >PHP Quiz</th>
<?php

$query2="SELECT * FROM question  ORDER BY RAND()";
$result=mysqli_query($connection,$query2);

	while($rows=mysqli_fetch_array($result)){

?>	

<tr>
<td class="problem"><?php echo $rows['statement'] ?></td>
</tr>

<tr>
<td><input type="radio" name="answer1" class="a"><?php echo $rows['option1'] ?></td>
</tr>
<tr>
<td><input type="radio" name="answer2" class="a"><?php echo $rows['option2'] ?></td>
</tr>
<tr>
<td><input type="radio" name="answer3" class="a"><?php echo $rows['option3'] ?></td>
</tr>
<tr>
<td><input type="radio" name="answer4" class="a"><?php echo $rows['option4'] ?></td>
</tr>
<tr>
<td><input type="radio" name="answer5" class="a"><?php echo $rows['option5'] ?></td>
</tr>


<?php 
	
	}

?>
<tr><td><input type="submit" name="get_results" value="Show Answers" class="get_res"></td></tr>
</table>


</form>







<div class="footer">
    <p>Copyright &copy; 2019 .All right received</p>
</div>

</body>
</html>
