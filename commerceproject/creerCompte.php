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
	<title>Créer un Compte</title>
</head>
<body>
	<div style="">
	<div class="formcenter"> 
<form  class="col-5" style="background-color: pink;">  

		
 <div > <label style="display:none" class="labelprenom ">Prénom</label></div>
 
<div class="form-control form-control-lg"><input type="text" name="prenom" placeholder="Prénom" class="prenom" required></div>
		  		<div class=""><label style="display:none" class="labelnom">Nom</label></div>

	<div class="form-control form-control-lg" ><input  type="text" name="nom" class="nom" placeholder="Nom" required></div>


	<div class=""><label style="display:none" class="labelemail">Adresse e-mail</label></div>
	<div class="form-control form-control-lg" ><input   type="email" name="email" class="email"placeholder="Adresse e-mail" required></div>
	<div class="">
<div><label style="display:none" class="labelpassword">Mot de Passe</label></div>
<div class="input-group mb-3 form-control form-control-lg">
  <input type="password" class="form-control form-control-lg " name="password" placeholder="Mot de Passe" class="password" required>
  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye-slash"></i></span> <span class="cacherpassword" style="display:none;"><i class="fa-solid fa-eye"></i></span></span>
</div>

	
	<div class=""><label class="labeltel" style="display:none;">Téléphone mobile (optionnel)</label></div>
	<div><input  class="form-control form-control-lg" type="tel" class="tel" placeholder="Téléphone mobile (optionnel)"></div>
<div><button type="submit" class="btn btn-primary"  style="color: white ; border-color:#5d7e99">Créer Votre Compte</button></div>

</form>    
</div>
</div>
<style >
	input{
		border-right: none;
		border-left: none;
		border-top: none;
		width: 300px;
		border-color: lightskyblue;
        line-height:2rem;
        margin-bottom: 6px;
        	
	}

	.btn-primary, .btn-primary:active {
    background-color:#6c8aa7 !important; 
}  
     input:focus{
     outline: none;
}
form div{
}
</style> 
<script>
	$(".prenom").focus(function(){
$(".labelprenom").show ();
$(".labelprenom").css("color","lightskyblue");

$(this).removeAttr('placeholder');      
	});
	$(".prenom").focusout(function(){
		if($(this).val().length==0){
		$(".labelprenom").hide ();}
		else{
	$(".labelprenom").show();}
$(".labelprenom").css("color","grey");

$(this).attr('placeholder',"Prénom");  

	});
	$(".nom").focus(function(){
$(".labelnom").show ();
$(".labelnom").css("color","lightskyblue");
$(this).removeAttr('placeholder');     
	});
	$(".nom").focusout(function(){
		if($(this).val().length==0){
		$(".labelnom").hide ();}
		else{
	$(".labelnom").show();
$(".labelnom").css("color","grey");
}
$(this).attr('placeholder',"Nom");  

	});
	$(".email").focus(function(){
$(".labelemail").show ();
$(".labelemail").css("color","lightskyblue");
$(this).removeAttr('placeholder');     
	});
	$(".email").focusout(function(){
		if($(this).val().length==0){
		$(".labelemail").hide();}
		else{
	$(".labelemail").show();
$(".labelemail").css("color","grey");
}
$(this).attr('placeholder',"Adresse e-mail");  

	});
$(".password").focus(function(){
$(".labelpassword").show();
$(".labelpassword").css("color","lightskyblue");
$(this).removeAttr('placeholder');     
	});
	$(".password").focusout(function(){
		if($(this).val().length==0){
		$(".labelpassword").hide ();}
		else{
	$(".labelpassword").show();
$(".labelpassword").css("color","grey");
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
$(".labeltel").show();
$(".labeltel").css("color","lightskyblue");
$(this).removeAttr('placeholder');     
	});
	$(".tel").focusout(function(){
		if($(this).val().length==0){
		$(".labeltel").hide();}
		else{
	$(".labeltel").show();
$(".labeltel").css("color","grey");
}
$(this).attr('placeholder',"Téléphone mobile (optionnel)");  

	});

</script> 

</body>
</html>