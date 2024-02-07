<?php
session_start();
$servername="localhost";
$user="root";
$password="";
$db="commerce";    
$nolettre="";
$nolettre2="";
$numero="";
$emailexist="";
$telerror="";
$con=mysqli_connect($servername,$user,$password,$db);
if (isset($_POST['prenom'])){
$prenom=$_POST['prenom'];
$prenomSansespace=str_replace(" ", "", $prenom);
if(!ctype_alpha($prenomSansespace)){
	$nolettre="Ce champ ne doit contenir que des alphabets et des espaces";  
}     
	$nom=$_POST['nom'];
$nomSansespace=str_replace(" ", "", $nom);
if(!ctype_alpha($nomSansespace)){
	$nolettre2="Ce champ ne doit contenir que des alphabets et des espaces.";
}


$tel=$_POST['tel'];
if(!ctype_digit($tel)){
$numero="Entrer Votre numéro de téléphone.";
} 
if(!preg_match("/^7|^5|^6/", $tel)){ $telerror="Le numéro de téléphone doit commencer avec 6 ou 7 ou 5.";}
$email=$_POST['email'];
$query="SELECT email FROM users where email='$email'";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);
if($count>0){
	$emailexist="E-mail déjà utilisé.";
}
$password=$_POST['password'];
$adresse=$_POST['adresse'];
if(ctype_alpha($prenomSansespace) && ctype_alpha($nomSansespace) && ctype_digit($tel) && $count==0 && (preg_match("/^6|^7|^5/", $tel) ))
{      
	$prenom=mysqli_real_escape_string($con,$prenom);
	$nom=mysqli_real_escape_string($con,$nom);
	$email = mysqli_real_escape_string($con,$email);
	$password = mysqli_real_escape_string($con,$password);
$adresse = mysqli_real_escape_string($con,$adresse);
$city=$_POST['city'];
$region=$_POST['region'];
$region=mysqli_real_escape_string($con,$region);

	$city=mysqli_real_escape_string($con,$city);
$query2="INSERT INTO `users`(`prenom`, `nom`, `email`, `password`, `phoneNumber`,`adresse`,`city`,`region`) VALUES ('$prenom','$nom','$email','".md5($password)."','$tel','$adresse','$city','$region')";
	$result2=mysqli_query($con,$query2);  
	header("location:login.php");

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
	<title>Créer un Compte |Techshop</title>
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
"><h2><strong>Créer un Compte</strong></h2></div>  
	<div>
		<label style="visibility: hidden;" class="labelprenom " >Prénom</label>
<input class="form-control mb-3  form-control-lg prenom" type="text" placeholder="Prénom"  name="prenom"  minlength="2"   required>
</div>
<div style="color:red ;margin-top: -15px; margin-left: 11px;"><?php echo $nolettre?></div>
<div>    
<label style="visibility: hidden;" class="labelnom ">Nom</label>
<input class="form-control mb-3 form-control-lg nom" type="text" placeholder="Nom" minlength="2"  name="nom" required>
</div>
<div style="color:red ;margin-top: -15px; margin-left: 11px;"><?php echo $nolettre2?></div>
<div>    
<label style="visibility: hidden;" class="labelregion ">Région</label>
<select class="form-select form-select-lg region " id="region" aria-label=".form-select-lg example"  onChange="now()" onchange="this.form.submit()" name="region" required>
  <option  value="" hidden>Sélectionner une Région</option>
  <option  value="Souss-Massa">Souss-Massa</option>
  <option   value="Grand Casablanca">Grand Casablanca</option>


</select>
</div>
<div >
<label style="visibility: hidden;" class="labelville">Ville</label>





<select  style="display: none;" class="form-select form-select-lg   ville2" aria-label=".form-select-lg example" name="city" required>
  <option hidden value="">Sélectionner une Ville</option>
  <option value="Ain Harrouda">Ain Harrouda</option>
  <option value="Benslimane">Benslimane</option>   
  <option value="Bouskoura">Bouskoura</option>
    <option value="Bouznika">Bouznika</option>
    <option value="Casablanca-Ain Chock">Casablanca-Ain Chock</option>
    <option value="Casablanca-Ain Diab">Casablanca-Ain Diab</option>
    <option value="Casablanca-Ain Sebaa">Casablanca-Ain Sebaa</option>
    <option value="Casablanca-Oulfa">Casablanca-Oulfa</option>
    <option value="Casablanca-Rahma">Casablanca-Rahma</option>
    <option value="Mohammedia">Mohammedia</option>

</select>
   
<select class="form-select form-select-lg ville" aria-label=".form-select-lg example" name="city" required>
	  <option hidden value="">Sélectionner une Ville</option>

  <option value="Agadir">Agadir</option>
  <option value="Aït Melloul">Aït Melloul</option>
  <option value="Inezgane">Inezgane</option>
    <option value="Dcheira El Jihadia">Dcheira El Jihadia</option>
    <option value="Oulad Teïma">Oulad Teïma</option>
    <option value="Taroudant">Taroudant</option>
    <option value="Tiznit">Tiznit</option>
    <option value="Drarga">Drarga</option>

</select>

</div>

<div>    
<label style="visibility: hidden;" class="labeladresse ">Votre Adresse</label>
<input class="form-control  form-control-lg adresse" type="text" placeholder="Votre Adresse
"  name="adresse" required>
</div>
<div>
<label style="visibility: hidden;" class="labelemail ">Adresse e-mail</label>
<input class="form-control form-control-lg mb-3 email" type="email" placeholder="Adresse e-mail"  name="email" required>
  <div style="color:red ;margin-top: -12px; margin-left: 11px;"><?php echo $emailexist?></div>

</div>

<div class="pass" >
<label style="visibility: hidden;" class="labelpassword">Mot de Passe</label>
<div class="input-group input-group-lg  ">
  <input type="password" class="form-control password"   minlength="8" name="password" placeholder="Mot de Passe"  required>
  <span  class="input-group-text " id="basic-addon2">
  	<span  class="seepassword"><i class="fa-solid fa-eye-slash"></i></span> <span class="cacherpassword" style="display:none;"><i class="fa-solid fa-eye"></i></span>
  	</span>  
</div>  

</div>
<div class="phone">
<label style="visibility: hidden;" class="labeltel">Téléphone mobile</label>

<div class="input-group  input-group-lg  ">
  <span class=" input-group-text" id="basic-addon1">+212</span>
  <input type="tel"  name="tel" class="form-control form-control-lg  tel" placeholder="Téléphone mobile"  aria-describedby="basic-addon1" minlength="9"maxlength="9" required>
</div>      
</div>
  <div style="color:red ;margin-top: 1px; margin-left: 11px;"><?php echo $telerror;?></div>









<input class="form-control  form-control-lg submitc mt-3" type="submit" value="Créer Votre Compte" style="background-color: rgb(50 135 203);;color: white;" >
           <p class="mt-4" style="text-align: center;	font-family: 'Work Sans', sans-serif;
">Vous avez déjà un compte? <a href="login.php">Connectez-vous ici</a></p>

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
     .form-select:focus{
box-shadow: none;
border-left: none;
border-right: none;
border-top: none;
border-radius:0px;

    }  
   .form .input-group:focus{
    	border: none;
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
.form-select:focus{
	box-shadow: none;
}
.tel{
	border-left: none;
}
body{
		background-image: url("backRegistre.webp");   
}
</style> 

 
	<script>
function now(){

if($(".region option:selected").text()=="Souss-Massa"){
	$(".ville2").hide();
		$(".ville2").attr("disabled","disabled");
		$(".ville").removeAttr("disabled","disabled");

	$(".ville").show();
}
else if($(".region option:selected").text()=="Grand Casablanca"){
	$(".ville").hide();
			$(".ville").attr("disabled","disabled");
		$(".ville2").removeAttr("disabled","disabled");

		$(".ville2").show();


}
console.log($(".region option:selected").text());
};





$(".submitc").mouseenter(function(){
	$(this).css("backgroundColor","rgb(45 116 173)");
});
$(".submitc").mouseleave(function(){
	$(this).css("backgroundColor","rgb(50 135 203)");

});

$(".adresse").focus(function(){
$(".labeladresse").css("visibility","visible");
$(".labeladresse").css("color","lightskyblue");

$(this).removeAttr('placeholder');      
	});
	$(".adresse").focusout(function(){
		if($(this).val().length==0){
		$(".labeladresse").css("visibility","hidden");} 
		else{
	$(".labeladresse").css("visibility","visible");}
$(".labeladresse").css({"color":"grey","marginBottom":"0.5rem"});   
    
$(this).attr('placeholder',"Votre Adresse");  

	});
  
	$(".ville,.ville2").focus(function(){
$(".labelville").css("visibility","visible");
$(".labelville").css("color","lightskyblue");
	});

	$(".ville,.ville2").focusout(function(){
$(".labelville").css("visibility","hidden");
	});
$(".region").focus(function(){
$(".labelregion").css("visibility","visible");
$(".labelregion").css("color","lightskyblue");
	});

	$(".region").focusout(function(){
$(".labelregion").css("visibility","hidden");
	});
	$(".prenom").focus(function(){
$(".labelprenom").css("visibility","visible");
$(".labelprenom").css("color","lightskyblue");

$(this).removeAttr('placeholder');      
	});
	$(".prenom").focusout(function(){
		if($(this).val().length==0){
		$(".labelprenom").css("visibility","hidden");} 
		else{
	$(".labelprenom").css("visibility","visible");}
$(".labelprenom").css({"color":"grey","marginBottom":"0.5rem"});   
    
$(this).attr('placeholder',"Prénom");  

	});
	$(".nom").focus(function(){
$(".labelnom").css("visibility","visible");
$(".labelnom").css("color","lightskyblue");
$(this).removeAttr('placeholder');     
	});
	$(".nom").focusout(function(){
		if($(this).val().length==0){
		$(".labelnom").css("visibility","hidden");}
		else{
	$(".labelnom").css("visibility","visible");
$(".labelnom").css({"color":"grey","marginBottom":"0.5rem"});
}
$(this).attr('placeholder',"Nom");  

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
$(".pass .input-group-text").css({
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

$(".pass .input-group-text").css({
"border":"1px solid #ced4da",
"borderLeft":"none",
"borderRadius":"0.25rem",
"borderTopLeftRadius":"0px",
  "borderBottomLeftRadius":"0px",

});   
	}  
		else{
	$(".labelpassword").css("visibility","visible");
$(".labelpassword").css({"color":"grey","marginBottom":"0.5rem"});
$(".pass .input-group-text").css({
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
	$(".tel").focus(function(){
$(".labeltel").css("visibility","visible");
$(".labeltel").css("color","lightskyblue");
$(".phone .input-group-text").css({
"borderTop":"none",
"borderLeft":"none",
"borderBottomColor":"lightskyblue",
"borderRadius":"0px",
  
});

$(this).removeAttr('placeholder');     
	});
	$(".tel").focusout(function(){
		if($(this).val().length==0){
		$(".labeltel").css("visibility","hidden");
$(".phone .input-group-text").css({
"border":"1px solid #ced4da",
"borderRadius":"0.25rem",
"borderTopRightRadius":"0px",
  "borderBottomRightRadius":"0px",

});   
 
	}
		else{
	$(".labeltel").css("visibility","visible");
$(".labeltel").css("color","grey");
$(".phone .input-group-text").css({
"border":"1px solid #ced4da",
"borderRadius":"0.25rem",
  "borderTopRightRadius":"0px",
  "borderBottomRightRadius":"0px",
});  
}
$(this).attr('placeholder',"Téléphone mobile");  

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