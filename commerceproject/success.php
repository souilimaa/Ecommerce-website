<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <div class="no">
    <h6 style="text-align: right;">voir</h6>
<div class="m-4" style="background-color:white; text-align: left;"><h2> Vus récemment</h2>
</div>
    
<div class="row row-cols-1 row-cols-md-2 
 row-cols-sm-1 row-cols-lg-4 g-4 ms-4 me-4" style="background-color: white;" >  

  <?php
   $k=0;  
  foreach ($_SESSION['shopping_cart'] as$value) {  if($k==4) break;    $k++;?>
  <div class="col"> 
    <div class="card" >
      <a href="productdetails.php?id= <?php echo $value['code']?>">
      <div  class="">
      <img style="height: 250px;"  src="<?php echo 
      $value['image'] ?>" class="card-img-top" alt="">
    </div>
  <div class="card-body">   
    <div class="card-text remove">
     <a href="productdetails.php?id= <?php echo $value['code']?>"> <?php echo $value['name']?></a>
    </div>
     <h5 class="card-text ">
      <?php echo $value['price']?> MAD
    </h5>
    
    </div> 
    </a>        
  </div>
  </div>
<?php  } ?>
</div>
</div>
<style >  
  .remove{
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}   
.no .row{
  flex-wrap: nowrap;
}
.no .card{
  border: none;
  border-radius: 0;
}
.no a{
  text-decoration: none;
  color: black;
}
</style>

 


 

</body>
</html> 