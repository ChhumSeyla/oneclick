
<?php 

  if(isset($_REQUEST['id'])){
    $delID = $_REQUEST['id'];
    
    $selectSql = "select * from tbl_product where No ='".$delID."' and staffid='".$usid."' " ;
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

    
      $deleteSql = "delete from tbl_product where No ='".$delID."' and staffid='".$usid."' " ;
      $rsDelete = mysqli_query($con, $deleteSql);  
      
      if($rsDelete)
      {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=product_guid&nerr=1\"
              </script>";
        exit();
      }
    
    else
    {
      echo "<script type=\"text/javascript\">
            window.location = \"index.php?page=product_guid&nerrs=2\"
            </script>";
    }
  }
  else {
     $deleteSql = "delete from tbl_product where No ='".$delID."' and staffid='".$usid."' " ;
      $rsDelete = mysqli_query($con, $deleteSql);  
      
      if($rsDelete)
      {
         echo "<script type=\"text/javascript\">
               window.location = \"index.php?page=product_guid&nerr=1\"
               </script>";
        exit();
      }
      else
    {
      echo "<script type=\"text/javascript\">
            window.location = \"index.php?page=product_guid&nerrs=2\"
            </script>";
    }

  }

}



if(isset($_REQUEST['upid'])){
if( $_REQUEST['ac']=='chk'){
      $sql_doc = "UPDATE tbl_product SET status=1  where No ='".$_REQUEST['upid']."' and staffid='".$usid."' " ;
       }
       else {
      $sql_doc = "UPDATE tbl_product SET status=0  where No = '".$_REQUEST['upid']."' and staffid='".$usid."' " ;
       }
      $doc = mysqli_query($con,$sql_doc);
}
            $st = "SELECT * FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brand=tbl_brand.ID inner join tbl_category on tbl_product.category=tbl_category.CID  where staffid ='".$usid."'  order by No desc ";
             $doc = mysqli_query($con,$st);
             $data=array();
             while($row = mysqli_fetch_assoc($doc) ){
              $i=explode("!",$row['file']);
                       array_push($data,array("no"=>$row['No'],"proname"=>$row['title'],"cid"=>$row['category'],"uid"=>$row['staffid'],"img"=>$i[0],"price"=>$row['price'],"fdate"=>$row['future_date'],"today"=>$now,"status"=>$row['status']));

                     }
                     //echo json_encode($data);
  ?>
    <!-- Categories Section Begin -->
<!-- </section> -->
<section class="categories page" style="margin-top: 20px">
  <!-- <div class="container"> -->
      <!-- Default box -->
<div class="container">
  <div class="form-group col-sm-12 page-body">
    <div class="row">
      <div class="col-md-12">
      <div class="card card-solid" >
        <div class="card-header">
                <h3 class="card-title">Product List</h3>

                <div class="card-tools">
                  <a href="index.php?page=documentadd"  class="btn btn-danger"><i class="fa fa-fw fa-plus-circle"></i>Add New</a>
                  <a href="index.php?page=documentlist" class="btn btn-danger " ><i class="fa fa-fw fa-eye"></i>View Table</a>
                </div>
                <!-- /.card-tools -->
              </div>
        <div class="card-body pb-0">
          <div class="row  " id="listingTable">
           
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item" id="btn_prev"><a class="page-link" href="javascript:prevPage()" >Priviues</a></li>
              <li class="page-item" id="btn_next"><a class="page-link" href="javascript:nextPage()" >Next</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
   <!--  </div> -->
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

      <!-- /.card -->
<!--page: <span id="page"></span>-->
<script type="text/javascript">
var current_page = 1;
var records_per_page = 32;

var objJson = <?php echo json_encode($data); ?>; // Can be obtained from another source, such as your objJson variable

function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}

function changePage(page)
{
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var listing_table = document.getElementById("listingTable");
    var page_span = document.getElementById("page");

    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    listing_table.innerHTML = "";

    for (var i = (page-1) * records_per_page; i < (page * records_per_page); i++) {
        var img='';
        if(objJson[i].today<=objJson[i].fdate){
          var img='&nbsp;<img style="margin-top:-14px;" src="../images/newicon.gif" alt="new" />';
        }
        if (objJson[i].status==0){
          var  btn=' <a style="color: white"href="index.php?page=product_guid&ac=chk&upid='+objJson[i].no+'" class="btn-sm btn-danger " name=""><i class="fa fa-fw fa-times"></i></a>';
                               }
        else{
              btn='<a style="color: white"href="index.php?page=product_guid&ac=uchk&upid='+objJson[i].no+'" class="btn-sm btn-success "><i class="fa fa-fw fa-check"></i></a>';
            }

        listing_table.innerHTML +='<div class="col-lg-3 col-md-6 col-sm-6 d-flex align-items-stretch" data-aos="fade-up"><div class="card bg-light"><div class="card-header text-muted border-bottom-0"><h2 class="lead text-danger"><b>'+objJson[i].proname+img+'</b></h2><p class="text-danger" style="font-size: 22px;font-weight: bold; " >'+objJson[i].price+' $</p></div><div class="card-body pt-0"><a href="index.php?page=contactlist&cid='+objJson[i].cid+'&pid='+objJson[i].no+'" ><div class="row"><div class="col-12 text-center"><img src="../document/file/'+objJson[i].img+'" alt="" class=" img-fluid img-fluids" ></div><div class="col-12"><br><div class="row"><div class="col-md-12"></div><div class="col-md-6 text-left"> </div></div></a></div></div></div><div class="card-footer "><div class="text-center">'+btn+'&nbsp;&nbsp;&nbsp;<a style="color: white"href="index.php?page=documentadd&id='+objJson[i].no+'" class="btn-sm btn-danger "><i class="fa fa-fw fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a style="color: white"class="btn-sm btn-danger " data-href="index.php?page=product_guid&id='+objJson[i].no+'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-fw fa-trash"></i></a></div></div></div></div>' ;
      }

    
        page_span.innerHTML = page;


    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}

function numPages()
{
    return Math.ceil(objJson.length / records_per_page);
}

window.onload = function() {
    changePage(1);
};
</script>


