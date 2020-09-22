<?php 
$delete='';
$cid=$_REQUEST['cid'];
if(isset($_REQUEST['id'])){
    $delID = $_REQUEST['id'];
    $cID = $_REQUEST['cid'];
    $stDel = "DELETE FROM `tbl_catbrand` WHERE cbID=$delID";
    if ($con->query($stDel) === TRUE) {
       $delete='
        <div class="alert alert-success alert-dismissible" id="vsFadeOff">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> Data has been deleted.
        </div>
      ';
    }
    else{
      $delete='
        <div class="alert alert-danger alert-dismissible" id="vsFadeOff">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Data cannot delete.
        </div>
      ';
    }
  }
  if(isset($_REQUEST['btnadd'])){
    $stInsert = "INSERT INTO tbl_catbrand(catID,brandID) VALUES ('".$_GET['cid']."', '".$_REQUEST['brandid']."')";
      if ($con->query($stInsert) === TRUE) {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=Categorylist&cid=$cid&nerr=1\"
            </script>";

      }
      else{
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=Categorylist&cid=$cid&nerrs=2\"
            </script>";
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
              <h2 class="card-title" style="color: " ><b>Category List</b></h2><br>
              </div>
              <form method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="card-body pad accent-red">
                <?php echo $delete; ?>
                <div class="form-group row  ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Brand Name</label>
                    <div class="col-sm-8">
                      <select    class="form-control" name="brandid" required>
                        ?>
                        <option></option>
                            <?php 
                            // Fetch Department
                            $sql = "SELECT * FROM tbl_brand";
                            $result = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_assoc($result) ){
                                echo " <option value='".$row['ID']."' >".$row['Bname']."</option>";
                            }
                            ?>
                        </select>
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
                            <th>Product Type</th>
                            <th>Brand</th>
                            <th>Logo Brand</th>
                            <th width="110px">Action</th>
                          </tr>
                        </thead>
                        <tbody >
                        <?php
                          $st = "SELECT * FROM tbl_catbrand inner join tbl_brand on tbl_catbrand.brandID=tbl_brand.ID inner join tbl_category on tbl_catbrand.catID=tbl_category.CID  where catID='".$_GET['cid']."' order by tbl_catbrand.cbID desc  ";
                          $qr = $con->query($st);
                          if($qr->num_rows>0){
                          $i=1;
                          while($row = $qr->fetch_assoc()){
                          echo '
                          <tr>
                          <td>'.$i.'</td>
                          <td>'.$row['Cname'].'</td>
                          <td> '.$row['Bname'].' </td>
                          <td> <img src="../images/brand/'.$row['image'].'" height="20px" width="70px"/> </td>
                          <td>
                          <a style="color: white"href="index.php?page=promotionadd&id='.$row['cbID'].'" class="btn-sm btn-danger hidden"><i class="fa fa-fw fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                          <a style="color: white"  class="btn-sm btn-danger " data-href="index.php?page=Categorylist&id='.$row['cbID'].'&cid='.$row['catID'].'" data-toggle="modal" data-target="#confirm-delete" rel="tooltip" title="DELETE">
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
