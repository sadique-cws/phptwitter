<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
		<a href="" class="navbar-brand">Twitter</a>
		
		<form  class="d-flex mx-auto" action="" method="post">
		    <input type="search" name="search" size="70" placeholder="Search People, Post, and More" class="form-control form-control-sm">
		    <input type="submit" name="find" class="btn btn-success btn-sm">
		</form>
		
		<ul class="navbar-nav">
		<?php 
            if(isset($_SESSION['user'])):?>
                <li class="nav-item">
                    <a  href="profile.php" class="btn btn-outline-light">hi, 
                        <?= $_SESSION['user'];?>
                    </a>
                </li>

                <li class="nav-item"><a href="logout.php" class="ml-2 btn btn-danger">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><button class="btn btn-outline-light">SignIn</button></li>
                <li class="nav-item"><button class="ml-2 btn btn-outline-light " data-toggle="modal" data-target="#exampleModal">SignUp</button></li>
            <?php endif;?>
		</ul>
	</div>
</nav> 