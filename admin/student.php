<?php
    session_start();    
    if ($_SESSION['email']) {
                
    }else{
            header('location:../index.php');
    }  
	include('includes/header.php');

 ?>
    <!-- Adding New Rec -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="studentModalLabel">Add New Record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="admin_function.php" method="POST">
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
    <!--End of Adding New Rec -->

    <!-- Delete Data -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteStudentModalLabel">Delete Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="admin_function.php" method="POST">
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

  	<div class="container-fluid px-4">
        <h1 class="mt-4">Students</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Students</li>
            <button type="button" class="btn btn-primary ms-auto me-0 me-md-0 my-2 my-md-0" data-bs-toggle="modal" data-bs-target="#studentModal"><i class="fa-sharp fa-solid fa-plus" style="color: #ffffff;"></i>&nbsp;Add Student
            </button> 
        </ol>
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
                        <h4>Registered Students</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">  
                            <thead class="table-dark"> 
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Birth Day</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php 
                                    require('../connection.php');

                                    $strSql = "SELECT * FROM student_list";
                                    $sql = mysqli_query($con, $strSql);

                                        if(mysqli_num_rows($sql) > 0){
                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>      
                                            <tr>
                                                <td hidden class="stud_id"><?php echo $row['id'];?></td>
                                                <td><?php echo $row['firstName'];?></td>
                                                <td><?php echo $row['lastName'];?></td>
                                                <td><?php echo $row['sex'];?></td>
                                                <td><?php echo $row['birthDay'];?></td>
                                                <td class="text-center">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_modal<?php echo $row['id']?>"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                                                <a href="" class="btn btn-danger del_btn"><i class="fa-solid fa-trash-can"></i></a>
                                              </td>
                                            </tr>
                                            <?php
                                            include 'admin_update_student.php';
                                            }
                                            mysqli_free_result($sql);
                                        }
                                        else{
                                            echo '<tr>';
                                                echo '<td colspan="5" align="center">No Records Found!</td>';
                                            echo'</tr>';
                                        }
                                ?>
              
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>
         
        </div>
   	</div>
       

 <?php 
	include('includes/footer.php');
	include('includes/script.php');

 ?>