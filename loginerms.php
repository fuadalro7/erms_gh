<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $national_id=$_POST['national_id'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"select national_id from register where  national_id='$national_id' &&	password='$password' ");
    $ret=mysqli_fetch_array($query);
	
    if($ret>0){
		
      $_SESSION['uid']=$national_id;
     header('location:welcome.php');
	 exit();
    }
    else{
      $msg="Invalid Details.";
    }
  }
  ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="Employee Record management System in php and mysql">
  <meta name="description" content="Employee Record management System in php and mysql">
  <meta name="author" content="Sarita Pandey">

  <title>نظام التسجيل</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
  
  	<div id="center_button">
	<a href="http://localhost/erms/" class="w3-btn w3-black">الصفحة الرئيسية</a>
    </div>
			  
    <h3 align="center" style="color: black; padding-top: 2%">صفحة التسجيل</h3>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            
			

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">مرحبا بك</h1>
                  </div>
                  <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="national_id" name="national_id" aria-describedby="emailHelp" placeholder="Enter National Id..." required="true">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="password" required="true">
                    </div>
                    
                  
                    <p> <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="تسجيل الدخول"></p>

                    <hr>
                  
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgetpassword.php">نسيت كلمة السر</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="registererms.php">انشاء حساب جديد</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>