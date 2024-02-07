<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db="commerce";
$conn = mysqli_connect($servername, $username, $password,$db);
if (isset($_POST['code']) && $_POST['code']!=""){
  $code = $_POST['code'];

  $result2 = mysqli_query(
    $conn,   
    "SELECT * FROM product WHERE categorie='pc' AND id=$code"   
  );
  $row = mysqli_fetch_assoc($result2);
  $title = $row['title'];
  $id= $row['id'];
  $price = $row['Price'];
  $image = $row['image'];  
  
  $cartArray = array(
    $code=>array(   
      'name'=>$title,
      'code'=>$id,
      'price'=>$price,
      'quantity'=>1,
      'image'=>$image)
  );
  

  if(empty($_SESSION['shopping_cart'])){
    $_SESSION['shopping_cart']=$cartArray;
    echo '<div class="alert alert-info alert-dismissible fade show" role="alert" style="position: fixed; top: 0;z-index: 100000;width: 100%; background-color:#34b73a; color:white; text-align:center; font-family: "Work Sans", sans-serif; border-color:#34b73a;">
    <h5> <i class="fa-solid fa-check me-1"></i>
    Produit ajouté avec succès.</h5>  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    ';}


    else{$keyofsession=array_keys($_SESSION['shopping_cart']);
    if(in_array($code, $keyofsession)){
      echo '<div class="alert  alert-dismissible fade show" role="alert" style="position: fixed; top: 0;z-index: 100000;width: 100%; background-color:#f79300; color:white;text-align:center; font-family: "Work Sans", sans-serif;">   
      <h5> <i class="fa-solid fa-check me-1"></i> Produit est déjà ajouté.  </h5> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    ';}
      else{
        $_SESSION['shopping_cart']=array_replace($_SESSION['shopping_cart'],$cartArray);
        echo '<div class="alert alert-dismissible fade show" role="alert" style="position: fixed; top: 0;z-index: 100000;width: 100%; background-color:#34b73a; color:white;text-align:center; font-family: "Work Sans", sans-serif; border-color:#34b73a;">  <h5> <i class="fa-solid fa-check me-1"></i>
        Produit ajouté avec succès.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    ';}



      } 
   


    }  
    $searchValue=$_SESSION['search'];
    $sort=$_GET['trier'];
    if($sort=='DESC'){
      $sql2 ="SELECT * FROM product where title like '% $searchValue %' order BY Price DESC";
      $conn = mysqli_connect($servername, $username, $password,$db);
      $result = mysqli_query($conn, $sql2);
      mysqli_close($conn);

    }
    if($sort=='ASC'){
      $sql2 ="SELECT * FROM product where  title like '% $searchValue %' order BY Price ASC";
      $conn = mysqli_connect($servername, $username, $password,$db);
      $result = mysqli_query($conn, $sql2);
      mysqli_close($conn);

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
     <link rel="stylesheet" href="pc.css">
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
     <title>Ordinateurs|TechShop</title>

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&family=Work+Sans:wght@100;300;500;700&display=swap" rel="stylesheet"> 
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
     <a href="commerce.php"  class="navbar-brand ms-3" style="color: white;" href="#"><i class="fa-solid fa-house-laptop " style="color: lightblue; height: 25px;"></i>TechShop</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span  >        <i class="fa-solid fa-bars mt-1 mb-1" style="width: 32px; height: 24px; color: white;"></i>
      </span>  
    </button> 
    <div class="collapse navbar-collapse " id="navbarSupportedContent" >
    	<form class="d-flex" role="search" method="POST" action="SearchBar.php">
    		<div class="input-group ">   
          <span class="input-group-text "id="basic-addon1"><i class="fa-solid fa-magnifying-glass " ></i></span>
          <input class="form-control me-2 "   type="search" placeholder="Chercher un produit ou une catégorie" aria-label="Search" name="search">
            
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
<div class="">
  <div aria-label="breadcrumb" class="ms-4 mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="commerce.php" style="text-decoration:none; color:black;">Acceuil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ordinateurs</li>
    </ol>
  </div>
  <div class="flx  ">
   <div class=" choix ms-md-2 mt-3">
    <div class="ms-4 mb-2 mt-3" style="color:#ff2972;">Catégorie</div>
    <div class="ms-5 mt-2">
      <div class="mb-2"><a href="windows.php">Windows</a></div>
      <div class="mb-2"><a href="macbook.php">Macbook</a></div>
      <div class="mb-2"><a href="gaming.php">Gaming</a></div>
    </div>
   
  <div class="ms-4 mb-2 mt-3" style="color:#ff2972;">Trier Par</div>
  <div class="ms-3 mt-2">

    <div class="form-check mb-2">
      <input  class="cr" class="form-check-input"   type="radio" name="trier"  value="ASC" id="croissant">
      <label class="form-check-label" for="croissant">
        Prix Croissant
      </label>
    </div>
    <div class="form-check mb-2">
     <input  class="dec" class="form-check-input"  type="radio" name="trier" value="DESC"  id="decroissant">
     <label class="form-check-label" for="decroissant">
      Prix Décroissant
    </label>

  </div>

</div>

</div>
<div class="pc mt-3 ms-3 me-2 ms-col-1"> 
  <div class="row row-cols-1  mt-1 ms-1 me-1 row-cols-md-2 
  row-cols-sm-1 row-cols-lg-3 g-4">

  <?php  while($row = mysqli_fetch_assoc($result)) { ?>
    <div class="col"> 
      <a href="productdetails.php?id= <?php echo $row['id']?>">
        <div class="card" >
          <div  class="mb-3" style="height: 250px;">
            <img src="<?php echo 
            $row['image'] ?>" class="card-img-top" alt="">
          </div>
          <div class="card-body">
            <div class="card-text remove">
             <a href="p"> <?php echo $row['title']?></a>
           </div>
           <h5 class="card-text ">
            <?php echo $row['Price']?> MAD
          </h5>
          <div id="ajouter">
            <form method='post' action='' >
              <input type='hidden' name='code' value="<?php  echo  $row['id'] ?>">
              <button class="btn btn-primary mt-4 ms-3" style="  
              color: white ; border-color:#5d7e99 ; width: 230px;" type="submit">Ajouter au Panier</button>
            </form>     
          </div>
        </div>
      </div>
    </div>
  </a>
<?php } ?>
</div>
</div>
</div> 
</div>

<script >

  $(".cr").click(function(){
    window.location.href="sortSearch.php?trier=ASC ";
  });   
  $(".dec").click(function(){
    window.location.href="sortSearch.php?trier=DESC ";
  });      
  


  $(".card").mouseenter(function(){
    $(this).addClass("all2");
    $(this).find("#ajouter").show();
  });
  $(".card").mouseleave(function(){
    $(this).removeClass("all2");
    $(this).find("#ajouter").hide();


  });


  $(".card").click(function(){
    $(this).addClass("all2");
    $(this).find("#ajouter").show();


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

<style>
  <?php include "pc.css" ?>
</style>
</body>
</html>