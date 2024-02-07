<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="commerce";
 $conn = mysqli_connect($servername, $username, $password,$db);
$query2="SELECT count(userId) As count, max(stars)as stars FROM evaluer where productId=$id";
$resultat=mysqli_query($conn,$query2);

?>