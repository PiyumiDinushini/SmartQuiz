<?php   session_start(); ?>

<?php require_once('include/connection.php');?>
<?php
    //checking if user logged in
    if(!isset($_SESSION['user_id'])){
        header('Location:adminlogin.php');
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

    <style>
table {
margin:30px 100px;
border-collapse: collapse;
width: 100%;
color: #35424a;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #35424a;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
.tablename{
    margin-left:600px;
    font-size: 25px;
    color: #35424a;
}
</style>

</head>
<body>

<header>
    <div class="sitename"><a href="">SmartQuiz.com</a></div>
    <div class="nav">
        <ul>
        <li><a href="home.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li ><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
</header>
<h2 class="tablename">User Table</h2>
<table >
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
</tr>
<?php
$query = "SELECT id, first_name, last_name, email FROM user";
$result = mysqli_query($connection,$query);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>"
. $row["email"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
?>
</table>

<div class="logfooter">
    <p>Copyright &copy; 2019 .All right received</p>
</div>    
</body>
</html>

<?php
	mysqli_close($connection);
?>