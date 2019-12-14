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
    <title>www.SmartQuiz.com/answer</title>
 


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

</style>



</head>
<body>

<header>
    <div class="sitename"><a href="">SmartQuiz.com</a></div>
    <div class="nav">
        <ul>
        <li ><a href="quiz.php">QUIZ</a></li>
        <li ><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
</header>


<table   cellpadding="10px" >
<th >PHP Quiz : Answers</th>
<?php


$query2="SELECT * FROM question ";
$result=mysqli_query($connection,$query2);

	while($rows=mysqli_fetch_array($result)){

?>	



<tr>
<td class="problem"><?php echo $rows['id']."  .".$rows['statement'] ?></td>
</tr>

<tr>
<td><?php echo $rows['answer'] ?></td>
</tr>

	

<?php 
	
	}

?>

</table>







<div class="footer">
    <p>Copyright &copy; 2019 .All right received</p>
</div>

</body>
</html>
