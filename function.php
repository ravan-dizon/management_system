<?php 
	session_start();
	require_once('connection.php');

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
			header('Location: studentList.php');
		

		}

		if (count($error) < 1) {

			$query = "INSERT INTO student_list (firstName,lastName,sex,birthDay)
			VALUES ('$fname','$lname','$sex','$bday')";

			$query_run = mysqli_query($con, $query);

			if ($query_run) {
				$_SESSION['status'] = 'Record Successfully Added';
				header('Location: studentList.php');
			}
			else
				$_SESSION['status'] = 'Failed to Add Record!';
				header('Location: studentList.php');
			{

			}
		}
		
	}
	
	if (isset($_POST['checking_viewbtn'])) {
		$s_id = $_POST['student_id'];
		// echo $return = $s_id;
		$strSql = "SELECT * FROM student_list WHERE id ='$s_id'";
		$sql = mysqli_query($con,$strSql);

		if (mysqli_num_rows($sql) > 0) {
			foreach ($sql as $row) {
				echo $return = '
					<h5 hidden>ID : '.$row['id'].'</h5>
					<h5>First Name : '.$row['firstName'].'</h5>
					<h5>Last Name : '.$row['lastName'].'</h5>
					<h5>Sex : '.$row['sex'].'</h5>
					<h5>Birth Day : '.$row['birthDay'].'</h5>
					<h5>Date Added : '.$row['addedAt'].'</h5>
				';
			}
		}	
	}
	else{
		echo $return = "<h5>No Record Found! </h5>";
	}
 
	if(ISSET($_POST['btnUpdate'])){
			$update_id = $_POST['user_id'];
			$update_fname = $_POST['update_fname'];
			$update_lname = $_POST['update_lname'];
			$update_sex = $_POST['update_sex'];
			$update_bday = $_POST['update_bday'];

			$strSql = "UPDATE `student_list` SET `firstName` = '$update_fname', `lastName` = '$update_lname', `sex` = '$update_sex', `birthDay` = '$update_bday' WHERE `id` = '$update_id'";
			$sql = mysqli_query($con, $strSql);

			if ($sql) {
				$_SESSION['status'] = 'Record Updated Successfully';
					header('Location: studentList.php');
			}else{
				$_SESSION['err'] = 'Failed to edit record!';
				header('Location: studentList.php');
			}
			
		}

		
	if (isset($_POST['btn_del'])) {
		$id = $_POST['student_id'];

		$strSql = "DELETE FROM student_list WHERE id='$id'";
		$sql = mysqli_query($con, $strSql);

		if ($sql) {
			$_SESSION['status'] = 'Record Successfully Deleted';
				header('Location: studentList.php');
		}else{
			$_SESSION['err'] = 'Something Went Wrong!';
			header('Location: studentList.php');
		}
	}

	

 ?>