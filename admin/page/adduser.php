<?php
$dates=date("Ymdhi");
 $future_date = date("Y-m-d", time() + 7 * 24 * 60 * 60);
$title = '';
$doc_type = '';
$doc_cate = '';
$doc_sub = '';
$username = '';
$eff_date ='';
$descrip = '';

$sid=$_SESSION['uid'];

                       

$staffid=$sid;

if(isset($_REQUEST['btnADD'])){
    $title = $_REQUEST['title'];
    $doc_cate = $_REQUEST['doc_cate'];
    $doc_sub = $_REQUEST['doc_sub'];
  echo  $username = $_REQUEST['Uname'];
    $eff_date = $_REQUEST['eff_date'];
    // $descrip = $_REQUEST['descrip'];
    $file = $_FILES['file']['name'];
    $tmpImage = $_FILES['file']['tmp_name'];
    $title = str_replace("'", "''", $title);
    $doc_cate = str_replace("'", "''", $doc_cate);
    $doc_sub = str_replace("'", "''", $doc_sub);
    $descrip = str_replace("'", "''", $descrip);
    $file = str_replace("'", "''", $file);
    if(!empty($file)){
      $stInsert = "INSERT INTO pro_cache_user (staff_id,name,phone,email,img_profile,branch,status,Type)
      VALUES ('$title','$username','$doc_cate','$doc_sub','$dates$file','$eff_date','1','0')";
      if ($con->query($stInsert) === TRUE) {
        move_uploaded_file($tmpImage, 'profile/'.$dates.$file);
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerr=1\"
            </script>";
      }
      else{
        echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerrs=2\"
            </script>";
      }
    }
    else{
     $stInsert = "INSERT INTO pro_cache_user (staff_id,name,phone,email,img_profile,branch,status,Type)
      VALUES ('$title','$username','$doc_cate','$doc_sub','','$eff_date','1','0')";
      if ($con->query($stInsert) === TRUE) {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerr=1\"
            </script>";
      }
      else{
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerrs=2\"
            </script>";
      }
    }
  }

//***************************************************************************************
if(isset($_REQUEST['id'])){
  $id=$_REQUEST['id'];
  $st = "SELECT * FROM pro_cache_user  where id=$id ";
                          $qr = $con->query($st);
                          while($row = $qr->fetch_assoc()){
                         $id = $row['id'];
                         $doc_sub = $row['email'];
                         $doc_cate = $row['phone'];
                         $eff_date = $row['branch'];
                         $username = $row['name'];
                         $title = $row['staff_id'];
                        

                        
                        
  
}
  if(isset($_REQUEST['btnUpdate'])){
    $title = $_REQUEST['title'];
    $doc_cate = $_REQUEST['doc_cate'];
    $doc_sub = $_REQUEST['doc_sub'];
    $username = $_REQUEST['Uname'];
    $eff_date = $_REQUEST['eff_date'];
    $file = $_FILES['file']['name'];
    $tmpImage = $_FILES['file']['tmp_name'];
    $title = str_replace("'", "''", $title);
    $doc_cate = str_replace("'", "''", $doc_cate);
    $doc_sub = str_replace("'", "''", $doc_sub);
    $descrip = str_replace("'", "''", $descrip);
    $file = str_replace("'", "''", $file);

    $selectSql = "select * from pro_cache_user where id =".$_REQUEST['id'];
    $rsSelect = mysqli_query($con,$selectSql);
    $getRow = mysqli_fetch_assoc($rsSelect);
    $getIamgeName = $getRow['img_profile'];
    $createDeletePath = "profile/".$getIamgeName;


      if(!empty($file) ){
        if($getRow['img_profile']!='')
        {  unlink($createDeletePath); }
        $stUpdate = "UPDATE `pro_cache_user` SET `staff_id`='$title',`name`='$username',`phone`='$doc_cate',`email`='$doc_sub',`branch`='$eff_date',`img_profile`= '$dates$file' where id=".$_REQUEST['id'];
        if ($con->query($stUpdate) === TRUE) {
          move_uploaded_file($tmpImage,'profile/'.$dates.$file);
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerr=1\"
            </script>";
        }
        else{
             echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerrs=2\"
            </script>";
      }
    }
    
      else{
        
      $stUpdate = "UPDATE `pro_cache_user` SET `staff_id`='$title',`name`='$username',`phone`='$doc_cate',`email`='$doc_sub',`branch`='$eff_date' where id=".$_REQUEST['id'];
        if ($con->query($stUpdate) === TRUE) {
           echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerr=1\"
            </script>";
        }
        else{
          echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=adduser&nerrs=2\"
            </script>";
        }
      }
    }

 }
 ?>

<section class="content-header">
 
</section>
<section class="content">
<form method="post" enctype="multipart/form-data" autocomplete="off">
<div class="row">
    <div class="form-group col-sm-12 page-body">
     <div class="row">
        <div class="col-md-12">
          <div class="card  card-danger">
            <div class="card-header">
              <h3 class="card-title" style="color: white" >Add User</h3><br>
              </div>
               <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email Or Phone</label>
                    <div class="col-sm-9">
                      <input required  type="text" class="form-control" id="" name="title" placeholder=""  value="<?php echo $title;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="Uname" placeholder="" value="<?php echo $username;?>">
                    </div>
                   
                  </div>
                  <div class="form-group row hidden">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Department</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="username" placeholder="" value="<?php echo $username;?>">
                    </div>
                  </div>
                  <div class="form-group row hidden">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id=""  name="doc_cate" placeholder="" value="<?php echo $doc_cate;?>">
                      
                    </div>
                  </div>
                  <div class="form-group row hidden">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="doc_sub" placeholder="" value="<?php echo $doc_sub;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="password" required name="eff_date" placeholder="" value="<?php echo $eff_date;?>">
                    </div>
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="confirm_password" required name="doc_sub" placeholder="" value="<?php echo $eff_date;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Profile Img</label>
                    <div class="col-sm-3">
                      <input type="file" class="form-control" name="file" placeholder="">
                    </div>
                  </div>
                 
               
                </div>
                <div class="card-footer">
                  <?php 
                  if(isset($_REQUEST['id'])){
                     echo '
                    <button type="submit" class="btn btn-danger " name="btnUpdate"><i class="fa fa-fw fa-edit"></i> Update</button>
                    <a href="index.php?page=adduser" class="btn btn-danger float-right" name=""><i class="fa fa-fw fa-edit"></i>Add New</a>
                    ';
                  }
                  else{
                    echo '
                    <button type="submit" class="btn btn-danger" name="btnADD"><i class="fa fa-fw fa-edit"></i> Submit</button>
                    ';
                  }
                  ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </section>

<!--************Insert Success**************** -->
 <div class="modal fade" id="insertsuccess">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Success..</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <?php 
                     if (isset($_GET['nerr'])){
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
                     if (isset($_GET['nerrs'])){
                     echo '<script> $(document).ready(function(){$("#insertfail").modal("show");});</script>';  
                }
                ?> 
              <p>You have unsuccess to upload data!</p>
            </div>
        </div>
    </div>
  </div>


  <!-- The Modal -->
 <div class="modal fade" id="mdfile" >
         <div class="modal-dialog modal-lg">
          <div class="modal-content ">
             <div class="modal-header bg-danger">
               <h4 class="modal-title">Information Alert</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                        <p id="info">Your file upload too big size, Please be less than 2Mb! </p>
                        
            <input type="hidden" class="form-control" id="dNo" value="" />
              </div>
              <div class="modal-footer">
                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                <button type="button" onclick="cl()" class="btn btn-danger">OK</button>
              </div>
            </div>
          </div>
  </div>
  <script type="text/javascript">
   //catch file upload document
  $("input[type='file']").on("change", function () {
    var fs = this.files[0].size/1024000;
    
     if(this.files[0].size > 2000000) {
     
     $(document).ready(function(){$("#mdfile").modal("show");}); 
     document.getElementById("info").innerHTML="Please be less than 2Mb!, Your file upload size : "+fs.toFixed(2)+'Mb';
      // alert("Please upload file less than 2MB. Thanks!!");
       $(this).val('');
     }
    });

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


