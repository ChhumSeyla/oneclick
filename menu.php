 <?php 
 $dates=date("Ymdhi");
    if (isset($_GET['Register'])){
                     echo '<script> $(document).ready(function(){$("#Register").modal("show");});</script>';  
    }

if(isset($_REQUEST['btnADD'])){
    $title = $_REQUEST['title'];
    $username = $_REQUEST['Uname'];
    $password = $_REQUEST['password'];
    $file = $_FILES['file']['name'];
    $tmpImage = $_FILES['file']['tmp_name'];
    $title = str_replace("'", "''", $title);
    $username = str_replace("'", "''", $username);
    $password= str_replace("'", "''", $password);
    $file = str_replace("'", "''", $file);
    if(!empty($file)){
      $stInsert = "INSERT INTO pro_cache_user (staff_id,name,phone,email,img_profile,branch,status,Type)
      VALUES ('$title','$username','','','$dates$file','$password','1','0')";
      if ($con->query($stInsert) === TRUE) {
        move_uploaded_file($tmpImage, 'admin/profile/'.$dates.$file);
       echo "<script type=\"text/javascript\">
              window.location = \"admin/login.php&success\"
            </script>";
      }
      else{
        echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=home&fail\"
            </script>";
      }
    }
    else{
     $stInsert = "INSERT INTO pro_cache_user (staff_id,name,phone,email,img_profile,branch,status,Type)
      VALUES ('$title','$username','','','','$password','1','0')";
      if ($con->query($stInsert) === TRUE) {
         echo "<script type=\"text/javascript\">
              window.location = \"admin/login.php&success\"
            </script>";
      }
      else{
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=home&fail\"
            </script>";
      }
    }
  }
 ?>
<div class="site-wrap">
  <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner"  >
      <div class="container" >
        <div class="row align-items-center">
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="h2 mb-0"><div style=" width:50%; float:left;">
               <img style=" height:50px; margin-left:5px;" src="images/oneclick-logo1.png"/>
             </div> </a></h1>
          </div>
           <div class="col-12 col-md-10 d-none d-xl-block" >
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link" >Home</a></li>
                 <li><a href="index.php?page=contact" class="nav-link">Contact</a></li>
                <li ><a href="index.php?page=about" class="nav-link">About System</a> </li>
                <li class="has-children">
                  <a href="#about-section" class="nav-link">Login & Register</a>
                  <ul class="dropdown">
                    <li><a href="index.php?page=home&Register"  class="nav-link">Register</a></li>
                    <li><a href="admin/login.php" class="nav-link">Login</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div> 
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h2"></span></a></div>
        </div>
      </div>
    </header> 
</div>
 <!--************Insert Success**************** -->
 <form method="post" enctype="multipart/form-data" autocomplete="off">
 <div class="modal fade" id="Register">
        <div class="modal-dialog modal-xl">
          <div class="modal-content ">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Register Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input required  type="text" class="form-control" id="" name="title" placeholder=""  onkeypress="return isNumberKey(event)" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="Uname" placeholder="" >
                    </div>
                  </div>
                  <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" required name="password" placeholder="" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="confirm_password" required name="confirm_password" placeholder="" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Profile Img</label>
                    <div class="col-sm-9">
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="file" placeholder="">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                      
                    </div>
                  </div>
            </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-danger" name="btnADD"><i class="fa fa-fw fa-edit"></i> Submit</button>
                </div>
            
        </div>
    </div>
  </div>
</form>
<!--************Insert Success**************** -->
 <div class="modal fade" id="insertsuccess">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Success</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <?php 
                     if (isset($_GET['success'])){
                     echo '<script> $(document).ready(function(){$("#insertsuccess").modal("show");});</script>';  
                }
                ?> 
              <p>You have successfully to upload data!</p>
            </div>
        </div>
    </div>
  </div>
  <!--************Insert Fail**************** -->
  <div class="modal fade" id="insertfail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Un-Success..</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <?php 
                     if (isset($_GET['fail'])){
                     echo '<script> $(document).ready(function(){$("#insertfail").modal("show");});</script>';  
                }
                ?> 
              <p>Your Phone Number already register !</p>
            </div>
        </div>
    </div>
  </div>
  <script type="text/javascript">
    //Confrim password

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
  </script>
