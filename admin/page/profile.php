<?php
$pn='';
$pid='';
$dn='';
$did='';
$cn='';
$cid='';
$vn='';
$vid='';
$stress='';
$home='';

                      $loca=explode("!",$_SESSION['address']);
                         if(!empty($loca[0])){
                           $sqlp =  'select * from tbl_province where PID='.$loca[0].'';
                             $resultp = $con->query($sqlp);
                             while($rowp = $resultp->fetch_assoc()) { 
                               $pn=$rowp["TITLE"];
                               $pid=$rowp["PID"];
                           }
                         }
                         if(!empty($loca[1])){
                           $sqld =  'select * from tbl_district where DID='.$loca[1].'';
                             $resultd = $con->query($sqld);
                             while($rowd = $resultd->fetch_assoc()) { 
                             $dn=$rowd["TITLE"];
                             $did=$rowd["DID"]; 
                           }
                         }
                         if(!empty($loca[2])){
                             $sqlc =  'select * from tbl_commune where CID="'.$loca[2].'"';
                                  $resultc = $con->query($sqlc);
                                  while($rowc = $resultc->fetch_assoc()) {   
                                   $cn=$rowc["TITLE"];       
                                   $cid=$rowc["CID"]; 
                               }
                         }
                         if(!empty($loca[3])){
                            $sqlv =  'select * from tbl_village where VID="'.$loca[3].'"';
                            $resultv = $con->query($sqlv);
                              while($rowv = $resultv->fetch_assoc()) { 
                               $vn=$rowv["TITLE"];        
                               $vid=$rowv["VID"]; 
                              }
                            }
                         if(!empty($loca[4])){
                          $stress=$loca[4];
                         }
                         if(!empty($loca[5])){
                          $home=$loca[5];
                         }
  if(isset($_REQUEST['btnUpdate'])){
    $Uname=$_REQUEST['Uname'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $address=$_REQUEST['province'].'!'.$_REQUEST['District'].'!'.$_REQUEST['commune'].'!'.$_REQUEST['village'].'!'.$_REQUEST['stress'].'!'.$_REQUEST['home'];
                $stUpdate = "UPDATE `pro_cache_user` SET `staff_id`='$phone',`name`='$Uname',`email`=' $email',`address`='$address' where id='".$_SESSION['uid']."'";
        if ($con->query($stUpdate) === TRUE) {
           echo "<script type=\"text/javascript\">
              window.location = \"login.php?pg=login&sms=suss\"
            </script>";
        }
        else{
          echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=profile&nerrs=2\"
            </script>";
        }
              }

    if (isset($_REQUEST['passwordold'])) {
         $stItem = "SELECT branch FROM pro_cache_user where id='".$_SESSION['uid']."' and branch='".$_REQUEST['passwordold']."'";
      $qrItem = $con->query($stItem);
      if($qrItem->num_rows>0){
       if(isset($_REQUEST['btncp'])){
         $password=$_REQUEST['password'];
         $sqlpass = "UPDATE `pro_cache_user` SET `branch`='$password' where id='".$_SESSION['uid']."' and branch='".$_REQUEST['passwordold']."'";
         if ($con->query($sqlpass) === TRUE) {
           echo "<script type=\"text/javascript\">
              window.location = \"login.php?pg=login&sms=susscp\"
            </script>";
        }
        else{
          echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=profile&fail\"
            </script>";
        }
       }
      }
      else{
        echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=profile&fail\"
            </script>";
      }
    }
 ?>
<style>

.profile-pic {
    max-width: 200px;
    max-height: 200px;
    display: block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 1000px !important;
    overflow: hidden;
    width: 128px;
    height: 128px;
    border: 8px solid rgba(204, 204, 204, 0.9);
    position: absolute;
    top: 72px;
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
  position: absolute;
  top: 167px;
  right: 30px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 1.2em;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
 
}
</style>
<section class="content-header">
</section>
<section class="content">

      <div class="row">
         <div class="form-group col-sm-8 page-body">
<div class="row">
        <div class="col-md-12">
          <div class="card  card-danger">
            <div class="card-header">
              <h3 class="card-title" style="color: white" >Information Profile</h3><br>
              </div>
            <div class="card-body box-profile">
              <i class="fa fa-camera upload-button"></i>
              <form>
              <input class="file-upload" type="file" id="profile" accept="image/*" style="display:none">
              <img class="profile-user-img img-responsive img-circle profile-pic" src="profile/<?php echo getimg($_SESSION['staffID']); ?>" 
               alt="User profile picture" width="300" height="300">
                
              <h3 class="profile-username text-center"><?php echo $_SESSION['name']; ?></h3>

             <!-- <p class="text-muted text-center">Software Engineer</p>-->
              <p id="demo" class="text-muted text-center">*******</p>
               <input type="submit" name="submit" id="save" class="btn btn-danger submit" value="Save" style="display:none">
              </form>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><b><?php echo $_SESSION['staffID']; ?></b></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><b><?php echo $_SESSION['mail']; ?></b></a>
                </li>
                <li class="list-group-item">
                  <b>Address</b> <a class="pull-right"><b><?php echo 'Home :'.$home.' Street :'.$stress.' Village :'.$vn.' Commune :'.$cn.' District :'.$dn.' City/Province :'.$pn; ?></b></a>
                </li>
                
              </ul>


             <!--  <a href="#" class="btn btn-danger"><b>Change Password</b></a> -->
            </div>
            <div class="card-footer">
                   <a href="index.php?page=profile&upprofile"  class="btn btn-danger">Update</a>
                   <a href="index.php?page=profile&uppa"  class="btn btn-danger " style="float: right;">Change password</a>
                </div>
          </div>
        </div>
      </div>
    </section>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>

$(document).ready(function() {
   var img = document.getElementById('profile');
   
   var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
				//alert(e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
     $(".file-upload").on('change', function(){
        readURL(this);
		document.getElementById('save').style.display="inline";
     });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
        
    });
	
	
});
$(function() {
        $('.submit').on('click', function() {
            var file_data = $('.file-upload').prop('files')[0];
            if(file_data != undefined) {
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                $.ajax({
                    type: 'POST',
                    url: 'page/fapp.php?id=<?php echo $_SESSION['uid'] ?>',
					contentType: false,
                    processData: false,
                    data: form_data,
                    success:function(response) {
                        if(response == 'success') {
							document.getElementById('save').style.display="none";
                          window.location ="index.php?page=profile&success";
                        } else if(response == 'false') {
                            alert('Invalid file type.');
                        } else {
							
                            alert('Something went wrong. Please try again.');
                        }
 
                        //$('.image').val('');
                    }
                });
            }
            return false;
        });
    });

</script>
 <!--************Update Success**************** -->
 <form method="post" enctype="multipart/form-data" autocomplete="off">
 <div class="modal fade" id="update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content ">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Update Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                     if (isset($_GET['upprofile'])){
                     echo '<script> $(document).ready(function(){$("#update").modal("show");});</script>';  
                }?>
               <div class="form-group row " >
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input   type="text" class="form-control" id="" name="phone" placeholder=""  onkeypress="return isNumberKey(event)" value="<?php echo $_SESSION['staffID']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="Uname" placeholder="" value="<?php echo $_SESSION['name']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" required name="email" placeholder="" value="<?php echo $_SESSION['mail']; ?>">
                    </div>
                  </div>
                 <!--  <div class="form-group row hidden">
                     <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password"  name="password" placeholder="" >
                    </div>
                  </div> -->
                <!--   <div class="form-group row hidden">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="confirm_password"  name="confirm_password" placeholder="" >
                    </div>
                  </div> -->
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Province</label>
                    <div class="col-sm-3">
                      <select  id="provincedob"  class="form-control province" name="province" required>
                            <option value="<?php echo$pid ?>"><?php echo$pn ?></option>
                            <?php 
                            // Fetch Department
                            $sql_province = "SELECT * FROM tbl_province";
                            $province = mysqli_query($con,$sql_province);
                            while($row = mysqli_fetch_assoc($province) ){
                                $provinceid = $row['PID'];
                                $provincename = $row['TITLE'];
                              
                                // Option
                                echo " <option value='".$provinceid."' >".$provincename."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <label for="inputEmail2" class="col-sm-2 col-form-label">District</label>
                    <div class="col-sm-3">
                      <select id="Districtdob"  class="form-control District" name="District" required>
                          <option value="<?php echo$did ?>"><?php echo$dn ?></option>
                      </select>
                    </div>
                  </div><div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Commune</label>
                    <div class="col-sm-3">
                      <select id="communedob"  class="form-control commune" name="commune" required>
                          <option value="<?php echo$cid ?>"><?php echo$cn ?></option>
                      </select>
                    </div>
                    <label for="inputEmail2" class="col-sm-2 col-form-label">Village</label>
                    <div class="col-sm-3">
                      <select id="villagedob"  class="form-control village" name="village" required>
                          <option value="vid"><?php echo$vn ?></option>
                      </select>
                    </div>
                  </div><div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Stress</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="stress" name="stress" placeholder="" value="<?php echo $stress;?>">
                    </div>
                    <label for="inputEmail2" class="col-sm-2 col-form-label">Home Number</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control" id="home" name="home" placeholder=""  value="<?php echo $home;?>">
                    </div>
                  </div>
            </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-danger" name="btnUpdate"><i class="fa fa-fw fa-edit"></i> Submit</button>
                </div>
            
        </div>
    </div>
  </div>
</form>
<!--************Change Password**************** -->
<form method="post" enctype="multipart/form-data" autocomplete="off">
 <div class="modal fade" id="cp">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <?php 
                     if (isset($_GET['uppa'])){
                     echo '<script> $(document).ready(function(){$("#cp").modal("show");});</script>';  
                }
                ?> 
                <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-3 col-form-label">Old Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="passwordold" required name="passwordold" placeholder="" >
                    </div>
                  </div>
              <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" required name="password" placeholder="" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm New Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="confirm_password" required name="confirm_password" placeholder="" >
                    </div>
                  </div>
            </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-danger" name="btncp"><i class="fa fa-fw fa-edit"></i> Submit</button>
                </div>
        </div>
    </div>
  </div>
</form>
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
              <p>This Phone number is register already. Please try again with the new phone number!</p>
            </div>
        </div>
    </div>
  </div>
   <!--************fail**************** -->
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
                     if (isset($_GET['fail'])){
                     echo '<script> $(document).ready(function(){$("#fail").modal("show");});</script>';  
                }
                ?> 
              <p>Incorrect Password. Please try again!</p>
            </div>
        </div>
    </div>
  </div>
   <!--************success**************** -->
  <div class="modal fade" id="success">
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
                     if (isset($_GET['success'])){
                     echo '<script> $(document).ready(function(){$("#success").modal("show");});</script>';  
                }
                ?> 
              <p>File upload success!</p>
            </div>
        </div>
    </div>
  </div>
<script type="text/javascript">
  $(document).ready(function(){

                $("#communedob").change(function(){
                var cid = $(this).val();


                $.ajax({
                    url: 'page/villagedob.php',
                    type: 'post',
                    data: {vdob:cid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#villagedob").empty();
                        $("#villagedob").append("<option></option>");
                        for( var i = 0; i<len; i++){
                            var CID = response[i]['VID'];
                            var name = response[i]['TITLE'];

                            $("#villagedob").append("<option value='"+CID+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });

  $(document).ready(function(){

            $("#provincedob").change(function(){
                var pid = $(this).val();

                $.ajax({
                    url: 'page/provincedob.php',
                    type: 'post',
                    data: {pdob:pid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#Districtdob").empty();
                        $("#Districtdob").append("<option></option>");
                        for( var i = 0; i<len; i++){
                            var DID = response[i]['DID'];
                            var name = response[i]['TITLE'];

                            $("#Districtdob").append("<option value='"+DID+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
  $(document).ready(function(){

            $("#Districtdob").change(function(){
                var did = $(this).val();

                $.ajax({
                    url: 'page/districtdob.php',
                    type: 'post',
                    data: {ddob:did},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#communedob").empty();
                        $("#communedob").append("<option></option>");
                        for( var i = 0; i<len; i++){
                            var CID = response[i]['CID'];
                            var name = response[i]['TITLE'];

                            $("#communedob").append("<option value='"+CID+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
</script>
<script type="text/javascript">
    //Confrim password

var password = document.getElementById("#password")
  , confirm_password = document.getElementById("#confirm_password");

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


