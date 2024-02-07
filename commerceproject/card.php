<?php
session_start();
$server="localhost";
$user="root";
$password="";
$db="commerce";
$con=mysqli_connect($server,$user,$password,$db);
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
     echo '<div class="alert alert-dismissible fade show" role="alert" style="position: fixed; top: 0;z-index: 100000;width: 100%; background-color:#34b73a; color:white;text-align:center; font-family: "Work Sans", sans-serif; border-color:#34b73a;">  <h5> <i class="fa-solid fa-check me-1"></i>
Le Produit a été Retiré au Panier.</h5>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>    ';
      }
       if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
     
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break;   
    }
}
     
}      
if(isset($_POST['order'])){
  if(isset($_SESSION["prenom"])){
  $userId=$_SESSION['userId'];  

header("location:commander.php");
}
else{
  header("location:login.php");  
}  
}
if(isset($_SESSION['commandedone'])){
  echo '<div class="alert alert-info alert-dismissible fade show" role="alert" style="position: fixed; top: 0;z-index: 100000;width: 100%; background-color:#34b73a; color:white; text-align:center; font-family: "Work Sans", sans-serif; border-color:#34b73a;">
<h5> <i class="fa-solid fa-check me-1"></i>
Votre commande effectuée ,Merci d\'avoir acheté notre Produits.</h5>  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>    ';
unset($_SESSION['commandedone']);
} 
if(isset($_POST['paypal'])&& isset($_SESSION['shopping_cart'])){
    $id=$_SESSION['userId'];
   foreach ($_SESSION['shopping_cart'] as $value) {
    $productid=$value['code'];
$quantity=$value['quantity'];
$price=$value['price'];
$amount=$_SESSION['amount'];
 $order="INSERT INTO `orders`( `userId`, `productId`, `quantity`, `prixUnitaire`, `typePaiement`,`totalTTC`) VALUES ('$id','$productid','$quantity','$price','online','$amount')"; 
$result=mysqli_query($con,$order); 
  }
  
unset($_SESSION['shopping_cart']);
echo '<div class="alert alert-info alert-dismissible fade show" role="alert" style="position: fixed; top: 0;z-index: 100000;width: 100%; background-color:#34b73a; color:white; text-align:center; font-family: "Work Sans", sans-serif; border-color:#34b73a;">
<h5> <i class="fa-solid fa-check me-1"></i>
Votre Paiement effectuée ,Merci d\'avoir acheté notre Produits.</h5>  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>    ';
}

?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"  href="pj\bootstrap.min.css">
        
    <link rel="stylesheet" href="pc.css">

    <link rel="stylesheet"  href="pj\webfonts\all.min.css">
    <script src="pj\jquery-3.6.0.min.js"></script>
<script src="pj\loader.js"></script>
<script src="pj\jquery-ui.min.js"></script>
<script
src="pj\all.min.js"></script>

 <script
src="pj\bootstrap.bundle.min.js"></script>
<link rel="icon" href="images/favicon.ico" type="image/ico">  
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <title>Panier | TechShop</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg  "> 
  <div class="container-fluid">
    <div  class="hello" >
    <a>
      <span class="categorie" class="me-4 " >  
        <i  id="categorie" class="fa-solid fa-bars p-2 mt-1" style=" border-radius: 5px; border: 1px solid white;width: 40px;  height: 23px; color: white;"></i>
      </span> 
    </a> 
  </div>
    <a href="commerce.php" class="navbar-brand ms-3" style="color: white;" href="#"><i class="fa-solid fa-house-laptop " style="color: lightblue; height: 25px;"></i>TechShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span  >        <i class="fa-solid fa-bars mt-1 mb-1" style="width: 32px; height: 24px; color: white;"></i>
</span>  
    </button> 
    <div class="collapse navbar-collapse " id="navbarSupportedContent" >
      <form class="d-flex" role="search" method="POST" action="SearchBar.php">
        <div class="input-group ">
  <span class="input-group-text "id="basic-addon1"><i class="fa-solid fa-magnifying-glass " ></i></span>
        <input class="form-control me-2 "   type="search" placeholder="Chercher un produit ou une catégorie" name="search" aria-label="Search">
  
        <button class="btn btn-primary" style="  
 color: white ; border-color:#5d7e99 ;" type="submit">RECHERCHER</button>
  </div>
      </form>
      <ul class="navbar-nav mb-2  ms-auto me-4 mb-lg-0"> 
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if(isset($_SESSION['prenom'])){ ?>
Bonjour, <?php echo  $_SESSION['prenom'] ?>
          </a>

<ul class="dropdown-menu">
            <li><a class="dropdown-item m-3" id="k" style=" border-radius: 6px ; height: 40px; width: 170px; background-color: #5d7e99 ; color:white;text-align: center;" href="logout.php">Déconnexion</a></li>



<?php } else{?>

Se Connecter</a>
<ul class="dropdown-menu">  
            <li><a class="dropdown-item m-3" id="k" style=" border-radius: 6px ; height: 40px; width: 170px; background-color: #5d7e99 ; color:white" href="login.php">  <i class="fa-solid fa-user me-3" ></i>Se Connecter</a></li>
<?php }?>

                        <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-box me-3"></i>Vos commandes</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-heart me-2"></i>
Votre liste d'envies</a></li>
          </ul>
        </li> 
         
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
           <i class="fa-solid fa-circle-question me-2" ></i>  Aide </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Centre d'assistance</a></li>
            <li><a class="dropdown-item" href="#">Passer et suivre ma commande</a></li>
            <li><a class="dropdown-item" href="#">Annuler ma commande</a></li>
             <li><a class="dropdown-item" href="#">Retour et remboursement</a></li>
            <li><a class="dropdown-item" href="#">Paiment et compte Miracl</a></li>

          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="card.php"><span style="
        top: -15px;
        left: 23px;
        color: red;  
  font-weight:bold;
  position:relative;"><?php 
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
echo $cart_count;
}else{echo 0;}?></span><i class="fa-solid fa-cart-shopping me-2 "></i>
        
<span>
 Panier
</span>
          </a>


        </li>
      </ul>
      
    </div>
  </div>
</nav>
<div class="departement ms-4"> 
<span class="n"><i class="fa-solid fa-caret-up" ></i></span>

  <div class="ordinateurs"> 
   <div class="o"> <i class="fa-solid fa-laptop"></i> <a  href="pc.php" style="text-decoration: none; color: inherit;">Ordinateurs</a><span class="dropOrdinateur"><i  class="fa-solid fa-caret-down"></i></span></div>
<div class="sousOrdinateur">
      <div><a href="macbook.php">Macbook</a></div>
      <div><a href="windows.php">Windows</a></div>
      <div><a href="gaming.php">Gaming</a></div>
    </div> 
  </div> 

  <div class="ecrans"> 
    <div class="e">
      <i class="fa-solid fa-computer"></i>
    <a>Ordinateur fixe & Ecrans</a>
    <span class="dropEcran"><i  class="fa-solid fa-caret-down"></i></span>
  </div>
  <div class="sousEcrans">
  
    <div><a>Tous-en-un</a></div>
        <div><a>Unités Centrales</a></div>
        <div><a>Ecran</a></div>
            <div><a>Imprimantes</a></div>
          </div> 
  </div>
  <div class="stockage">
<div class="s"> 
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-usb-drive-fill" viewBox="0 0 16 16">
  <path d="M6 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4H6v-4ZM7 1v1h1V1H7Zm2 0v1h1V1H9ZM5.5 5a.5.5 0 0 0-.5.5V15a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V5.5a.5.5 0 0 0-.5-.5h-6Z"/>
</svg>  
    <a>Stockage</a>
    <span class="dropStockage"><i  class="fa-solid fa-caret-down"></i></span> 
  </div>
 <div class="sousStockage">
 
  <div><a>Disque Dur Externe</a></div>
    <div><a>SSD Externe</a></div>
  <div><a>Clé USB</a></div>
</div> 
</div>
  <div class="al">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speaker" viewBox="0 0 16 16">
  <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
  <path d="M8 4.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5zM8 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 3a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-3.5 1.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>    <a>Accessoires</a>
<span class="dropAccessoire"><i  class="fa-solid fa-caret-down"></i></span>
  </div>
  <div class="sousAccessoire">
  <div><a>Souris</a></div>
    <div><a>Clavier</a></div>
  <div><a>Casques</a></div>
  <div><a>Webcam</a></div>
   <div><a>Enceintes PC</a></div>  
</div> 
<div class="bottom"></div>
</div>
</div>
</div> 
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){

if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
    $total_price = 0;
?>
<div class="m-4 "><h4>Panier ( <?php echo $cart_count ;?> )</h4></div>
<table class="table table-bordered">  
<tbody>
  <tr>   
  <td style="text-align:center;"><h5>Article</h5></td>
<td style="text-align:center;"><h5>Nom de l'Article</h5>  
</td>
<td style="text-align:center;"><h5>Quantité</h5></td>
<td style="text-align:center;"><h5>Prix Unitaire</h5></td>
<td style="text-align:center;"><h5>Articles Total </h5>
</td>         
</tr>     
<?php     
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td class="col-md-1" >   
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td class="col-md-6"style="text-align: left;"><div  class="mb-2 "><?php echo $product["name"]; ?></div>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<div><button type='submit' class=' btn   remove ' style="color:#0688ef ; background-color:transparent;">  <i class="fa-solid fa-trash-can"></i>
 Retirer l'article</button></div>
</form> 
</td> 
<td class="col-md-1">
  <div style="width: px;">
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option value='1' <?php if($product["quantity"]==1)  echo "selected";?>
>1</option>        
<option value='2' <?php if($product["quantity"]==2)  echo "selected";?>     
>2</option>
<option value="3" <?php if($product["quantity"]==3) echo "selected";?>
>3</option>
<option value="4" <?php if($product["quantity"]==4) echo "selected";?>
>4</option>
<option value="5" <?php if($product["quantity"]==5) echo "selected";?>
>5</option>
</select>  
</form>
</div>
</td>
<td class="col-md-2">
  <div style="width: px;">
  <h5><?php echo $product["price"]." MAD" ?></h5></div></td>
<td class="col-md-2">  <div style="width: ;">
<h5><?php echo $product["price"]*$product["quantity"]." MAD"; ?></h5></div></td>
</tr>
<div style="width: px;">
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>  </div>
<tr>
<td colspan="5" style="text-align: right;">
<h4 class="me-5"><span style="color:#0688ef">Total :</span>  <?php echo $total_price ." MAD "; ?></h4>
<?php $_SESSION['total']=$total_price; ?> 
<form method="POST" action="">
<button type="submit" value="Commander maintenant" name="order" class="btn btn-primary me-5 ">Commander maintenant</button>

  </form>
</td>       
</tr>  
</tbody>  
</table>  
</div>  
  <?php
}else{
  ?>
 <div class="" >
   <div style="display: flex;justify-content: center;">
    <img style="width: 300px; height: 300px; text-align: center;" src="panier.webp">
   </div>
   <div style="text-align: center; font-family: 'Work Sans', sans-serif;
">
   <div> Votre Panier est Vide.</div>
    <div>
    Parcourez nos catégories et découvrez nos meilleures offres!</div>
    <div class="mt-3"><button class="btn btn-primary go " style="  
 color: white ; border-color:#5d7e99 ; height: 52px;">Commancez Vos Achats</button></div>
   </div>
<?php  } ?>
<script>
  $(".go").click(function(){
  window.location.href="commerce.php";
  });  
 let a=document.querySelector(".categorie");
    let b=document.querySelector(".departement");
    a.onmouseleave=function(){
        b.style.display="none";

    };          
a.onmouseenter=function(){
        b.style.display="grid";
    };
    b.onmouseenter=function(){
        b.style.display="grid";
    };
     b.onmouseleave=function(){
        b.style.display="none";

    };
  $("body").on("click",".dropAccessoire",function(){
  
    $(".sousAccessoire").slideToggle(); 
  $(".al").toggleClass("cls");
  });    
   $("body").on("click",".dropOrdinateur",function(){
    $(".sousOrdinateur").slideToggle(); 
      $(".o").toggleClass("cls");
 
  }); 
    $("body").on("click",".dropEcran",function(){
    $(".sousEcrans").slideToggle();
      $(".e").toggleClass("cls");

  }); 
       $("body").on("click",".dropStockage",function(){
        $(".sousStockage").slideToggle();
          $(".s").toggleClass("cls");

  });
       
   
 
        $("body").on("mouseleave",".departement",function(){
    $(".sousStockage").slideUp(); 
        $(".s").removeClass("cls"); 


  }); 
         $("body").on("mouseleave",".departement",function(){
    $(".sousOrdinateur").slideUp(); 
        $(".o").removeClass("cls"); 

  }); 
         $("body").on("mouseleave",".departement",function(){
    $(".sousEcrans").slideUp(); 
        $(".e").removeClass("cls"); 
      }); 

    $("body").on("mouseleave",".departement",function(){
    $(".sousAccessoire").slideUp(); 
    $(".al").removeClass("cls"); 
  }); 
</script>
<style >
  body{
    background-color:white;
  }    
  .remove{
   
    height: 35px;  
  }  
  td{
    text-align: center;
  }
  
</style>


</body>
</html>