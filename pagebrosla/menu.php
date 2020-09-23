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
    // if (strlen($title)<9 || $title>10  ){
    //   echo "<script type=\"text/javascript\">
    //           window.location = \"index.php?page=home&not_phone\"
    //         </script>";
    // }
    // else{
    if(!empty($file)){
      $stInsert = "INSERT INTO pro_cache_user (staff_id,name,phone,email,img_profile,branch,status,Type)
      VALUES ('$title','$username','','','$dates$file','$password','1','0')";
      if ($con->query($stInsert) === TRUE) {
        move_uploaded_file($tmpImage, 'admin/profile/'.$dates.$file);
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=home&success\"
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
              window.location = \"index.php?page=home&success\"
            </script>";
      }
      else{
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=home&fail\"
            </script>";
      }
    }
  // }
  }
  if(isset($_REQUEST['btnsearch'])){
    $search=$_REQUEST['search'];
   echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=search&data=$search\"
            </script>";
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
            <h1 class="mb-0 site-logo"><a href="index.php" class="h2 mb-0"><div style=" width:120%; float:left;">
               <img style=" height:70px; margin-left:5px;" src="images/oneclick-logo1.png"/>
             </div> </a></h1>
          </div>
           <div class="col-12 col-md-10 d-none d-xl-block" >
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li> <!-- SEARCH FORM -->
                <form method="post" enctype="multipart/form-data" autocomplete="off" id="uploadForm">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar " type="submit" name="btnsearch" >
                        
                       <i style="color: white" class="fa fa-fw fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </li>
                <li><a href="index.php" class="tr nav-link" key="home"  >Home</a></li>
               <!--   <li class="hidden"><a href="index.php?page=contact" key="contact" class="tr nav-link">Contact</a></li> -->
                <li ><a href="index.php?page=about" key="aboutus"  class="tr nav-link">About Us</a> </li>
                <li class="has-children">
                  <a href="#about-section"​​ key="All Category" class="tr nav-link">All Category</a>
                  <ul class="dropdown">
                    
                    <?php 
                        $sql_doc = "SELECT * FROM tbl_category order by CID asc ";
                         $doc = mysqli_query($con,$sql_doc);
                         while($row = mysqli_fetch_assoc($doc) ){
                             if ($row['Cname']=='Phone') {
                               $Cname='Phone';
                             }
                             else{
                              $Cname=$row['Cname'];
                             }
                          
                            echo '
                            <li><a href="index.php?page=coperate&cid='.$row['CID'].'"  class="nav-link"><p class="tr" key="'.$Cname.'">'.$row['Cname'].'</p></a></li>
                             ';
                             }
                        ?>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#about-section"​​ key="loginRegister" class="tr nav-link"​​ >Login & Register</a>
                  <ul class="dropdown">
                    <li><a href="index.php?page=home&Register"  class="nav-link">Register</a></li>
                    <li><a href="admin/login.php" class="nav-link" target="blank">Login</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#about-section"​​ key="" class="tr nav-link">Language</a>
                  <ul class="dropdown">
                    <li><a style="color:#FFF;" href="#" id="kh" onClick="lnk()" class="lang"><img class="" src="images/menu/kh.jpg" style="width: 40px">    </a></li>
                    <li><a   href="##" id="en" onClick="lne()" class="lang"><img class="" src="images/menu/en.png" style="width: 40px"></a></li>
                    <li><a   href="###" id="cn" onClick="lnc()" class="lang"><img class="" src="images/menu/cn.png" style="width: 40px"></a></li>
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
   <!--************Insert Not phone number**************** -->
  <div class="modal fade" id="fail">
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
                     if (isset($_GET['not_phone'])){
                     echo '<script> $(document).ready(function(){$("#fail").modal("show");});</script>';  
                }
                ?> 
              <p>It is not phone number !</p>
            </div>
        </div>
    </div>
  </div>
  
