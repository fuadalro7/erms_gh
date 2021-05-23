<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $eid=$_SESSION['uid'];
    $full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
    $birthdate=$_POST['birthdate'];

     $query=mysqli_query($con, "update register set full_name='$full_name' ,
	  phone='$phone',
	  gender='$gender',
	  email='$email',
	  birthdate='$birthdate'
	 where national_id='$eid'");
    if ($query) {
    $msg="Your profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>صفحتي الشخصية</title>
  

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">صفحتي الشخصية</h1>

<p style="font-size:16px; color:red" align="center">
 <?php if($msg){ echo $msg;}  ?> </p>

<form class="user" method="post" action="">
  <?php
$eid=$_SESSION['uid'];
$ret=mysqli_query($con,"select * from register where national_id='$eid'");
$cnt=1;

while ($row=mysqli_fetch_array($ret)) {

?>
               <div class="row">
                <div class="col-4 mb-3">الاسم الكامل</div>
                   <div class="col-8 mb-3">  
				   <input type="text" class="form-control form-control-user" id="full_name" name="full_name" aria-describedby="emailHelp" required="true" value="<?php  echo $row['full_name'];?>"></div>
                    </div> 
					
                  
					
                    <div class="row">
                    <div class="col-4 mb-3">رقم الهاتف</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="phone" name="phone" aria-describedby="emailHelp" required="true" value="<?php  echo $row['phone'];?>"></div>
                    </div>
					
					<div class="row">
                    <div class="col-4 mb-3">الايميل</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" required="true" value="<?php  echo $row['email'];?>"></div>
                    </div>
					
					 <div class="row">
                      <div class="col-4 mb-3">تاريخ الميلاد</div>
                    <div class="col-8  mb-3">
                      <input type="text" class="form-control form-control-user" value="<?php  echo $row['birthdate'];?>" id="jDate" name="birthdate" aria-describedby="emailHelp">
                    </div>
					</div>
				
					
					 <div class="row">
                      <div class="col-4 mb-3">الجنس</div>
                    <div class="col-4 mb-3">
                    
<?php if($row['gender']=="Male")
{?>
    <input type="radio" id="gender" name="gender" value="Male" checked="true">ذكر
   <input type="radio" name="gender" >انثى
                   <?php }   else if($row['gender']=="Female") {?>
 <input type="radio" id="gender" name="gender"  >ذكر
  <br>
  <input type="radio" name="gender" value="Female" checked="true">انثى
                   <?php } else { ?>
 <input type="radio" id="gender" name="gender" value="Male" >ذكر
  <input type="radio" name="gender" value="Female">انثى
                   <?php } ?>
				   <br> 
                    </div>
					 <br>
					</div>
<?php } ?>
                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
                  
                  </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016"); 
  </script>

</body>

</html>
<?php }  ?>
