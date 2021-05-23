<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
	if(isset($_GET['update']))
  {
	$mohamed=$_GET['update'];
    $d_member=$_GET['d_member'];
    $admins=$_GET['admins'];
	
     $query=mysqli_query($con, "update majors set d_member='$d_member', admins='$admins' where id_m='$mohamed' ");
    if ($query) {
    $msg="Your Expirence has been updated.";
	print_r($query);
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

  <title>معلومات الطالب</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-4 text-gray-800">معلومات الطالب</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

 <div class="table-responsive">
  <form  action="numberofstudent.php" method="get" >

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>رقم المادة</th>
  <th>الكلية</th>
  <th>التخصص</th>
  <th>عضو هيئة تدريس</th>
  <th>اداريين</th>
  <th>العملية</th>
</tr>

<?php
$ret=mysqli_query($con,"select * from majors");
while ($row=mysqli_fetch_array($ret)) {

?>
<tr> 
  <td><?php  echo $row['id_m'];?></td>
   <td><?php echo $row['college'];?></td>
    <td><?php echo $row['spec'];?></td>
  <td>
  	<input type="number" class="form-control form-control-user" id="d_member" name="d_member" aria-describedby="emailHelp" value="<?php echo $row['d_member'];?>" required="true" >  
 </td>  
  <td>
    <input type="number" class="form-control form-control-user" id="admins" name="admins" aria-describedby="emailHelp" value="<?php echo $row['admins'];?>" required="true" >  
  </td>
  <td>
  <div class="row" style="margin-top:4%">
               <div class="col-4"></div>
              <div class="col-4">			
			<a href="numberofstudent.php?update=<?php echo $row['id_m'];?>">update</a>  
       </div>
     </div>
  </td>
</tr>


<?php 

}?>

 

</table>



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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php }  ?>
