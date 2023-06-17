<?php 
		session_start(); 	
			if ($_SESSION['email']) {
						
			}else{
					header('location:index.php');
			}			
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MS Student Record</title>

  	<body>

	  	<!--Navbar--->
			<nav class="navbar bg-dark" data-bs-theme="dark">
					<div class="container ml-4">
						<a class="navbar-brand">SMS</a>
					<!-- <form class="d-flex" role="" method="post">
						<input class="form-control me-2" name="txtSearch" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-primary me-1" name="btnSearch" type="submit" data-bs-toggle="modal" data-bs-target="#studentSearchModal">Search</button>
						
					</form> -->
					<a href="logout.php" class="btn btn-danger" type="submit"><i class="fa-solid fa-right-from-bracket"></i></a>
				</div>
			</nav>
	  	<!--End of Navbar -->

			<!-- Adding New Rec -->
			<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="studentModalLabel">Add New Record</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="function.php" method="POST">
							<div class="modal-body">
								<div class="form-group mb-3">				    
									<input type="text" name="fname" class="form-control" placeholder="Enter First name" required>
								</div>
								<div class="form-group mb-3">				   
									<input type="text" name="lname" class="form-control" placeholder="Enter Last name" required>
								</div>
								<div class="form-group mb-3">				 
									<select class="form-select" name="sex" id="inputGroupSelect04" aria-label="Example select with button addon" required>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="form-group mb-3">
									<input type="date" name="bday" class="form-control" placeholder="Birth Day" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>&nbsp;Close</button>
								<button type="submit" name="btnSave" class="btn btn-primary"><i class="fa-solid fa-download"></i>&nbsp;Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Adding New Rec -->

			<!-- View Data -->
			<div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="studentViewLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="studentViewLabel">Student Information</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="student_viewing_data"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- View Data -->

			<!-- Delete Data -->
				<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="deleteStudentModalLabel">Delete Information</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<form action="function.php" method="POST">
								<div class="modal-body">
									<input type="hidden" name="student_id" id="delete_id">
									<h4>Are you sure you want to permanently delete this record?</h4>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
									<button type="submit" name="btn_del" class="btn btn-danger">Yes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<!-- Delete Data -->

			<div class="container mt-3">
				<h5>User Dashboard</h5>
    		</div>
			<div class="container mt-5">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<?php 
									if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
										?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
												<strong><?php echo $_SESSION['status']; ?></strong>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										<?php  
										unset($_SESSION['status']);		

									}
									if (isset($_SESSION['err']) && $_SESSION['err'] !='') {
										?>

										<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<strong><?php echo $_SESSION['err']; ?></strong>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>

										<?php  
										unset($_SESSION['err']);
										
									}
								?>
								<h5 class=" card-title">STUDENT RECORDS
									<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal"><i class="fa-sharp fa-solid fa-plus" style="color: #ffffff;"></i>&nbsp;Add Student
									</button>
								</h5>
							</div>
							<div class="card-body">
								<table class="table table-hover">
									<thead class="table-dark">
										<tr>  	
										<th scope="col">Full Name</th>
										<th scope="col">Sex</th>
											<th scope="col">Birth Day</th>
											<th scope="col" class="text-center">Action</th>
										</tr>
									</thead>
									<tbody class="table-group-divider">
										<?php 
											require('connection.php');

											// if (isset($_POST['btnSearch'])){
											// 	$search = $_POST['txtSearch'];

												// $strSql = "SELECT * FROM student_list WHERE firstName LIKE '%$search%' || lastName LIKE '%$search%'";
											$strSql = "SELECT * FROM student_list";
												$sql = mysqli_query($con, $strSql, );

												if(mysqli_num_rows($sql) > 0){
													while ($row = mysqli_fetch_array($sql)) {
														?>
															<tr>
																<td hidden class="stud_id"><?php echo $row['id'];?></td>
																<td><?php echo $row['firstName'].' '. $row['lastName'];?></td>
																<td><?php echo $row['sex']; ?></td>
																<td><?php echo $row['birthDay']; ?></td>
																<td class="text-center">
																<a href="#" class="btn btn-primary view_btn"><i class="fa-solid fa-eye"></i></a>
																<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_modal<?php echo $row['id']?>"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
																<a href="" class="btn btn-danger del_btn"><i class="fa-solid fa-trash-can"></i></a>
																</td>																						
															</tr>
																<?php
																include 'update_user.php';
															}
															mysqli_free_result($sql);
												}
												else
												{
													echo '<tr>';
														echo '<td colspan="5" align="center">No Records Found!</td>';
													echo'</tr>';
												}			
									
										// }									
										?>

									</tbody>
									</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
			<script src="js/index.js"></script>

			<!-- <script>

				// $(document).ready(function(){
					
				// 	//DELETE FUNCTION
				// 	$('.del_btn').click(function (e){
				// 		e.preventDefault();

				// 		var stud_id = $(this).closest('tr').find('.stud_id').text();
				// 		// console.log(stud_id);
				// 		$('#delete_id').val(stud_id);
				// 		$('#deleteStudentModal').modal('show');
				// 	});
				// 	//END OF DELETE

				// 	//READ/VIEW FUNCTION
				// 	$('.view_btn').click(function(e){
				// 		e.preventDefault();

				// 		var stud_id = $(this).closest('tr').find('.stud_id').text();
				// 		// console.log(stud_id);
						
				// 		$.ajax({
				// 			type: "POST",
				// 			url: "function.php",
				// 			data: {
				// 				'checking_viewbtn':true,
				// 				'student_id': stud_id,

				// 			},
							
				// 			success: function(response){
				// 				$('.student_viewing_data').html(response);
				// 				$('#studentViewModal').modal('show');
				// 			}
				// 		});
				// 	});
				// });
			</script> -->
	   
  </body>
</html>