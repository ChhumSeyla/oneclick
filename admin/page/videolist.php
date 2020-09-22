<?php 
if(isset($_REQUEST['id'])){
    $delID = $_REQUEST['id'];
    
    $selectSql = "select * from video where id =$delID";
    $rsSelect = mysqli_query($con,$selectSql);
    $getRow = mysqli_fetch_assoc($rsSelect);
    
    $getIamgeName = $getRow['file_name'];
    $createDeletePath = "../document/video/".$getIamgeName;
    if(!empty($getIamgeName)){
    if(unlink($createDeletePath))
    {
      $deleteSql = "delete from video where id =$delID ";
      $rsDelete = mysqli_query($con, $deleteSql);  
      
      if($rsDelete)
      {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=videolist&nerr=1\"
            </script>";
        exit();
      }
    }
    else
    {
      // echo "<script type=\"text/javascript\">
      //         window.location = \"index.php?page=videolist&nerrs=2\"
      //       </script>";
    }
  }
  else {
     $deleteSql = "delete from video where id =$delID ";
      $rsDelete = mysqli_query($con, $deleteSql);  
      
      if($rsDelete)
      {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=videolist&nerr=1\"
            </script>";
        exit();
      }
      else
    {
      // echo "<script type=\"text/javascript\">
      //         window.location = \"index.php?page=videolist&nerrs=2\"
      //       </script>";
    }

  }

}

?>
<section class="content-header">
</section>
<section class="content">
<div class="row">
        <div class="col-md-9">
          <div class="card  card-danger">
            <div class="card-header">
              Video review product
              </div>
              <div class="card-body pad accent-white">
                <a href="index.php?page=image"  class="btn btn-danger"><i class="fa fa-fw fa-plus-circle"></i>Upload</a>
              </div>
               <div class="card-body pad accent-danger" >
                  <p>You can find our user guide list below:</p>
                     <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                          <tr class=""> 
                            <th width="40px">No</th>
                            <th>Date</th>
                            <th width="200px">Image</th>
                            <th width="40px">Action</th>
                          </tr>
                        </thead>
                        <tbody  >
                        <?php
                          $st = "SELECT * FROM video ";
                          $qr = $con->query($st);
                          if($qr->num_rows>0){
                          $i=1;
                          while($row = $qr->fetch_assoc()){
                            if (strpos($row['file_name'], '.mp4') !== false) {
                              $result='<video controls loop style="width: 300px;height: 200px">
                                    <source src="../document/video/'.$row['file_name'].'" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>';
                            }
                            else{
                                $result=' <img src="../document/video/'.$row['file_name'].'" style="width: 300px;height: 200px">';
                            }
                          echo '
                          <tr>
                          <td style="padding-top: 60px">'.$i.'</td>
                          <td style="padding-top: 60px"> '.$row['upload_time'].' </td>
                          <td >'.$result.' </td>
                          <td style="padding-top: 100px">
                          <button  type="button" class="btn btn-danger " data-href="index.php?page=videolist&id='.$row['id'].'" data-toggle="modal" data-target="#confirm-delete" rel="tooltip" title="DELETE">
                         <i class="fa fa-fw fa-trash"></i>
                        </button>
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
              </div >
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
