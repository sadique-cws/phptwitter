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
                           <img src="<?= "image/". $user[0]['dp'];?>" class="card-img-top" alt="">
                       </div>
                   </div>
                   <div class="col-lg-9 mt-5">
                       <h4 class="mt-5 text-uppercase text-dark font-weight-bold pt-5"><?= $user[0]['name'];?></h4>
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
                            <form action="profile.php" method="post" enctype="multipart/form-data">                           
                              
                                <div class="card-body pt-0 pl-0 pr-0 m-0">
                                   <textarea name="tweet_content" id="" cols="30" rows="5" class="form-control"></textarea>
                                   
                                   <input type="file" class=" mt-3 ml-3 float-left" name="tweet_image">
                                   
                                   <input type="submit" value="Tweet" class="btn btn-primary mt-3 float-right mr-3" name="tweet">
                               </div>
                               
                           </form>
                       </div>
                           </div>
                       </div>
                       
                       <?php 
                       $result = $data->callingDataJoin(
                           "tweets",
                           "accounts",
                           "tweets.tweet_by=accounts.id ORDER BY tweet_id DESC"
                       );
                       
                       foreach($result as $tweet):
                       ?>
                       
                        <div class="card mb-4">
                           <div class="card-body">
                              <h6 class="float-left">
                                  <a href="tweet.php?tweet_id=<?= $tweet['tweet_id'];?>"><?= $tweet['name'];?></a>
                              </h6>
                              <div class="dropleft float-right">
                                  
                                  <a href="#" type="button" class="dropdown-toggle" data-toggle="dropdown"></a>
                                  
                                  <div class="dropdown-menu">
                                      <a href="#edittweet<?= $tweet['tweet_id'];?>" data-toggle="modal" class="dropdown-item small">edit</a>
   <a href="profile.php?del_tweet=<?= $tweet['tweet_id'];?>" class="dropdown-item small">Delete</a>
                                  </div>
                                  
                              </div>
                              <div class="clearfix"></div>
                               <p><?= $tweet['tweet_content'];?></p>
                               
                       <?php if($tweet['tweet_image']!=""): ?>

                           <img src='image/tweet/<?= $tweet['tweet_image'];?>' class="w-100">

                       <?php endif;?>
                               
                               
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
                       
                       
                       <?php endforeach;?>
                   </div>
               </div>
           </div>
       </div>
   </div>
   
   
   
   	<?php include_once("include/footer.php");?> 

    </body>
</html>



<?php

if(isset($_POST['tweet'])){
    $userid = $data->GetUserId();
    
    $tweet_image = $_FILES['tweet_image']['name'];
    $tmp_img = $_FILES['tweet_image']['tmp_name'];
    
    $fields =  array(
        'tweet_by' => $userid[0]['id'],
        'tweet_status'=>1,
        'tweet_image' => $tweet_image,
        'tweet_content'=>$_POST['tweet_content']
    );
    
    move_uploaded_file($tmp_img,"image/tweet/$tweet_image");
    
    $data->insertData("tweets",$fields);
    
    $data->redirect("profile");
    
}


if(isset($_GET['del_tweet'])){
    $id = $_GET['del_tweet'];
    
    if($data->deleteData("tweets"," tweet_id='$id'")){
        $_SESSION['msg'] = "tweet Deleted Successfully";
        $data->alert('profile');
    }  
}


//update work

if(isset($_POST['edit_tweet'])){
    $id = $_POST['id'];
    $content = $_POST['tweet_content'];
    
    $data->updateData("tweets", " tweet_content='$content'", " tweet_id='$id'");
    
    $data->redirect('profile');

}
?>