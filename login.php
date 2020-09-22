<?php

session_start();
  include ("../config.php"); 
  

// ====================login user=====================================	
		   function luser($user,$passwd){
			 
			 
	  	         if ($getcode==00){
				     
					 $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
			         $sql="select * from pro_cache_user where staff_id='".$_POST['staffID']."' and branch='".$_POST['passwd']."'";
					 $result = $con->query($sql);
					 while($row = $result->fetch_assoc()) {
						 echo $_SESSION["staffID"]=$row['staff_id'];
						 echo $_SESSION["name"]=$row['name'];
		                 echo $_SESSION["phone"]=$row['phone'];
		                 echo $_SESSION["mail"]=$row['email'];
		                 echo $_SESSION["status"]=$row['status'];
		                 echo $_SESSION["address"]=$row['address'];
		                 echo $_SESSION["uid"]=$row['id'];
						 }
						 if ($_SESSION["status"]==0){
						 	header("Location:login.php?pg=login&sms=notallow");
						 }
						 else {
				         header("Location:index.php");
				        }
					
		          }
		          else {
			             header("Location:login.php?pg=login&sms=otptime");
                  }   

		     
		  }


// ====================login action=====================================	
	 if (isset($_POST['signin'])){
	 	$sql="select staff_id from pro_cache_user where staff_id='".$_POST['staffID']."'";
	 	$result = mysqli_query($con, $sql);
	 	if (mysqli_num_rows($result) == 0) {
	 		// echo '<div class="alert alert-warning" role="alert">Please contact to payroll team!</div>';
	 		header("Location:login.php?pg=login&sms=info");
	 	}
	 	else {
	 		$sql="select branch from pro_cache_user where branch='".$_POST['passwd']."'";
	 		$result = mysqli_query($con, $sql);
	 		if (mysqli_num_rows($result) == 0) {
	 			header("Location:login.php?pg=login&sms=wrongpass");
	 		}
	 		else {
	 			$user=$_POST['staffID'];$passwd=$_POST['passwd'];
	 			 luser($user,$passwd);
	 			}
	 	}
	 }


?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>One Click</title>
  <link rel="icon" type="image/png" href="../images/icons/imglogo_Jik_icon.ico"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
	.logos{ border-radius:15px; width:70px; 
	         -webkit-box-shadow: 0px 0px 5px 7px rgba(0,0,0,0.08);
             -moz-box-shadow: 0px 0px 5px 7px rgba(0,0,0,0.08);
              box-shadow: 0px 0px 5px 7px rgba(0,0,0,0.08);}
  /*img {
   width: 100%;
   height: auto;
   background-size:contain
  }*/
  .login-page {
     background-image: url('../images/sea_moon.jpg');
     background-size: cover;
     background-position: top;
      background-repeat: no-repeat;
 
	}
	.headlg{ width:100%; padding:5px;}
	.login-card-body{border-radius: 20px !important}
	.login-logos{background-color:rgb(0,0,0,0.3) !important;color: white !important;border-radius: 15px !important}
	a{color: white !important}
	.login-box{border-radius: 15px !important}
	label{font-size: 18px !important}
	h4{color: white}
	
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo text-center">
                <!--<a href="index2.html"><b>Admin</b>LTE</a>-->
               <img class="logos" src="../images/imglogo.jpg"/>
				<a >&nbsp; <b>One Click </b></a>
                
                
            </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body ">
      <?php
        if (!isset($_GET['sms'])){
			echo '<p class="login-box-msg">Sign in to start your session</p>';
			
			}
	    else if ($_GET['sms']=='error'){
			echo '<div class="alert alert-warning" role="alert"> Sorry your infomation not meet in system,<br/> Please contact system administrator!</div>';
		}
		else if ($_GET['sms']=='active'){
			echo '<p class="login-box-msg">Please input your otp to verify within 3 minute!</p>';
		}
		else if ($_GET['sms']=='otptime'){
			echo '<p class="login-box-msg">Your otp is not correct or time out of time!</p>';
			  
		}
		else if ($_GET['sms']=='errsv'){
			echo '<div class="alert alert-warning" role="alert">Can not login, Server not respone!</div>';
			  
		}
		else if ($_GET['sms']=='notallow'){
			echo '<div class="alert alert-warning" role="alert">Your account has been block. <br>Please contact to admin!</div>';
			  
		}
		else if ($_GET['sms']=='info'){
			echo '<div class="alert alert-warning" role="alert">Your Phone Number is not register!</div>';
			  
		}
		else if ($_GET['sms']=='suss'){
			echo '<div class="alert alert-success" role="alert">Please Login again with new phone number!</div>';
			  
		}
		else if ($_GET['sms']=='susscp'){
			echo '<div class="alert alert-success" role="alert">Please Login again with the new password!</div>';
			  
		}
		else if ($_GET['sms']=='wrongpass'){
			echo '<div class="alert alert-warning" role="alert">Incorrect password.<br>Please Try again!</div>';
			  
		}

		?>

       <form action="#" method="post" autocomplete="off" >
            <div class="form-group input-group-lg " >
				          <label>Phone Number</label>
                          <input type="text" class="form-control" name="staffID" placeholder=""  required >
                       
                        </div>
                        <div class="form-group input-group-lg ">
                        <label>Password</label>
                          <input type="password" class="form-control" name="passwd" placeholder="" required>
                        </div>
                            <div class="row">
						          <div class="col-12 text-center">
						            <div class="icheck-primary">
						              <button type="submit" name="signin" class="btn btn-danger btn-block btn-lg" style="border-radius: 15px !important">Sign In</button>
						            </div>
						          </div>
						          <!-- /.col -->
						      <div class="col-12 text-center">
						            <br>
						            <label for="remember"><a style="color: blue !important" class="text-left" href="sendmail.php">Forget password</a> </label> 
						   </div>
						          <!-- /.col -->
					 </div>
				</div>
            </form>
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>

