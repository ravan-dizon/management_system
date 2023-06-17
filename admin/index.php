<?php

    session_start();    
    if ($_SESSION['email']) {
                
    }else{
            header('location:../index.php');
    }  
      
	include('includes/header.php');

 ?>
  	<div class="container-fluid px-4">
        <h1 class="mt-4">Student Management System</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total User
                        <?php 
                            require('../connection.php');
                            $strSql = "SELECT * FROM user_tbl";
                            $sql = mysqli_query($con, $strSql);

                            if($user_tot = mysqli_num_rows($sql)){
                                echo '<h4 class="mb-0">'.$user_tot.'</h4>';
                            }else{
                                echo '<h4 class="mb-0">0</h4>';
                            }

                         ?>
                        
                    </div>
                   
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="registered_user.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total Student
                        <?php 
                            require('../connection.php');
                            $strSql = "SELECT * FROM student_list";
                            $sql = mysqli_query($con, $strSql);

                            if($user_tot = mysqli_num_rows($sql)){
                                echo '<h4 class="mb-0">'.$user_tot.'</h4>';
                            }else{
                                echo '<h4 class="mb-0">0</h4>';
                            }

                         ?>
                    </div>
                    
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="student.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total Staff
                        <?php 
                            require('../connection.php');
                            $strSql = "SELECT * FROM staff";
                            $sql = mysqli_query($con, $strSql);

                            if($user_tot = mysqli_num_rows($sql)){
                                echo '<h4 class="mb-0">'.$user_tot.'</h4>';
                            }else{
                                echo '<h4 class="mb-0">0</h4>';
                            }

                         ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="staff.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
   	</div>
       

 <?php 
	include('includes/footer.php');
	include('includes/script.php');

 ?>