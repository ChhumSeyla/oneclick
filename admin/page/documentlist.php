<?php 
if(isset($_REQUEST['id'])){
    $delID = $_REQUEST['id'];
    
    $selectSql = "select * from tbl_product where No =$delID";
    $rsSelect = mysqli_query($con,$selectSql);
    $getRow = mysqli_fetch_assoc($rsSelect);
    $getIamgeName = $getRow['file'];
    $createDeletePath = "../document/file/".$getIamgeName;

    


    
    if(!empty($getIamgeName)){

       $i=explode("!",$getRow['file']);
    if(!empty($i[0])){
     $getIamgeName = $i[0];
     $createDeletePath = "../document/file/".$getIamgeName;
     unlink($createDeletePath);
     }
      if(!empty($i[1])){
     $getIamgeName = $i[1];
     $createDeletePath = "../document/file/".$getIamgeName;
     unlink($createDeletePath);
     }
      if(!empty($i[2])){
     $getIamgeName = $i[2];
     $createDeletePath = "../document/file/".$getIamgeName;
     unlink($createDeletePath);
     }
      if(!empty($i[3])){
     $getIamgeName = $i[3];
     $createDeletePath = "../document/file/".$getIamgeName;
     unlink($createDeletePath);
     }
     if(!empty($i[4])){
     $getIamgeName = $i[4];
     $createDeletePath = "../document/file/".$getIamgeName;
     unlink($createDeletePath);
     }

    
      $deleteSql = "delete from tbl_product where No =$delID ";
      $rsDelete = mysqli_query($con, $deleteSql);  
      
      if($rsDelete)
      {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentlist&nerr=1\"
              </script>";
        exit();
      }
    
    else
    {
      echo "<script type=\"text/javascript\">
            window.location = \"index.php?page=documentlist&nerrs=2\"
            </script>";
    }
  }
  else {
     $deleteSql = "delete from tbl_product where No =$delID ";
      $rsDelete = mysqli_query($con, $deleteSql);  
      
      if($rsDelete)
      {
         echo "<script type=\"text/javascript\">
               window.location = \"index.php?page=documentlist&nerr=1\"
               </script>";
        exit();
      }
      else
    {
      echo "<script type=\"text/javascript\">
            window.location = \"index.php?page=documentlist&nerrs=2\"
            </script>";
    }

  }

}


$usid=$_SESSION['uid'];
if(isset($_REQUEST['upid'])){
if( $_REQUEST['ac']!='chk'){
      $sql_doc = "UPDATE tbl_product SET status=0  where No = ".$_REQUEST['upid'];
       }
       else {
      $sql_doc = "UPDATE tbl_product SET status=1  where No = ".$_REQUEST['upid'];
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
            <div class="card-header">
              <h3 class="card-title" style="color: white" >Document List</h3><br>
              </div>
              <div class="card-body pad accent-white">
                <a href="index.php?page=documentadd"  class="btn btn-danger"><i class="fa fa-fw fa-plus-circle"></i>Add New</a>
                <a href="index.php?page=product_guid" class="btn btn-danger " ><i class="fa fa-fw fa-eye"></i>View Guid</a>
              </div>
               <div class="card-body pad accent-danger">
                  <!-- <p>Please click on the request form below to download.</p>   -->
                     <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                          <tr class=""> 
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Produect Type</th>
                            <th>Brand</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th width="40px">Activation</th>
                            <th width="110px">Action</th>
                          </tr>
                        </thead>
                        <tbody id="tdcontent" >
                        <?php
                          $st = "SELECT * FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brand=tbl_brand.ID inner join tbl_category on tbl_product.category=tbl_category.CID  where staffid =$usid  order by No desc ";
                          $qr = $con->query($st);
                          if($qr->num_rows>0){
                          $i=1;
                          while($row = $qr->fetch_assoc()){
                            $NoDID=$row['No'].','.$row['CID'];
                            if ($row['status']==0){
                                                $btn=' 
                                                <a style="color: white"href="index.php?page=documentlist&ac=chk&upid='.$row['No'].'" class="btn-sm btn-danger " name=""><i class="fa fa-fw fa-times"></i></a>';
                                             }else{
                                                $btn='
                                                <a style="color: white"href="index.php?page=documentlist&ac=uchk&upid='.$row['No'].'" class="btn-sm btn-success "><i class="fa fa-fw fa-check"></i></a>';
                                             }
                            if ($row['file']==''){
                              $img='imgblank.jpg';
                            }
                            else{
                              $i=explode("!",$row['file']);
                              $img=$i[0];
                            }
                          echo '
                          <tr>
                          <td>'.$row['No'].'</td>
                          <td><a href="../document/file/'.$row['file'].'" style="color: black"  target="_blank" >'.$row['title'].'</a></td>
                          <td> '.$row['Cname'].' </td>
                          <td> '.$row['Bname'].' </td>
                          <td> '.$row['create_date'].' </td>
                          <td><img src="../document/file/'.$img.'" height="70px" width="120px"/></td>
                          <td>'.$btn.'</td>
                          <td>
                          <a style="color: white"href="index.php?page=documentadd&id='.$row['No'].'" class="btn-sm btn-danger "><i class="fa fa-fw fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                          <a style="color: white"  class="btn-sm btn-danger " data-href="index.php?page=documentlist&id='.$row['No'].'" data-toggle="modal" data-target="#confirm-delete" rel="tooltip" title="DELETE">
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
<script type="text/javascript">
  
</script>