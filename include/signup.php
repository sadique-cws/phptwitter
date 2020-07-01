 <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post">
        	<div class="mb-3">
        	     <label for="">Nmae</label>
        		<input type="text" name="name" class="form-control">
        	</div>
        	<div class="mb-3">
        	     <label for="">Contact</label>
        		<input type="number" name="contact" class="form-control">
        	</div>
        	<div class="mb-3">
        	     <label for="">Email</label>
        		<input type="email" name="email" class="form-control">
        	</div>
        	<div class="mb-3">
        	     <label for="">DOB</label>
        		<input type="date" name="dob" class="form-control">
        	</div>
        	<div class="mb-3">
        	     <label for="">password</label>
        		<input type="password" name="password" class="form-control">
        	</div>
        	<div class="mb-3">
        	     <input type="submit" name="signup" class="btn btn-block btn-success" value="Sign Up">
        	</div>
        	
        </form>
      </div>
     </div>
  </div>
</div>
