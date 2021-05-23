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
    $jop_id=$_POST['jop_id'];
    $fath_natio_id=$_POST['fath_natio_id'];
    $jop_sec=$_POST['jop_sec'];
    $nationality=$_POST['nationality'];
	$jop_upl = $_FILES['jop_upl']['name'];  
    $jop_upl_tmp =  $_FILES['jop_upl']['tmp_name']; 
    move_uploaded_file($jop_upl_tmp,"../image/$jop_upl");
    $avg=$_POST['avg'];
    $sec=$_POST['sec'];
    $src=$_POST['src'];
    $year=$_POST['year'];
	$grades_upl = $_FILES['grades_upl']['name'];  
    $grades_upl_tmp =  $_FILES['grades_upl']['tmp_name']; 
    move_uploaded_file($grades_upl_tmp,"../image/$grades_upl");
    $major1=$_POST['major1'];
	$major2=$_POST['major2'];
	$major3=$_POST['major3'];
	$major4=$_POST['major4'];
	$major5=$_POST['major5'];
	$major6=$_POST['major6'];
	$money_id=$_POST['money_id'];
	$money_upl = $_FILES['money_upl']['name'];  
    $money_upl_tmp =  $_FILES['money_upl']['tmp_name']; 
    move_uploaded_file($money_upl_tmp,"../image/$money_upl");
	
    $req_date=$_POST['req_date'];
	
$query=mysqli_query($con, "INSERT INTO request (id,jop_id,fath_natio_id,jop_sec,nationality,jop_upl,avg,sec,src,year,grades_upl,major1,major2,major3,major4,major5,major6,money_upl,money_id,req_date)VALUES('$eid','$jop_id','$fath_natio_id','$jop_sec','$nationality','$jop_upl','$avg','$sec','$src','$year','$grades_upl','$major1','$major2','$major3','$major4','$major5','$major6','$money_upl','$money_id','$req_date')");
    if ($query) {
    $msg="Your Request data has been submitted succeesfully.";
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

  <title>تقديم الطلب</title>

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
          <h1 class="h3 mb-4 text-gray-800">تقديم الطلب</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php 
$empid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from request where id=$empid");
$row=mysqli_fetch_array($query);
if($row>0)
{

?>
<p style="font-size:16px; color:red" align="center">لقد تم تقديم الطلب بنجاح</p>

<?php } else {?>
<form  action="myexp.php" method="post" enctype="multipart/form-data">

               <div class="row">
                <div class="col-4 mb-3">الرقم الوظيفي للأب</div>
                   <div class="col-8 mb-3">   <input type="number" class="form-control form-control-user" id="jop_id" name="jop_id" aria-describedby="emailHelp" value="" required="true" dir="rtl"></div>
                    </div>  

                    <div class="row">
                      <div class="col-4 mb-3">الرقم الوطني للأب</div>
                     <div class="col-8 mb-3">  <input type="number" class="form-control form-control-user" id="fath_natio_id" name="fath_natio_id" aria-describedby="emailHelp" value="" required="true" dir="rtl"></div>  
                     </div>

                    <div class="row">
                    <div class="col-4 mb-3">وظيفة الأب</div>
                    <div class="col-8 mb-3">
               
                       <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="jop_sec" name="jop_sec" required="true" dir="rtl">
                        <option selected>انقر لاختيار نوع الوظيفة</option>
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
                     
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="nationality" name="nationality" required="true" dir="rtl">
                        <option selected>انقر لاختيار جنسية الأب</option>
                      <option value="أردنية">أردنية</option>
                       <option value="غير أردنية">غير أردنية</option>
                         </select>
                         </div>
                      </div>
					
					
					              <div class="form-group">
                        <label for="">صورة الإثبات الوظيفي</label>
                        <input type="file" name="jop_upl" class="form-control">
                        </div>
					
					
                    <div class="row">
                      <div class="col-4 mb-3">معدل الثانوية العامة</div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="avg" name="avg"  value="" required="true" dir="rtl"></div>  
                     </div>
                    <div class="row">
                    <div class="col-4 mb-3">فرع الثانوية العامة</div>
                    <div class="col-8 mb-3">
                    
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="sec" name="sec" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار فرع الثانوية العامة </option>
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
                   
				   
                     <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="src" name="src" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار مصدر شهادة الثانوية العامة</option>
                      <option value="أردنية">أردنية</option>
                       <option value="غير أردنية">غير أردنية</option>
                         </select>
                         </div>
                      </div>

					

                    <div class="row">
                     <div class="col-4 mb-3">سنة شهادة الثانوية العامة</div>
                   <div class="col-8 mb-3"> 
                  
				  
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="year" name="year" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار سنة شهادة الثانوية العامة</option>
                      <option value="سنة حالية">سنة حالية</option>
                       <option value="سنوات سابقة">سنوات سابقة</option>
                         </select>
                         </div>
                      </div>

					
					  <div class="form-group">
                    <label for="grades_upl">صورة كشف علامات الثانوية العامة</label>
                    <input type="file" name="grades_upl" class="form-control">
                    </div>


            <div class="row">
                    <div class="col-4 mb-3">التخصص الأول</div>
                    <div class="col-8 mb-3">
                    
					
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="major1" name="major1" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار التخصص الأول</option>
                        
                     <option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                       
                         </select>
                         </div>
                      </div>
                    



					  <div class="row">
                    <div class="col-4 mb-3">التخصص الثاني</div>
                    <div class="col-8 mb-3">
                   
				   
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="major2" name="major2" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار التخصص الثاني</option>
                        
                     <option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                    
                         </select>
                         </div>
                      </div>


					 <div class="row">
                    <div class="col-4 mb-3">التخصص الثالث</div>
                    <div class="col-8 mb-3">
                  
				  
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="major3" name="major3" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار التخصص الثالث</option>
                     
                      <option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                      
                         </select>
                         </div>
                      </div>


					 <div class="row">
                    <div class="col-4 mb-3">التخصص الرابع</div>
                    <div class="col-8 mb-3">
                   
				   
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="major4" name="major4" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار التخصص الرابع</option>
                    <option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                         </select>
                         </div>
                      </div>

            <div class="row">
                    <div class="col-4 mb-3">التخصص الخامس</div>
                    <div class="col-8 mb-3">
                    
					
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="major5" name="major5" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار التخصص الخامس</option>
                     <option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                         </select>
                         </div>
                      </div>

					 <div class="row">
                    <div class="col-4 mb-3">التخصص السادس</div>
                    <div class="col-8 mb-3">
                 
				 
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="major6" name="major6" value="" required="true" dir="rtl">
                        <option selected>انقر لاختيار التخصص السادس</option>
                       <option value="طب">طب</option>
                       <option value="هندسة">هندسة</option>
                         </select>
                         </div>
                      </div>
                    
					
           <div class="row">
                      <div class="col-4 mb-3">تاريخ إرسال الطلب</div>
                     <div class="col-8 mb-3">
                      <input type="date" class="form-control form-control-user" id="req_date" name="req_date" aria-describedby="emailHelp" value="">
                    </div></div>

						 <div class="row">
                    <div class="col-4 mb-3">رقم الوصل المالي</div>
                    <div class="col-8 mb-3">
                      <input type="number" class="form-control form-control-user" id="money_id" name="money_id" aria-describedby="emailHelp" value="" required="true" dir="rtl"></div>
                    </div>
					
					
					 <div class="form-group">
                          <label for="">صورة الوصل المالي</label>
                         <input type="file" name="money_upl" class="form-control" required="true" dir="rtl">
                     </div>
					
					
                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="submit" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
					
				
                  
                  </form>

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
  </script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
<?php }  ?>
