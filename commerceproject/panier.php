<?php
session_start();
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      echo 4;
     echo '<div class="alert alert-dismissible fade show" role="alert" style="position: fixed; top: 0;z-index: 100000;width: 100%; background-color:#34b73a; color:white;text-align:center; font-family: "Work Sans", sans-serif; border-color:#34b73a;">  <h5> <i class="fa-solid fa-check me-1"></i>
Removed from cart.</h5>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>    ';
      }
       if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
     
      }		
}
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
  <title>Panier|TechShop</title>
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
      <form class="d-flex" role="search">
        <div class="input-group ">
  <span class="input-group-text "id="basic-addon1"><i class="fa-solid fa-magnifying-glass " ></i></span>
        <input class="form-control me-2 "   type="search" placeholder="Chercher un produit ou une catégorie" aria-label="Search">
  
        <button class="btn btn-primary" style="  
 color: white ; border-color:#5d7e99 ;" type="submit">RECHERCHER</button>
  </div>
      </form>
      <ul class="navbar-nav mb-2  ms-auto me-4 mb-lg-0"> 
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="fa-solid fa-user me-2" ></i>  Se Connecter
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item m-3" id="k" style=" border-radius: 6px ; height: 40px; width: 170px; background-color: #5d7e99 ; color:white" href="#">  <i class="fa-solid fa-user me-3" ></i>Se Connecter</a></li>
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
          <a class="nav-link " aria-current="page" href="#"><i class="fa-solid fa-cart-shopping me-2 "></i>
         <span class="position-absolute start-90  tr -middle badge  ">
0    <span class="visually-hidden">unread messages</span>
  </span>

 Panier
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

<table>
  <thead>
    <tr>
       <td></td>
<td>Nom de l'Article
</td>
<td>Quantité</td>
<td>Prix Unitaire</td>
<td>Articles Total
</td>
    </tr>
  </thead>
<tbody>
  <i class="fa-solid fa-trash-can"></i>
  <tfoot>Total</tfoot>

</tbody>


</table>
<table class="">
<tbody>
<tr>
  <td></td>
<td>Nom de l'Article
</td>
<td>Quantité</td>
<td>Prix Unitaire</td>
<td>Articles Total
</td>
</tr>
</tbody>
</table>

<select>
  <option>book1</option>
  <option>book2</option>
  <option>book3</option>
  <option>book4</option>

</select>  







<script >
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
</body>
</html>