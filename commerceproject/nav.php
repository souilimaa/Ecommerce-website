<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="commerce";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

$sql = "SELECT id,title,categorie,type,mark,Price,image,description  FROM product";
$result = mysqli_query($conn, $sql);
 
mysqli_close($conn);
   
?> 



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet"  href="pj\bootstrap.min.css">
		<link rel="stylesheet"  href="pj\webfonts\all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
 <script src="pj\jquery-3.6.0.min.js"></script>
<script src="pj\loader.js"></script>
<script src="pj\jquery-ui.min.js"></script>
<script
src="pj\all.min.js"></script>

 <script  
src="pj\bootstrap.bundle.min.js"></script>
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
    <a class="navbar-brand ms-3" style="color: white;" href="#">Miracl  <i class="fa-solid fa-shop" style="color: lightblue;"></i></a>
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
   <div class="o"> <i class="fa-solid fa-laptop"></i> <a>Ordinateurs</a><span class="dropOrdinateur"><i  class="fa-solid fa-caret-down"></i></span></div>
<div class="sousOrdinateur">
      <div><a>Probook</a></div>
      <div><a>Windows</a></div>
      <div><a>Gaming</a></div>
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
<nav style="--bs-breadcrumb-divider: '>'; background-color:white ;" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>


<div class="flx ms-5 ">
<div class="choix ms-1">
<div>Ordinateurs</div> 
<ul>  
<li>Windows</li>
<li>Probook</li>
<li>Gaming</li>
</ul>
<div>Marque</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="dell">
  <label class="form-check-label" for="dell">
    DELL
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="hp" >
  <label class="form-check-label" for="hp">
Hp
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="acer" >
  <label class="form-check-label" for="acer">
Acer
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="lenovo" >
  <label class="form-check-label" for="lenovo">
Lenovo
  </label>
</div>

</div>

<div class="PC ms-4">
<div class="row row-cols-1 ms-2  mt-1 mb-1 row-cols-lg-3  g-4"> 
      <?php  while($row = mysqli_fetch_assoc($result)) { ?> 
                     <div class="all">

  <div class="col">
    <a href="details.php?id= <?php echo $row['id']?>">

 <div class="card  h-100" style="border-radius: 0px; border: solid 0px white;">
 <div style="height: 250px;">
 <img    class="card-img mt-1" src="<?php echo $row['image'] ?>" alt="">
 </div>
 <div class="card-body">
    <div class="card-text ovr">
        <a href="details.php?id= <?php echo $row['id']?>"><?php  echo $row['title'] ?></a>
    </div>
    <div class="card-text"><h6><?php  echo $row['Price'] ?> MAD</h6></div>
    <div class="mt-4 ms-1 me-1 show">
 <button class="btn btn-primary mb-1 show" style="border-color: #6c8aa7; width: 230px;" type="submit">Ajouter au Panier</button>
</div>
</div>
</div>
</div>
</div>
</a>  

<?php } ?>
</div>  
</div>
</div>















<script>
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
  .PC{
       background-color: white;
       width: 915px;
         
    }
  .card a{
        text-decoration: none;
        color: black;
    }
  .choix{
        width: 300px;
        background-color: white;
    }
  .flx{
        display: flex;
        justify-content: flex-start;
    }
  .all2{
        box-shadow: 0 0  0.25rem gray; 
   }
  .all{
        width: 300px;
        height: 400px; 
     }
  .ovr{
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

  nav{
    background-color:black;  
}
    .navbar .navbar-nav .nav-link{
        color: white;
    }
    .navbar .navbar-nav .nav-link.active,
 .navbar .navbar-nav .nav-link:focus,
 .navbar .navbar-nav .nav-link:hover{
    color: #adc8e3;
 }
 
.btn-primary, .btn-primary:active {
    background-color:#6c8aa7 !important; 
}

    .btn-primary:hover{  
    background-color:#5d7e99 !important;
} 

.navbar-collapse form  {
    flex-grow: 1 !important;
}

.input-group {
    flex-wrap: nowrap !important;
} 
.navbar-expand-lg .navbar-nav .nav-link{
    padding-right:2rem !important; 
}
#k:hover{
    background-color: #0b4776 !important;
}
.navbar-toggler {
border-color: white !important;  }
.navbar-toggler:focus {
   
    color: lightskyblue !important;
}
#categorie:hover{
    box-shadow: 0 0 0 0.25rem lightskyblue  !important;
}
.departement{
    background-color: white;
    position:absolute;
border-bottom: 1px solid lightskyblue; 
border-right: 1px solid lightskyblue; 
border-left: 1px solid lightskyblue; 
margin-top: -4px;
border-top-right-radius:6px;
border-top-left-radius:0px ;
border-bottom-right-radius: 6px;
border-bottom-left-radius: 6px;
width: 270px;   
display: none;  
z-index: 1000; 
}   
.departement div{
padding: 1px;}

  .n{
    color: white;
    margin-top: -13px;
  }
 .stockage div svg{
    vertical-align: initial !important;
}
.dropOrdinateur{
margin-left: 119px;
}
.dropEcran{
    margin-left: 15px;
}
.dropStockage{
    margin-left: 138px;       
}
.dropAccessoire{
    margin-left: 119px;
} 
.departement li{
    list-style: none; 
}  
.departement div{
    padding: 3px;
}
 .departement div .s:hover,.departement div .s:focus,.departement div .s:visited,
 .departement div .o:hover, .departement div .o:focus, .departement div .o:visited,
 .departement div .e:hover,.departement div .e:focus,.departement div .e:visited{ 
    color: lightskyblue;
} 
.al:hover{
    color: lightskyblue;
}
.sousOrdinateur div{
    padding: 7px;
}
.sousOrdinateur,.sousEcrans,.sousStockage,.sousAccessoire{
    display: none;
}
.sousAccessoire div,sousOrdinateur div,sousStockage div,sousEcrans div{
    padding: 7px;
}
.sousAccessoire div:hover{
        background-color: #adc8e3 ; 
}
.sousOrdinateur div:hover{
        background-color: #adc8e3 ; 
}
.sousStockage div:hover{
        background-color: #adc8e3 ; 
}
.sousEcrans div:hover{
        background-color: #adc8e3 ; 
}
.departement{
font-family: 'Work Sans', sans-serif;
}
.bottom{
    margin-bottom: 4px;
}
.cls{
    color: lightskyblue;
}

.badge{
    color: red !important;
}
.tr{
    transform: translate(-97%,-50%)!important;
}

.sid{
  background-color: red;
  height: 200px;
  width: 300px;
}
.all{
  display: flex;
  justify-content:flex-start;
margin-left: 20px;
}
.products{
  background-color: floralwhite;
  height: 500px;
  width: 1100px; 
  margin-right: 10px;
  margin-left: 30px;
}
  </style>

</body>
</html>
