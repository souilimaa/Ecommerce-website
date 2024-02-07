<?php 
session_start();
$server="localhost";
$user="root";
$password="";
$db="commerce";
$con=mysqli_connect($server,$user,$password,$db);
  $id=$_SESSION['userId'];
  if(isset($_POST['paypal'])){
   foreach ($_SESSION['shopping_cart'] as $value) {
    $productid=$value['code'];
$quantity=$value['quantity'];
$price=$value['price'];
      $order="INSERT INTO `orders`(`userId`, `productId`, `quantity`, `price`,`paiement`) VALUES ('$id','$productid','$quantity','$price','online')"; 
$result=mysqli_query($con,$order); 
  }

$result=mysqli_query($con,$order);
  mysqli_error($con);  

   
 
unset($_SESSION['shopping_cart']);
}



?>