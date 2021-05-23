<?php
include('includes/dbconnection.php');
error_reporting(0);
if(isset($_POST['submit']))
  {
    $national_id=$_POST['national_id'];
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $birthdate=$_POST['birthdate'];
    $ret=mysqli_query($con, "select national_id from register where national_id='$national_id'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This National Id already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into register(national_id, full_name, email, phone, password ,gender ,birthdate) value('$national_id', '$full_name', '$email', '$phone', '$password' ,'$gender' ,'$birthdate')");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
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

 	<div id="center_button">
	<a href="http://localhost/erms/" class="w3-btn w3-black">الصفحة الرئيسية</a>
    </div>
	
  <title>نظام قبول طلبات أبناء العاملين (Mutah) </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript">
function checkpass()
{
if(document.register.password.value!=document.register.Repeatpassword.value)
{
alert('New password and Confirm password field does not match');
document.register.Repeatpassword();
return false;
}
return true;
} 

</script>
</head>

<body class="bg-gradient-primary">
 

  <div class="container">
    <h3 align="center" style="color: black; padding-top: 1%" dir="rtl" >نظام قبول طلبات أبناء العاملين (Mutah)</h3>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">انشاء حساب جديد</h1>
              </div>
              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
              <form class="user" name="register" method="post" onsubmit="return checkpass();">
              <!-- 

              <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="empcode" name="empcode" placeholder="Enter your Employee Code" pattern="[0-9]+" required="true">
                </div>

                -->

                <div class="form-group ">
                  <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                    <input type="text" class="form-control form-control-user" id="national_id" name="national_id" placeholder="الرقم الوطني" pattern="[0-9]+" required="true" dir="rtl">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="full_name" name="full_name" placeholder="الإسم بالكامل"  required="true" dir="rtl">
                  </div>

                <!-- </div> -->

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="البريد الإلكتروني" required="true" dir="rtl">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="رقم الهاتف" required="true"dir="rtl">
                </div>
				
				 <div class="form-group row">
				  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="Repeatpassword" name="Repeatpassword" placeholder="تأكيد كلمة السر" required="true"dir="rtl">
                  </div>
				  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="كلمة السر" required="true"dir="rtl">
                  </div>
				  
                 
                  <!-- password -->
                 
                </div>
				
<?php if($row['gender']=="Male")
{?>
     <div class="form-group">
	 <input  type="radio" name="gender" value="Female">اثنى
	  <br />
<input type="radio" id="gender" name="gender" value="Male" checked="true">ذكر


  </div>
<?php 
}
   else if($row['gender']=="Female") 
{?>
     <div class="form-group">
	  <input type="radio" name="gender" value="Female" checked="true">اثنى
	   <br />
 <input type="radio" id="gender" name="gender" value="Male" >ذكر

    </div>
<?php } 
   else 
{ ?>
<div class="form-group">
 <input type="radio" name="gender" value="Female">اثنى
 <br />
 <input type="radio" id="gender" name="gender" value="Male" >ذكر
 <br>
        </div>
<?php } ?>
			
			<div class="form-group ">
			<input name="birthdate" id ="birthdate"  type="date"  value="<?php echo date('d/m/Y',strtotime($data["congestart"])) ?>"/>
               </div>

				

              <input type="submit" name="submit" value="انشاء حساب" class="btn btn-primary btn-user btn-block">
                
                </form>
                <hr>
             
              <div class="text-center">
                <a class="small" href="loginerms.php">لديك حساب بالفعل</a>
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

    <script type="text/javascript">
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016"); 
  </script>
  
</body>

</html>
