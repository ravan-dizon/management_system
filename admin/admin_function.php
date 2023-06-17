<?php 
	session_start();
	require_once('../connection.php');

	//INSERT FUNCTION

	$output = "";
	if (isset($_POST['btnSave'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sex = $_POST['sex'];
		$bday = $_POST['bday'];

		$check_rec = mysqli_query($con, "SELECT * FROM student_list WHERE firstName = '$fname' AND lastName ='$lname'");

		$error = array();

		if (empty($fname)) {
			$error['1'] = "Enter First Name";
		}elseif (mysqli_num_rows($check_rec) > 0) {
			$error['1'] = "Record Already Exist!";
		}

		if (isset($error['1'])) {
			$_SESSION['err'] = 'Record Already Exist!';
			header('Location: student.php');
		

		}

		if (count($error) < 1) {

			$query = "INSERT INTO student_list (firstName,lastName,sex,birthDay)
			VALUES ('$fname','$lname','$sex','$bday')";

			$query_run = mysqli_query($con, $query);

			if ($query_run) {
				$_SESSION['status'] = 'Record Successfully Added';
				header('Location: student.php');
			}
			else
				$_SESSION['status'] = 'Failed to Add Record!';
				header('Location: student.php');
			{

			}
		}
		
	}
	if (isset($_POST['btn_save_staff'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sex = $_POST['sex'];
		$bday = $_POST['bday'];

		$check_rec = mysqli_query($con, "SELECT * FROM staff WHERE firstName = '$fname' AND lastName ='$lname'");

		$error = array();

		if (empty($fname)) {
			$error['1'] = "Enter First Name";
		}elseif (mysqli_num_rows($check_rec) > 0) {
			$error['1'] = "Record Already Exist!";
		}

		if (isset($error['1'])) {
			$_SESSION['err'] = 'Record Already Exist!';
			header('Location: staff.php');
		

		}

		if (count($error) < 1) {

			$query = "INSERT INTO staff (firstName,lastName,sex,birthDay)
			VALUES ('$fname','$lname','$sex','$bday')";

			$query_run = mysqli_query($con, $query);

			if ($query_run) {
				$_SESSION['status'] = 'Record Successfully Added';
				header('Location: staff.php');
			}
			else
				$_SESSION['status'] = 'Failed to Add Record!';
				header('Location: staff.php');
			{

			}
		}
		
	}
	//END OF INSERT FUNCTION

	//UPDATE FUNCTION

	if(ISSET($_POST['btnUpdate'])){
		$update_id = $_POST['user_id'];
		$update_fname = $_POST['update_fname'];
		$update_lname = $_POST['update_lname'];
		$update_email = $_POST['update_email'];
		$update_contact = $_POST['update_contact'];
		$update_access = $_POST['update_access'];


		$strSql = "UPDATE `user_tbl` SET `fname` = '$update_fname', `lname` = '$update_lname', `email_add` = '$update_email', `contact_no` = '$update_contact', `access` = '$update_access' WHERE `id` = '$update_id'";
		$sql = mysqli_query($con, $strSql);

		if ($sql) {
			$_SESSION['status'] = 'Record Updated Successfully';
			header('Location: registered_user.php');
		}else{
			$_SESSION['err'] = 'Failed to edit record!';
			header('Location: registered_user.php');
		}
		
	}

	if(ISSET($_POST['btnUpdateStud'])){
		$update_id = $_POST['user_id'];
		$update_fname = $_POST['update_fname'];
		$update_lname = $_POST['update_lname'];
		$update_sex = $_POST['update_sex'];
		$update_bday = $_POST['update_bday'];

		$strSql = "UPDATE `student_list` SET `firstName` = '$update_fname', `lastName` = '$update_lname', `sex` = '$update_sex', `birthDay` = '$update_bday' WHERE `id` = '$update_id'";
		$sql = mysqli_query($con, $strSql);

		if ($sql) {
			$_SESSION['status'] = 'Record Updated Successfully';
			header('Location: student.php');
		}else{
			$_SESSION['err'] = 'Failed to edit record!';
			header('Location: student.php');
		}
		
	}
	if(ISSET($_POST['btnUpdateStaff'])){
		$update_id = $_POST['staff_id'];
		$update_fname = $_POST['update_fname'];
		$update_lname = $_POST['update_lname'];
		$update_sex = $_POST['update_sex'];
		$update_bday = $_POST['update_bday'];

		$strSql = "UPDATE `staff` SET `firstName` = '$update_fname', `lastName` = '$update_lname', `sex` = '$update_sex', `birthDay` = '$update_bday' WHERE `id` = '$update_id'";
		$sql = mysqli_query($con, $strSql);

		if ($sql) {
			$_SESSION['status'] = 'Record Updated Successfully';
			header('Location: staff.php');
		}else{
			$_SESSION['err'] = 'Failed to edit record!';
			header('Location: staff.php');
		}
		
	}
	//END OF UPDATE FUNCTION


	//DELETE FUNCTION

	if (isset($_POST['btn_del'])) {
		$id = $_POST['student_id'];

		$strSql = "DELETE FROM student_list WHERE id='$id'";
		$sql = mysqli_query($con, $strSql);

		if ($sql) {
			$_SESSION['status'] = 'Record Successfully Deleted';
			header('Location: student.php');
		}else{
			$_SESSION['err'] = 'Something Went Wrong!';
			header('Location: student.php');
		}
	}

	if (isset($_POST['btn_del_user'])) {
		$id = $_POST['student_id'];

		$strSql = "DELETE FROM user_tbl WHERE id='$id'";
		$sql = mysqli_query($con, $strSql);

		if ($sql) {
			$_SESSION['status'] = 'Record Successfully Deleted';
			header('Location: registered_user.php');
		}else{
			$_SESSION['err'] = 'Something Went Wrong!';
			header('Location: registered_user.php');
		}
	}


	if (isset($_POST['satff_del_btn'])) {
		$id = $_POST['staff_id'];

		$strSql = "DELETE FROM staff WHERE id='$id'";
		$sql = mysqli_query($con, $strSql);

		if ($sql) {
			$_SESSION['status'] = 'Record Successfully Deleted';
			header('Location: staff.php');
		}else{
			$_SESSION['err'] = 'Something Went Wrong!';
			header('Location: staff.php');
		}
	}

	//END OF DELETE FUNCTION

	//REGISTER NEW ACCOUNT

	if (isset($_POST['btnRegister'])) {	
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$password = $_POST['password'];
		$confirm_pass = $_POST['confirm_pass'];
		$access = $_POST['access'];

		$validate_email = mysqli_query($con,"SELECT * FROM user_tbl WHERE email_add = '$email'");
		$error = array();

		if (empty($fname)) {
			$error['1'] = ($_SESSION['err'] = "First name is required");
		}elseif (mysqli_num_rows($validate_email) > 0) {
			$error['1'] = ($_SESSION['err'] = "Email address is already taken!");
		}elseif($password != $confirm_pass){
			$error['1'] = ($_SESSION['err'] = "Password did not match!");
		}elseif(strlen($contact) != 11){
			$error['1'] = ($_SESSION['err'] = "Mobile No. should be atleast 11 characters only!");
		}

		if (isset($error['1'])) {
			header('Location: registered_user.php');	
		}

			if (count($error) < 1) {
				$password = md5($password);
				$query = "INSERT INTO user_tbl (fname,lname,email_add,contact_no,password,access)
				VALUES ('$fname','$lname','$email','$contact','$password','$access')";

				$query_run = mysqli_query($con, $query);

				if ($query_run) {
					$_SESSION['status'] = 'Account Successfully Registered';
					header('Location: registered_user.php');
				}
				else
					$_SESSION['status'] = 'Failed to register account!';
					header('Location: registered_user.php');
				{

				}
			}
			
		}

	?>