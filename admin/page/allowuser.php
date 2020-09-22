<?php 
if(isset($_REQUEST['id'])){
    $delID = $_REQUEST['id'];
    
    $selectSql = "select * from pro_cache_user where id =$delID";
    $rsSelect = mysqli_query($con,$selectSql);
    $getRow = mysqli_fetch_assoc($rsSelect);
    $getIamgeName = $getRow['img_profile'];
    $createDeletePath = "profile/".$getIamgeName;
    
    if(!empty($getIamgeName)){
    if(unlink($createDeletePath))
    {
      $deleteSql = "delete from pro_cache_user where id =$delID";
      $rsDeletes = mysqli_query($con, $deleteSql);  

      if($rsDeletes)
      {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=allowuser&nerr=1&ac=0&upid=0\"
              </script>";
        exit();
      }
    }
    else
    {
      echo "<script type=\"text/javascript\">
            window.location = \"index.php?page=allowuser&nerrs=2&ac=0&upid=0\"
            </script>";
    }
  }
  else {
     $deleteSql = "delete from pro_cache_user where id =$delID";
      $rsDeletes = mysqli_query($con, $deleteSql); 
      if($rsDeletes)
      {
         echo "<script type=\"text/javascript\">
               window.location = \"index.php?page=allowuser&nerr=1&ac=0&upid=0\"
               </script>";
        exit();
      }
      else
    {
      echo "<script type=\"text/javascript\">
            window.location = \"index.php?page=allowuser&nerrs=2&ac=0&upid=0\"
            </script>";
    }

  }

}
if (isset($_REQUEST['ac'])){
      if ($_REQUEST['ac']=='chk') {
      $sql_doc = "UPDATE pro_cache_user SET status=1  where id = ".$_REQUEST['upid'];
       }
      else  if ($_REQUEST['ac']=='chkt'){
      $sql_doc = "UPDATE pro_cache_user SET Type=1  where id = ".$_REQUEST['upid'];
       }
       else  if ($_REQUEST['ac']=='uchkt'){
      $sql_doc = "UPDATE pro_cache_user SET Type=0  where id = ".$_REQUEST['upid'];
       }
       else {
      $sql_doc = "UPDATE pro_cache_user SET status=0  where id = ".$_REQUEST['upid'];
       }
          $doc = mysqli_query($con,$sql_doc); 


            }     
?>

<section class="content-header">
</section>
<section class="content">
<div class="row">
    <div class="form-group col-sm-12 page-body">
     <div class="row">
        <div class="col-md-12">
          <div class="card  card-danger">
            <!-- <div class="card-header">
              <h3 class="card-title" style="color: white" >Document List</h3><br>
              </div> -->
             <div class="card-body pad accent-white">
                <a href="index.php?page=adduser" style="color: white;float: left;"  class="btn btn-danger"><i class="fa fa-fw fa-plus-circle"></i>Add New</a>
              </div>
               <div class="card-body pad accent-danger">
                  <!-- <p>Please click on the request form below to download.</p>   -->
                       <table id="example1" class="table table-bordered table-striped" >
                        
                        <thead >
                            <tr>
                                <th>No</th>
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Allow User</th>
                                <th>Set Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tdcontent" >
                        <?php
                               $st = "SELECT * from pro_cache_user ";
                               $qr = $con->query($st);
                                    if($qr->num_rows>0){
                                       $i=1;
                                        while($row = $qr->fetch_assoc()){
                                          if ($row['img_profile']=='') {
                                            $imgp='profilenull.png';
                                          }
                                          else{
                                            $imgp=$row['img_profile'];
                                          }
                                             if ($row['status']==0){
                                                $btn=' 
                                                <a style="color: white"href="index.php?page=allowuser&ac=chk&upid='.$row['id'].'" class="btn-sm btn-danger " name=""><i class="fa fa-fw fa-times"></i></a>';
                                             }else{
                                                $btn='
                                                <a style="color: white"href="index.php?page=allowuser&ac=uchk&upid='.$row['id'].'" class="btn-sm btn-success "><i class="fa fa-fw fa-check"></i></a>';
                                             }
                                             if ($row['Type']==0){
                                                $btnt='  <a style="color: white"href="index.php?page=allowuser&ac=chkt&upid='.$row['id'].'" class="btn-sm btn-danger " name=""><i class="fa fa-fw fa-times"></i></a>';
                                             }else{
                                                $btnt='<a style="color: white"href="index.php?page=allowuser&ac=uchkt&upid='.$row['id'].'" class="btn-sm btn-success "><i class="fa fa-fw fa-check"></i></a>';
                                             }
                                                        echo '<tr>
                                                           <td>'.$row['id'].'</td>
                                                           <td> '.$row['staff_id'].' </td>
                                                           <td> '.$row['name'].' </td>
                                                           <td> '.$row['phone'].' </td>
                                                           <td><img src="profile/'.$imgp.'" style="width: 60px;height: 60px" class="img-circle"> </td>
                                                           <td>'.$btn.'</td>
                                                           <td> &nbsp;&nbsp;'.$btnt.' </td>
                                                           <td>
                                                           <a style="color: white"href="index.php?page=adduser&id='.$row['id'].'" class="btn-sm btn-danger "><i class="fa fa-fw fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                             <a style="color: white"class="btn-sm btn-danger " data-href="index.php?page=allowuser&id='.$row['id'].'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-fw fa-trash"></i></a>
                                                          </td>
                                                         </tr>';
                                            $i++;
                                        }
                                    }else{
                                        echo '<tr><td colspand="4"> No data selected</td></tr>';
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
  <!-- Add User -->
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
              <p>You have successfully to delete data!</p>
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
              <p>You have unsuccess to delete data!</p>
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
