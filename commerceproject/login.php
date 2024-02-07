<?php
session_start();
$server="localhost";
$username="root";
$password="";
$db="commerce";
$con=mysqli_connect($server,$username,$password,$db);
$warning="";
if (isset($_POST['email'])){
$password=$_POST['password'];
$email=$_POST['email'];
$query="SELECT * FROM users where email='$email'AND password='".md5($password)."'";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);
if($count==1){
  while($row=mysqli_fetch_assoc($result)){
    $_SESSION['prenom']=$row['prenom'];
    $_SESSION['userId']=$row['userId'];
    if(isset($_SESSION['order'])){
    header("location:commander.php");}
    else{
      header("location:commerce.php");
    }
  }

}
else{    
  $warning="
 E-mail et/ou Mot de passe incorrects.";
}
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
    
	<script src="pj\jquery-3.6.0.min.js"></script>
<script src="pj\loader.js"></script>
<script src="pj\jquery-ui.min.js"></script>
<script
src="pj\all.min.js"></script>
   
 <script
src="pj\bootstrap.bundle.min.js"></script>
<link rel="icon" href="images/favicon.ico" type="image/ico">
	<title>Se Connecter |Techshop</title>
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
    <a  href="commerce.php"  class="navbar-brand ms-3" style="color: white;" href="#"><i class="fa-solid fa-house-laptop " style="color: lightblue; height: 25px;"></i>TechShop</a>
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
	<div class="formcon" >
<form method="Post" action="">

	<div class="form" >
					<div class="mb-3 " style="text-align: center; color: rgb(45 116 173); font-family: 'Work Sans', sans-serif;
"><h2><strong>Se Connecter</strong></h2></div> 
<div>  
<label style="visibility: hidden;" class="labelemail ">Adresse e-mail</label>
<input class="form-control form-control-lg mb-3 email" type="email" placeholder="Adresse e-mail"  name="email" required>
   <div style="color:red ;margin-top: -12px; margin-left: 11px;"><?php echo $warning?></div>
</div>

<div>
<label style="visibility: hidden;" class="labelpassword">Mot de Passe</label>
<div class="input-group input-group-lg mb-3 ">
  <input type="password" class="form-control password"   minlength="8" name="password" placeholder="Mot de Passe"  required>
  <span  class="input-group-text" id="basic-addon2">
  	<span  class="seepassword"><i class="fa-solid fa-eye-slash"></i></span> <span class="cacherpassword" style="display:none;"><i class="fa-solid fa-eye"></i></span>
  	</span>  
</div>
   <div style="color:red ;margin-top: -12px; margin-left: 11px;"><?php echo $warning?></div>

</div>
<input class="form-control  form-control-lg submitc mt-3 " type="submit" value="Se Connecter" style="background-color: rgb(50 135 203);;color: white;" >
           <p class="mt-4" style="text-align: center;	font-family: 'Work Sans', sans-serif;
">Vous n'avez pas un compte? <a href="registre.php">Créé Votre Compte</a></p>

</div>
</form>
</div>  
<style >  
	<?php include 'commerce.css'; ?>
	.form .form-control {
    }  
    .form-control:focus{
box-shadow: none;
border-left: none;
border-right: none;
border-top: none;
border-radius:0px;

    }  
   .form .input-group:focus{
    	border: none;
    }
   
    .input-group{

    }
   
    .password{
    	border-right: none;
    }
.form .input-group-text{
	background-color: white;
}


.form{
	margin: 40px;
	background-color: white;
	padding: 60px;
		border-bottom-right-radius: 118px;
border-top-left-radius: 118px;
border: 7px solid #81d4fa;	  
}    
.submitc{
	height: 60px;
	font-family: 'Work Sans', sans-serif;
	border-radius: 30px;

}
.formcon {  
display: flex;
justify-content: center;
margin: 10px;
margin-top: 40px; 

}
body{
		background-image: url("backRegistre.webp");   
    bordr-top-righ
}
</style> 

<script>
$(".submitc").mouseenter(function(){
	$(this).css("backgroundColor","rgb(45 116 173)");
});
$(".submitc").mouseleave(function(){
	$(this).css("backgroundColor","rgb(50 135 203)");

});

	$(".email").focus(function(){
$(".labelemail").css("visibility","visible");
$(".labelemail").css("color","lightskyblue");
$(this).removeAttr('placeholder');     
	});
	$(".email").focusout(function(){
		if($(this).val().length==0){
		$(".labelemail").css("visibility","hidden");}
		else{
	$(".labelemail").css("visibility","visible");
$(".labelemail").css({"color":"grey","marginBottom":"0.5rem"});
}
$(this).attr('placeholder',"Adresse e-mail");  

	});
$(".password").focus(function(){
$(".labelpassword").css("visibility","visible");
$(".labelpassword").css("color","lightskyblue");
$(".input-group-text").css({
"borderRight":"none",
"borderTop":"none",
"borderColor":"lightskyblue",
"borderRadius":"0px"

});
$(this).removeAttr('placeholder');     
	});
	$(".password").focusout(function(){
		if($(this).val().length==0){
		$(".labelpassword").css("visibility","hidden");

$(".input-group-text").css({
"border":"1px solid #ced4da",
"borderLeft":"none",
"borderRadius":"0.25rem"
  
});
	}
		else{
	$(".labelpassword").css("visibility","visible");
$(".labelpassword").css({"color":"grey","marginBottom":"0.5rem"});
$(".input-group-text").css({
"border":"1px solid #ced4da",
"borderLeft":"none",
"borderRadius":"0.25rem"
  
});

}
$(this).attr('placeholder',"Mot de Passe");  

	});    
	$(".seepassword").click(function(){
		$(".password").attr("type","text");
		$(".seepassword").hide();
	$(".cacherpassword").show();
	});
	$(".cacherpassword").click(function(){
		$(".password").attr("type","password");
		$(".seepassword").show();
	$(".cacherpassword").hide();
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
</body>
</html>  