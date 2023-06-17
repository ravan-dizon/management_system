<div class="modal fade" id="update_modal<?php echo $row['id']?>" tabindex="-1" aria-labelledby="upadateUserLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		  	<div class="modal-header">
		    	<h1 class="modal-title fs-5" id="supadateUserLabel">Update Information</h1>
		    	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  	</div>
		  	<form action="admin_function.php" method="POST">
			  	<div class="modal-body">
			    	<div class="form-group mb-3">
			    		<input type="hidden" name="user_id" value="<?php echo $row['id']?>"/>				    
			    		<input type="text" name="update_fname" class="form-control" value="<?php echo $row['fname']?>" placeholder="Enter First name" required>
			    	</div>
			    	<div class="form-group mb-3">				   
			    		<input type="text" name="update_lname" class="form-control" value="<?php echo $row['lname']?>" placeholder="Enter Last name" required>
			    	</div>
			    	<div class="form-group mb-3">				   
			    		<input type="text" name="update_email" class="form-control" value="<?php echo $row['email_add']?>" placeholder="Enter Email Address" required>
			    	</div>
			    	<div class="form-group mb-3">				   
			    		<input type="text" name="update_contact" class="form-control" value="<?php echo $row['contact_no']?>" placeholder="Phone No." required>
			    	</div>
			    	<div class="form-group mb-3">
			    		<input type="text" name="update_access" value="<?php echo $row['access']?>"class="form-control" placeholder="Birth Day" required>
			    	</div>
			  	</div>
			  	<div class="modal-footer">
			    	<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;Close</button>
			    	<button type="submit" name="btnUpdate" class="btn btn-warning" style="color: #ffffff;"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>&nbsp;Update</button>
		  		</div>
		  	</form>
		</div>
	</div>
</div>