<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['Update']))
  {
    $eid=$_SESSION['uid'];
    $jop_id=$_POST['jop_id'];
    $fath_natio_id=$_POST['fath_natio_id'];
    $jop_sec=$_POST['jop_sec'];
    $nationality=$_POST['nationality'];
    $avg=$_POST['avg'];
    $sec=$_POST['sec'];
    $src=$_POST['src'];
    $year=$_POST['year'];
    $major1=$_POST['major1'];
	$major2=$_POST['major2'];
	$major3=$_POST['major3'];
	$major4=$_POST['major4'];
	$major5=$_POST['major5'];
	$major6=$_POST['major6'];
	$money_id=$_POST['money_id'];
	
	
    
     $query=mysqli_query($con, "update request set  jop_id='$jop_id',  fath_natio_id ='$fath_natio_id',jop_sec ='$jop_sec',  nationality='$nationality', avg ='$avg', sec ='$sec',  src='$src', year='$year',   major1 ='$major1',major2='$major2',major3 ='$major3',major4 ='$major4', major5='$major5',major6='$major6',  money_id='$money_id' where id='$eid'");
    if ($query) {
    $msg="Your Expirence has been updated.";
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

  <title>تعديل الطلب</title>

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
          <h1 class="h3 mb-4 text-gray-800">تعديل الطلب</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

<form  action="editmyexp.php" method="post" enctype="multipart/form-data">
<?php
$empid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from request where id =$empid");
$num=mysqli_num_rows($query);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($query)) {

?>

                <div class="row">
                <div class="col-4 mb-3">الرقم الوظيفي للأب</div>
                   <div class="col-8 mb-3">   <input onclick="validation()" type="number" class="form-control form-control-user" id="jop_id" name="jop_id" aria-describedby="emailHelp" value="<?php echo $row['jop_id'];?>"  dir="rtl"></div>
                    <p id="demo"></p>
					</div>  

					
                    <div class="row">
                      <div class="col-4 mb-3">الرقم الوطني للأب</div>
                     <div class="col-8 mb-3">  <input onclick="validation()" type="number" class="form-control form-control-user" id="fath_natio_id" name="fath_natio_id" aria-describedby="emailHelp" value="<?php echo $row['fath_natio_id'];?>" required="true" dir="rtl"></div>  
                     </div>

                    <div class="row">
                    <div class="col-4 mb-3">وظيفة الأب</div>
                    <div class="col-8 mb-3">
                  
                       <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="jop_sec" name="jop_sec" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['jop_sec']; ?>		                                         
                      <option value="عضو هيئة تدريس">عضو هيئة تدريس</option>
                       <option value="إداري">إداري</option>
                       <option value="إداري">متقاعد</option>
                       <option value="غير ذلك">غير ذلك</option>
                         </select>
                         </div>
                      </div>
                       


                    <div class="row">
                      <div class="col-4 mb-3">جنسية الأب</div>
                     <div class="col-8 mb-3">
                     
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="nationality" name="nationality" required="true" dir="rtl">          
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['nationality']; ?>		                                         
                      <option value="أردنية">أردنية</option>
                       <option value="غير أردنية">غير أردنية</option>
                         </select>
                         </div>
                      </div>
					
					
					
                    <div class="row">
                      <div class="col-4 mb-3">معدل الثانوية العامة</div>
                     <div class="col-8 mb-3">  
					 <input type="text" class="form-control form-control-user" id="avg" name="avg"  value="<?php echo $row['avg'];?>" required="true" dir="rtl"></div>  
                     </div>
                    <div class="row">
                    <div class="col-4 mb-3">فرع الثانوية العامة</div>
                    <div class="col-8 mb-3">
                   
				   
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="sec" name="sec" value="" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['sec']; ?>		                                         
					<option value="علمي">علمي</option>
                       <option value="أدبي">أدبي</option>
                       <option value="زراعي">زراعي</option>
                       <option value="منزلي">منزلي</option>
                       <option value="غير ذلك">غير ذلك</option>
                         </select>
                         </div>
                      </div>


                    <div class="row">
                      <div class="col-4 mb-3">مصدر شهادة الثانوية العامة</div>
                     <div class="col-8 mb-3">
                     
                     <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="src" name="src" value="" required="true" dir="rtl"> 
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['src']; ?>		                                         
                      <option value="أردنية">أردنية</option>
                       <option value="غير أردنية">غير أردنية</option>
                         </select>	
                         </div>
                      </div>

					

                    <div class="row">
                     <div class="col-4 mb-3">سنة شهادة الثانوية العامة</div>
                   <div class="col-8 mb-3"> 
                  
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="year" name="year" value="" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['year']; ?>		                                         
					<option value="سنة حالية">سنة حالية</option>
                       <option value="سنوات سابقة">سنوات سابقة</option>
                         </select>
                         </div>
                      </div>

					       

            <div class="row">
                    <div class="col-4 mb-3">التخصص الأول</div>
                    <div class="col-8 mb-3">
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="major1" name="major1" value="" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['major1']; ?>		                                         
					 
					
					<option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
					 
                         </select>
                         </div>
                      </div>
                    
					  <div class="row">
					  
                    <div class="col-4 mb-3">التخصص الثاني</div>
                    <div class="col-8 mb-3">
                   
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="major2" name="major2" value="" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['major2']; ?>		                                         
                     	<option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                         </select>
                         </div>
                      </div>


					 <div class="row">
                    <div class="col-4 mb-3">التخصص الثالث</div>
                    <div class="col-8 mb-3">
                  
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="major3" name="major3" value="" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['major3']; ?>		                                         
                   			<option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                         </select>
                         </div>
                      </div>





					 <div class="row">
                    <div class="col-4 mb-3">التخصص الرابع</div>
                    <div class="col-8 mb-3">
                 
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="major4" name="major4" value="<?php echo $row['major4'];?>" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['major4']; ?>		                                         


					  <option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                         </select>
                         </div>
                      </div>

            <div class="row">
                    <div class="col-4 mb-3">التخصص الخامس</div>
                    <div class="col-8 mb-3">
                   
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="major5" name="major5" value="<?php echo $row['major5'];?>" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['major5']; ?>		                                         
   


				       <option value="طب">طب</option>
					  
                       <option value="هندسة">هندسة</option>
					  
						</select>
                         </div>
                      </div>

					 <div class="row">
                    <div class="col-4 mb-3">التخصص السادس</div>
                    <div class="col-8 mb-3">
                   
                    <select  class="form-select form-select-lg mb-3" aria-label="Default select example" id="major6" name="major6" value="" required="true" dir="rtl">
                     <?php echo "<option style='display:none' selected='selected'</option>". $row['major6']; ?>		                                         
                        	<option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
						</select>
                         </div>
                      </div>
                    
					
     
						 <div class="row">
                    <div class="col-4 mb-3">رقم الوصل المالي</div>
                    <div class="col-8 mb-3">
                      <input  type="number" class="form-control form-control-user" id="money_id" name="money_id" aria-describedby="emailHelp" value="<?php echo $row['money_id'];?>" required="true"></div>
				 </div>
					
					
					
                   <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" id="Update" name="Update"  value="Update" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
	</form>
					
<?php } ?>
                   


<?php } else {?>

  <div class="row" style="margin-top:4%">
                      <div class="col-12" style="font-size:18px; color:red;">First Add your experience details after that you can edit experience details.</div>
                   
                    </div>
<?php } ?>


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



function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
  
  
  

  </script>
  


</body>

</html>
<?php }  ?>
