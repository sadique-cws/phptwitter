<?php include_once("include/config.php");?> 

<?php 
if(isset($_SESSION['user'])){
  $data->redirect("profile");  
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
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">Explore Trends</div>
					<div class="card-body">
						
						
						
						
						
					</div>
				</div>
			</div>
		   <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Login here</div>
                    <div class="card-body">
                        <form action="index.php" method="post">
                            <div class="mb-3">
                                <lable>Email/Contact</lable>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <lable>Password</lable>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                 
                                <input type="submit" name="login" class="btn btn-success btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<?php include_once("include/signup.php");?> 
	<?php include_once("include/footer.php");?> 
</body>
</html>


<?php
if(isset($_POST['signup'])){
	$fields= [
		'name'=>$_POST['name'],
		'contact'=>$_POST['contact'],
		'email'=>$_POST['email'],
		'dob'=>$_POST['dob'],
		'password'=> md5($_POST['password'])
	];
    
	if($data->insertData("accounts",$fields)){
        $_SESSION['user'] = $_POST['email'];
        $data->redirect("index");
    }
    else{
        #todo: msg if fail
    }
}


if(isset($_POST["login"])){
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    
    if($data->CheckData("accounts","email = '$email' AND password='$password'")){
        $_SESSION['user'] = $email;
        $data->redirect("profile");
    }    
    else{
        #todo: login fail
    }
}
?>