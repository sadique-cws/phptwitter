<?php include_once("include/config.php"); 

?> 

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
   
   <div class="container mt-5">
       <div class="row">
          
                   <div class="col-lg-6">
                       
                       <?php 
                       if(isset($_GET['find'])){
                           $search = $_GET['search'];
                       
                       $result = $data->callingDataJoin(
                           "tweets",
                           "accounts",
                           "tweets.tweet_by=accounts.id WHERE tweets.tweet_content LIKE '%$search%'"
                       );
                       
                       foreach($result as $tweet):
                       ?>
                       
                        <div class="card mb-4">
                           <div class="card-body">
                              <h6 class="float-left"><?= $tweet['name'];?></h6>
                              <div class="dropleft float-right">
                                  
                                  <a href="#" type="button" class="dropdown-toggle" data-toggle="dropdown"></a>
                                  
                                  <div class="dropdown-menu">
                                      <a href="#edittweet<?= $tweet['tweet_id'];?>" data-toggle="modal" class="dropdown-item small">edit</a>
   <a href="profile.php?del_tweet=<?= $tweet['tweet_id'];?>" class="dropdown-item small">Delete</a>
                                  </div>
                                  
                              </div>
                              <div class="clearfix"></div>
                               <p><?= $tweet['tweet_content'];?></p>
                           </div>
                       </div>
                       
                       <!-- edit work start-->
                       
                       
                       <div class="modal fade" id="edittweet<?= $tweet['tweet_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Edit Tweet</h6> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="profile.php" method="post">                           
                              
            <div class="card-body pt-0 pl-0 pr-0 m-0">
               
               <textarea name="tweet_content" id="" cols="30" rows="5" class="form-control"><?= $tweet['tweet_content'];?></textarea>
               
               <input type="text" value="<?= $tweet['tweet_id'];?>" name="id" hidden>
               
               <input type="submit" value="Tweet" class="btn btn-primary mt-3 float-right" name="edit_tweet">
           </div>
                               
        </form>
      </div>
    </div>
  </div>
</div>
                       <!-- edit work end-->
                       
                       
                       <?php endforeach;
                       
                       }
                       ?>
                   </div>
               </div>
          
       </div>
   
   
   
   	<?php include_once("include/footer.php");?> 

    </body>
</html>

