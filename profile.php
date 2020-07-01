<?php include_once("include/config.php");?> 

<?php 
if(!isset($_SESSION['user'])){
    $data->redirect("index");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php</title>
	 <?php include_once("include/link.php");?> 
</head>
<body>
	<?php include_once("include/nav.php");?> 
   
   <div class="container mt-4">
       <div class="row">
           <div class="col-lg-12">
              <!-- cover image -->
               <div style="background-image:url('image/cover.png');height:300px">
                
               </div>
               
               <div class="container px-5" style="margin-top:-200px;background:linear-gradient(rgba(255, 255, 255, 0),rgba(255, 255, 255, 0.67),white)">
                  <div class="row">
                   <div class="col-lg-3">
                       <div class="card">
                           <img src="image/dp.jpg" class="card-img-top" alt="">
                       </div>
                   </div>
                   <div class="col-lg-9 mt-5">
                       <h4 class="mt-5 text-uppercase text-dark font-weight-bold pt-5">Sadique Hussain</h4>
                   </div>
                   </div>
               </div>
               
               
               <div class="row">
                   <div class="col-lg-6">
                       <h2>Trending</h2>
                       
                   </div>
                   <div class="col-lg-6">
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="card mb-4">
                            <div class="card-header">
                                <h6>Write Tweet</h6>
                            </div>
                            <div class="card-body pt-0 pl-0 pr-0 m-0">
                               <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                               <input type="submit" value="Tweet" class="btn btn-primary mt-3 float-right">
                           </div>
                       </div>
                           </div>
                       </div>
                       
                       <div class="card mb-4">
                           <div class="card-body">
                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti numquam, magni officia expedita atque, praesentium! Accusamus saepe repellendus dolorem minima commodi assumenda cum hic dolor, iusto, ad repellat aliquam, quia!</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   
   
   
   	<?php include_once("include/footer.php");?> 
    </body>
</html>