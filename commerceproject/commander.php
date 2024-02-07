<?php
session_start(); 
$server="localhost";
$username="root";
$password="";
$db="commerce";
$con=mysqli_connect($server,$username,$password,$db);
$id=$_SESSION['userId'];
$query="SELECT * from users where userId=$id";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
$prenom=$row['prenom'];
$nom=$row['nom'];
$phone=$row['phoneNumber'];
$adresse=$row['adresse'];
$city=$row['city'];
$region=$row['region']; 
$query2="SELECT prix from livraison where city='$city' and region='$region'";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($result2);
$prix=$row2['prix'];
$total=$_SESSION['total'] ;
if(isset($_POST['cash']) && $_POST['cash']=='money' ){
  foreach ($_SESSION['shopping_cart'] as $value) {
    $productid=$value['code'];
$quantity=$value['quantity'];
$price=$value['price'];
$amount=$_SESSION['amount'];
echo $amount;
      $order="INSERT INTO `orders`( `userId`, `productId`, `quantity`, `prixUnitaire`, `typePaiement`,`totalTTC`) VALUES ('$id','$productid','$quantity','$price','en espèces','$amount')";
$result=mysqli_query($con,$order); 
 }
 $_SESSION['commandedone']="commande done";
unset($_SESSION['shopping_cart']);
 header("location:card.php");


} 


?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="commerce.css">
  <link rel="stylesheet"  href="pj\bootstrap.min.css">
  <link rel="stylesheet"  href="pj\webfonts\all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">


  <script src="pj\jquery-3.6.0.min.js"></script>
  <script src="pj\loader.js"></script>
  <script src="pj\jquery-ui.min.js"></script>
  <script
  src="pj\all.min.js"></script>

  <script
  src="pj\bootstrap.bundle.min.js"></script>
  <link rel="icon" href="images/favicon.ico" type="image/ico">
  <title>Finaliser la commande|TechShop</title>
</head>
<body style="background-color: #c5cacdba;">
	<nav class="navbar navbar-expand-lg  "> 
    <div class="container-fluid">
      <div  class="hello" >
       <a>   
        <span class="categorie" class="me-4 " >  
         <i  id="categorie" class="fa-solid fa-bars p-2 mt-1" style=" border-radius: 5px; border: 1px solid white;width: 40px;  height: 23px; color: white;"></i>
       </span> 
     </a> 
   </div>
   <a  href="commerce.php"  class="navbar-brand ms-3" style="color: white;" href="#"><i class="fa-solid fa-house-laptop " style="color: lightblue; height: 25px;"></i>TechShop</a>
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
         <i class="fa-solid fa-user me-2" ></i>  
       Se Connecter</a>
       <ul class="dropdown-menu">
        <li><a class="dropdown-item m-3" id="k" style=" border-radius: 6px ; height: 40px; width: 170px; background-color: #5d7e99 ; color:white" href="login.php">  <i class="fa-solid fa-user me-3" ></i>Se Connecter</a></li>
      <?php }?>

      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href=""><i class="fa-solid fa-user me-3"></i>Votre Compte</a></li>

      <li><a class="dropdown-item" href=""><i class="fas fa-box me-3"></i>Vos commandes</a></li>
      <li><a class="dropdown-item" href=""><i class="fa-regular fa-heart me-2"></i>
      Vos avis en attente</a></li>
    </ul>
  </li> 

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
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
<div style="color:gray" class="ms-5 mt-3 "><strong>Finaliser La Commande</strong></div>
<div style="display:flex; justify-content: center; font-family: 'Work Sans', sans-serif;" class="ms-5 me-5 mt-4 mb-5">

  <div class="info w-75 me-4 mb-3">
   <div class="adresse ">
    <div style="display:inline-block; " class="mt-1"><strong><i class="fa-solid fa-circle-check ms-2 me-2" style="color: green;"></i> 1. Adresse</strong></div>
    <div style="display:inline-block; float: right;" class="me-3 mt-2"><strong ><a style="color:orange;" href="">Modifier</a></strong></div>
    <hr>
    <div class="ms-3 mb-3" style="color:gray;">
      <div style="color:black"><strong><?php echo $prenom." "; echo $nom?></strong></div>
      <div> <?php echo $adresse." , ".$city." , ".$region ?></div>
      <div><?php echo '+212'.$phone ?></div>
    </div>
  </div>
  <div class="adresse mt-1 ">
   <div class="mt-2"><strong><i class="fa-solid fa-circle-check ms-2 me-2" style="color: green;"></i> 2. Mode de livraison</strong></div>
   <hr>
   <div class="ms-4 mb-3">	<input type="radio" checked > <label> Livraison à votre adresse </label>
   </div>
   <div class="ms-5 mb-5">
     <span style="color:gray">Livré entre le</span>
     <span class="from" >  </span>
     <span style="color:gray">pour </span><span style="color: orange;"><strong><?php echo $prix ?> Dhs</strong> <span style="color:black">.</span></span>
   </div>  
 </div> 
 <div class="adresse mt-1 mb-2" >
   <div class="mt-2"><strong><i class="fa-solid fa-circle-check ms-2 me-2" style="color: green;"></i> 2. Mode de Paiement</strong></div>
   <hr>
   <div id="amount" data-amount="<?php echo $_SESSION['amount']?>"></div>

<form action="card.php" method="POST" id="Form">

<input type="hidden" name="paypal">


</form>

   <form method="post" action="" class="mb-3">
    <div class="form-check ms-3 mb-3">
      <input class="form-check-input" type="radio" value="money" name="cash" onchange="paym()" >
      <label class="form-check-label">
        <i class="fa-solid fa-money-bill-wave " style="color:#ff9800;"></i> Paiement cash à la livraison  </label>
      </div>   
      <div class="form-check ms-3 me-2">
        <input class="form-check-input" type="radio" value="bank" name="cash" id="flexRadioDefault2" onchange="paym()">
        <label class="form-check-label" for="flexRadioDefault2">
          <i class="fa-brands fa-paypal me-1" style="color:#3f51b5"></i>Paiement par carte bancaire (facile, sécurisé et permet d'éviter tout contact avec de la monnaie ou des billets)
        </label>
      </div>  



<div class="paimpaypal m-3" style="display:none; ">


 <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=Aari80YGRAX7Q3qd-zXhxFaTzLzZz5xdyJKArAzCT69MuTA4-X06zM6Pzw2PKO2e1KqYqRWXQAErrNqV&currency=USD"></script>
  <!-- Set up a container element for the button -->
  <div id="paypal-button-container"></div>
  <script>
    let amount=document.querySelector("#amount").dataset.amount; 
    console.log(amount);
    let amountdollar=amount/10.79; 
    console.log(amountdollar);
    console.log(Math.floor(amountdollar).toString());

    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: Math.floor(amountdollar).toString()// Can also reference a variable or function
              }  
            }]    
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
           // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
  //window.location.href="paiement succs.php?ko=salma";
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
              document.getElementById('Form').submit();
          });
        }
      }).render('#paypal-button-container');
    </script>

</div>







      <div class="m-4">
        <span><strong>Sous-total </strong></span>
        <span style="float:right"><strong><?php echo $total; ?> Dhs</strong></span>
      </div>
      <div class="m-4">
        <span><strong>Frais de livraison </strong></span>
        <span style="float:right"><strong><?php echo $prix; ?> Dhs</strong></span>
      </div>







      <div style="display:flex;justify-content: center;" class="mb-3">
        <button type="submit" class=" btn btn-primary  mt-3 ms-5 me-5 w-75 finaliser"  style="border: none; border-radius: 0px;">Confirmer la Commande</button>
      </div>
    </form>

  </div>  
</div> 




<div class="ptpanier w-25">
  <div class="mt-1" style="text-align: center;"><strong>Votre commande (<?php if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    echo $cart_count;
  }else{echo 0;} ?> articles)</strong></div>
  <hr>
  
  <?php foreach ($_SESSION['shopping_cart'] as $value) {

   ?>
   <div class="card mb-3" style="max-width: 540px; ">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="<?php echo $value['image'] ?>" class="img-fluid rounded-start" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">      
          <div class="card-text remove"><?php echo $value['name'] ?></div>
          <div class="card-text" style="color: #2698f3;"><?php echo $value['price'] ?> Dhs</div>
          <div class="card-text"><span style="color:gray">Qté : </span><?php echo $value['quantity'] ?> </div>

        </div>
      </div>
    </div> 
  </div>
  <hr>
<?php } ?>
<div class="m-3">
  <span style="float:left"><strong>Sous-total</strong> </span>
  <span style="float:right"><?php  echo $total?> Dhs</span>

</div>
<div class="m-3">
  <span style="float:left"><strong>Frais de livraison</strong> </span>
  <span style="float:right"><strong style="color:#2698f3"><?php  echo $prix?> Dhs </strong> </span>
</div>
<div class="m-3">
  <span style="float:left"><strong>Total TTC</strong></span>
  <span style="float:right"><?php echo $total+$prix?> Dhs</span>
</div>  
<?php $_SESSION['amount']= $total+$prix?>
<button class="btn btn-light mt-3  " style="text-align: center;width: 100%; box-shadow: 0 0 1 0;"><a href="card.php"><strong>Retour au Panier</strong></a></button>



</div>
</div>

<footer>
  <div style="display:flex; justify-content:center" class="mt-3">
    <div class="w-50 m-4">
      <div class="m-2"><i class="fa-solid fa-location-dot me-2" style="  color: #696f72;"></i>Avenu Hassan 2 Ait Melloul (route de Tiznit)
      </div>
      <div class="m-2"><i class="fa-solid fa-phone  me-2" style="  color: #696f72;"></i> 0550995080</div>
      <div class="m-2"><i class="fa-solid fa-envelope  me-2"style="  color: #696f72;"></i> support.techshop@gmail</div>
    </div>
    <div class="w-50 m-4">
      <div class="ms-1 mb-2" style="font-family: 'Work Sans', sans-serif;
      "><strong> À propos de l'entreprise</strong></div>
      <div class="ms-2 me-2" style="color:#696f72; font-family: 'Work Sans', sans-serif;">TechShop une entreprise qui vendre des ordinateurs et ses accessoires à des prix incroyables.</div>
    </div>
  </div>
</footer>






<style>
  footer{
    background-color: #222424;
    color: white;
    font-family: 'Work Sans', sans-serif;

  }
  .adresse{
    border: 1px solid grey;
    border-radius: 5px;
    border-color: #aebbc1;
    background-color: white;

  }   
  .ptpanier .card{
    border: none;
    border-radius: 0;
  }
  .info{
  } 
  .ptpanier{
    border: 1px solid grey;
    border-radius: 5px;
    border-color: #aebbc1;
    background-color: white;
    height: 100%;

  }
  a{
    text-decoration: none;
  }
  .remove{
   overflow: hidden;
   white-space: nowrap;
   text-overflow: ellipsis;
 }
</style>

<script>
function paym(){
if($('input[name=cash]:checked', 'form').val()=='bank'){
  $(".paimpaypal").fadeIn();
    $(".finaliser").hide();
}
if($('input[name=cash]:checked', 'form').val()=='money'){
  $(".paimpaypal").hide();
    $(".finaliser").show();
}
};

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
  let now=new Date();
  let from=new Date();
  let to=new Date();
  from.setDate(now.getDate()+4);
  to.setDate(from.getDate()+3);

  $(".from").append('<strong>'+from.toLocaleDateString('fr-FR', { weekday:"long", month:"long", day:"numeric"})+'</strong>'+' et '+'<strong>'+to.toLocaleDateString('fr-FR', { weekday:"long", month:"long", day:"numeric"})+'</strong>');

</script>  












</body>
</html>