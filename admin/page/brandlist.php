<?php 
$dates=date('Ymdhi');
if(isset($_REQUEST['id'])){
  $id=$_REQUEST['id'];
                            echo "<script type=\"text/javascript\">
                                  window.location = \"index.php?page=brandlist&BID=$id\"
                                </script>";
  }
  if(isset($_REQUEST['btnadd'])){
    $file = $_FILES['imglogo']['name'];
    $tmpImage = $_FILES['imglogo']['tmp_name'];
    $file = str_replace("'", "''", $file);
    $stInsert = "INSERT INTO tbl_brand(Bname,image) VALUES ('".$_REQUEST['Bname']."', '".$dates.$file."')";
      if ($con->query($stInsert) === TRUE) {
        move_uploaded_file($tmpImage, '../images/brand/'.$dates.$file);
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=brandlist&nerr=1\"
            </script>";

      }
      else{
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=brandlist&nerrs=2\"
            </script>";
      }

  }
if (isset($_REQUEST['BID'])){
                       $BID = $_REQUEST['BID'];
                        $st = "SELECT * FROM tbl_brand where ID='".$BID."'";
                        $qr = $con->query($st);
                                              while($row = $qr->fetch_assoc()){
                                          $Bname=$row['Bname'];
                                          $logo=$row['image'];
                        }

                    if(isset($_REQUEST['btnup'])){
                      $brand=$_REQUEST['Bname'];
                      $file = $_FILES['imglogo']['name'];
                      $tmpImage = $_FILES['imglogo']['tmp_name'];
                      $file = str_replace("'", "''", $file);
                        $getIamgeName = $logo;
                        $createDeletePath = "../images/brand/".$getIamgeName;


                          if(!empty($file)){
                            if(unlink($createDeletePath))
                        {

                            $stUpdate = "UPDATE `tbl_brand` SET `Bname`='$brand', `image`='$dates$file' WHERE ID='".$BID."'";
                            if ($con->query($stUpdate) === TRUE) {
                              move_uploaded_file($tmpImage, '../images/brand/'.$dates.$file);
                             echo "<script type=\"text/javascript\">
                                  window.location = \"index.php?page=brandlist&nerr=1\"
                                </script>";
                            }
                            else{
                                 echo "<script type=\"text/javascript\">
                                  window.location = \"index.php?page=brandlist&nerrs=2\"
                                </script>";
                          }
                        }
                        }
                          else{
                            $stUpdate = "UPDATE `tbl_brand` SET `Bname`='$brand' WHERE ID='".$BID."'";
                            if ($con->query($stUpdate) === TRUE) {
                               echo "<script type=\"text/javascript\">
                                  window.location = \"index.php?page=brandlist&nerr=1\"
                                </script>";
                            }
                            else{
                              echo "<script type=\"text/javascript\">
                                  window.location = \"index.php?page=brandlist&nerrs=2\"
                                </script>";
                            }
                          }

                    }
                  }
?>
<section class="content-header">
</section>
<section class="content">
<div class="row">
    <div class="form-group col-sm-12 page-body">
     <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-danger">
            <div class="card-header">
              <h2 class="card-title" style="color: " ><b>Brand List</b></h2><br>
              </div>
              <form method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="card-body pad accent-red">
                <div class="form-group row  ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Brand Name</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" id="" name="Bname" placeholder="" >
                    </div>
                    <div class="col-sm-4">
                     <input type="file" class="form-control" id="" name="imglogo" placeholder="" >
                    </div>
                     <div class="col-sm-2">
                      <button type="submit" name="btnadd"  class="btn btn-danger"><i class="fa fa-fw fa-plus-circle"></i>Add New</button>
                    </div>
                  </div>
                
              </div>
            </form>
               <div class="card-body pad accent-danger">
                  <!-- <p>Please click on the request form below to download.</p>   -->
                     <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                          <tr class=""> 
                            <th>No</th>
                            <th>Brand Name</th>
                            <th>Logo Brand</th>
                            <th width="110px">Action</th>
                          </tr>
                        </thead>
                        <tbody >
                        <?php
                          $st = "SELECT * FROM tbl_brand order by ID desc";
                          $qr = $con->query($st);
                          if($qr->num_rows>0){
                          $i=1;
                          while($row = $qr->fetch_assoc()){
                          echo '
                          <tr>
                          <td>'.$i.'</td>
                          <td> '.$row['Bname'].' </td>
                          <td> <img src="../images/brand/'.$row['image'].'" height="20px" width="70px"/> </td>
                          <td>
                          <a style="color: white"href="index.php?page=brandlist&id='.$row['ID'].'" class="btn-sm btn-danger "><i class="fa fa-fw fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                          <a style="color: white"  class="btn-sm btn-danger hidden " data-href="index.php?page=Categorylist&id='.$row['ID'].'" data-toggle="modal" data-target="#confirm-delete" rel="tooltip" title="DELETE">
                         <i class="fa fa-fw fa-trash"></i>
                        </a>
                          </td>
                          </tr> ';
                          $i++;
                          }
                          }
                          else{
                              echo '
                                <tr>
                                  <td></td>
                                  <td colspand="4"> No data selected</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              ';
                              }
                      ?>
                  </tbody >
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- *********update form**********-->
  <form method="post" enctype="multipart/form-data" autocomplete="off">
  <div class="modal fade" id="update">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Form Update</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

               <?php 
                     if (isset($_GET['BID'])){
                     echo '<script> $(document).ready(function(){$("#update").modal("show");});</script>';  
                }
                      
                ?> 
              <div class="form-group row  ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Brand Name</label>
                    <div class="col-sm-5">
                     <input type="text" class="form-control" id="" name="Bname" placeholder="" value="<?php echo $Bname?>">
                    </div>
                    <div class="col-sm-5">
                     <input type="file" class="form-control" id="" name="imglogo" placeholder="" >
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success" name="btnup" >Submit</button>
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
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
  <div class="modal fade" id="confirm-delete">
    <div class="modal-dialog ">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Warning!</h4>
          <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Are you sure you want to delete this promotion.
        </div>
        <!-- Modal footer -->
        <div class="card-footer">
          <a class="btn btn-success btn-ok ">Delete</a>
          <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $("#vsFadeOff").fadeTo(1000, 300).slideUp(300, function(){
      $("#vsFadeOff").slideUp(300);
      window.location.replace("index.php?page=Categorylist&cid=<?php echo $cID; ?>");
  });
  </script>
