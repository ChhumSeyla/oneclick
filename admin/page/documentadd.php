<?php
$dates=date("Ymdhi");
$post_dates=date("Y-m-d");
$future_date = date("Y-m-d", time() + 2 * 24 * 60 * 60);
$title = '';
$category = '';
$brand = '';
$contact = '';
$create_date = '';
$loca_shop ='';
$descrip = '';
$Cname = '';
$Bname='';
$image='';
$brand_contact='';
$price='';
$pn='';
$pid='';
$dn='';
$did='';
$cn='';
$cid='';
$vn='';
$vid='';
$stress='';

$sid=$_SESSION['uid'];
$nameimg=$_SESSION['staffID'].date("Ymdhi");


                    
                       

$staffid=$sid;

if(isset($_REQUEST['btnADD'])){
    $title = $_REQUEST['title'];
    $category = $_REQUEST['category'];
    $brand = $_REQUEST['brand'];
    $create_date = $_REQUEST['create_date'];
    $img = $_REQUEST['img'];
    $descrip = $_REQUEST['descrip'];
    $price = $_REQUEST['price'];
    $pro=$_REQUEST['province'];
    $dist=$_REQUEST['District'];
    $comm=$_REQUEST['commune'];
    $village=$_REQUEST['village'];
    $stress=$_REQUEST['stress'];
    $home=$_REQUEST['home'];

    

    $company = $_REQUEST['company'];
    $cp = implode("!",$company);
    $pnumber = $_REQUEST['pnumber'];
    $contact = implode("!",$pnumber);

    $title = str_replace("'", "''", $title);
    $price = str_replace("'", "''", $price);
    $brand = str_replace("'", "''", $brand);
    $contact = str_replace("'", "''", $contact);
    $descrip = str_replace("'", "''", $descrip);
    $img = str_replace("'", "''", $img);
    $stress=str_replace("'", "''", $stress);
    $home=str_replace("'", "''", $home);
    $address=$pro.'!'.$dist.'!'.$comm.'!'.$village.'!'.$stress.'!'.$home;
    if(!empty($img)){
      $stInsert = "INSERT INTO tbl_product(title,category,brand,brand_contact, contact,create_date,loca_shop,detail,file,status,price,staffid,future_date)
      VALUES ('$title', '$category', '$brand','$cp', '$contact','$create_date','$address','$descrip','$img','1','$price','$staffid','$future_date')";
      if ($con->query($stInsert) === TRUE) {
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerr=1\"
            </script>";
      }
      else{
        echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerrs=2\"
            </script>";
      }
    }
    else{
     $stInsert = "INSERT INTO tbl_product(title,category,brand,brand_contact, contact,create_date,loca_shop,detail,file,status,price,staffid,future_date)
      VALUES ('$title', '$category', '$brand','$cp', '$contact','$create_date','$address','$descrip','','1','$price','$staffid','$future_date')";
      if ($con->query($stInsert) === TRUE) {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerr=1\"
            </script>";
      }
      else{
       echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerrs=2\"
            </script>";
      }
    }
  }

//***************************************************************************************
if(isset($_REQUEST['id'])){
  $id=$_REQUEST['id'];
  $st = "SELECT * FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brand=tbl_brand.ID inner join tbl_category on tbl_product.category=tbl_category.CID where No='".$id."' and staffid='".$usid."' " ;
                          $qr = $con->query($st);
                          while($row = $qr->fetch_assoc()){
                         $No = $row['No'];
                         $title = $row['title'];
                         $category = $row['category'];
                         $Bname = $row['Bname'];
                         $brand = $row['brand'];
                         $contact = $row['contact'];
                         $brand_contact = $row['brand_contact'];
                         $create_date = $row['create_date'];
                         $loca_shop =$row['loca_shop'];
                         $descrip=$row['detail'];
                         $Cname = $row['Cname'];
                         $image = $row['file'];
                         $price = $row['price'];
                         $loca=explode("!",$row['loca_shop']);
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
                         


  }
  if ($No=='') {
                           echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd\"
            </script>";
                         }
  if(isset($_REQUEST['btnUpdate'])){
    $title = $_REQUEST['title'];
    $category = $_REQUEST['category'];
    $brand = $_REQUEST['brand'];
    $create_date = $_REQUEST['create_date'];
    $img = $_REQUEST['img'];
    $descrip = $_REQUEST['descrip'];
    $price = $_REQUEST['price'];
    $pro=$_REQUEST['province'];
    $dist=$_REQUEST['District'];
    $comm=$_REQUEST['commune'];
    $village=$_REQUEST['village'];
    $stress=$_REQUEST['stress'];
    $home=$_REQUEST['home'];
   
    $company = $_REQUEST['company'];
    $cp = implode("!",$company);
    $pnumber = $_REQUEST['pnumber'];
    $contact = implode("!",$pnumber);

    $title = str_replace("'", "''", $title);
    $price = str_replace("'", "''", $price);
    $brand = str_replace("'", "''", $brand);
    $contact = str_replace("'", "''", $contact);
    $descrip = str_replace("'", "''", $descrip);
    $img = str_replace("'", "''", $img);
    $stress=str_replace("'", "''", $stress);
    $home=str_replace("'", "''", $home);
    $address=$pro.'!'.$dist.'!'.$comm.'!'.$village.'!'.$stress.'!'.$home;



      if(!empty($img)){

    $i=explode("!",$image);
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
     
     

       $stUpdate = "UPDATE `tbl_product` SET `title`='$title', `category`='$category', `brand`='$brand', `contact`='$contact', `create_date`='$create_date', `brand_contact`='$cp', `detail`='$descrip',`file`='$img', `price`='$price',`loca_shop`='$address' WHERE No='".$id."' and staffid='".$usid."' " ;
        if ($con->query($stUpdate) === TRUE) {
         echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerr=1\"
            </script>";
        }
        else{
             echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerrs=2\"
            </script>";
      }
    
    }
      else{
        $stUpdate = "UPDATE `tbl_product` SET `title`='$title', `category`='$category', `brand`='$brand', `contact`='$contact', `create_date`='$create_date', `brand_contact`='$cp', `detail`='$descrip', `price`='$price',`loca_shop`='$address' WHERE No='".$id."' and staffid='".$usid."' " ;
        if ($con->query($stUpdate) === TRUE) {
           echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerr=1\"
            </script>";
        }
        else{
          echo "<script type=\"text/javascript\">
              window.location = \"index.php?page=documentadd&nerrs=2\"
            </script>";
        }
      }
    }

 }
 ?>

<section class="content-header">
</section>
<section class="content">
<form method="post" enctype="multipart/form-data" autocomplete="off" id="uploadForm">
<div class="row">
    <div class="form-group col-sm-12 page-body">
     <div class="row">
        <div class="col-md-12">
          <div class="card  card-danger">
            <div class="card-header">
              <h3 class="card-title" style="color: white" >Upload Product</h3><br>
              </div>
               <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="" name="title" placeholder="" value="<?php echo $title;?>">
                    </div>
                    <label for="inputEmail2" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control" id="" name="price" placeholder=""  value="<?php echo $price;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Product Type</label>
                    <div class="col-sm-3">
                       <select  id="category"  class="form-control" name="category" required>
                        
                        <?php 
                        if(isset($_REQUEST['id'])){
                        echo '<option value="'.$category.'">'.$Cname.'</option>'; 
                      }
                        ?>
                        <option></option>
                            <?php 
                            // Fetch Department
                            $sql = "SELECT * FROM tbl_category";
                            $category = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_assoc($category) ){
                                $CID = $row['CID'];
                                $Cname = $row['Cname'];
                                echo " <option value='".$CID."' >".$Cname."</option>";
                            }
                            ?>
                        </select>
                      
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Name</label>
                    <div class="col-sm-3">
                      <select id="brand"  class="form-control" name="brand" required>
                        <?php 
                        if(isset($_REQUEST['id'])){
                        echo '<option value="'.$brand.'">'.$Bname.'</option>'; 
                      }
                        ?>  
                      </select>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Province</label>
                    <div class="col-sm-3">
                      <select  id="province"  class="form-control" name="province" required>
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
                      <select id="District"  class="form-control" name="District" required>
                          <option value="<?php echo$did ?>"><?php echo$dn ?></option>
                      </select>
                    </div>
                  </div><div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Commune</label>
                    <div class="col-sm-3">
                      <select id="commune"  class="form-control" name="commune" required>
                          <option value="<?php echo$cid ?>"><?php echo$cn ?></option>
                      </select>
                    </div>
                    <label for="inputEmail2" class="col-sm-2 col-form-label">Village</label>
                    <div class="col-sm-3">
                      <select id="village"  class="form-control" name="village" required>
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
                   <div class="field_wrapper">
                     <?php 
                    
                           if ($brand_contact=='') {
                             echo '<div class="form-group row">
                        <label for="item1" class="col-sm-3 col-form-label">Company</label>
                    <div class="col-sm-3">
                          <select id="selItem" name="company[]" class="form-control" required>
                              <option value="">Choose...</option>  
                              <option value="smart.png">Smart</option>
                              <option value="cellcard.png">Cellcard</option>
                              <option value="metfone.png">Metfone</option>
                              <option value="seatel.png">Seatel</option>  
                          </select>
                    </div>
                         <label for="spec" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-3">
                            <input type="text" class="form-control" id="spec" name="pnumber[]" placeholder="">
                    </div>
                          <a style="clear:left;" href="javascript:void(0);" class="add_button" title="Add field">
                                  <i style="font-size:16px; " class="fa  fa-plus-square"></i>
                          </a>
                    </div>';
                           }

                           else{
                      $i=explode("!",$brand_contact);
                      $cname=str_replace(".png", " ",$i);
                      $s=explode("!",$contact);
                      $it=count($i);
                        for ($q=0;$q<$it;$q++){
                          echo '<div class="form-group row">
                        <label for="item1" class="col-sm-3 col-form-label">Company</label>
                    <div class="col-sm-3">
                          <select id="selItem" name="company[]" class="form-control" required>
                              <option value="'.$i[$q].'">'.$cname[$q].'</option>  
                              <option value="smart.png">Smart</option>
                              <option value="cellcard.png">Cellcard</option>
                              <option value="metfone.png">Metfone</option>
                              <option value="seatel.png">Seatel</option>  
                          </select>
                    </div>
                         <label for="spec" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-3">
                            <input type="text" class="form-control" id="spec" name="pnumber[]" placeholder="" value="'.$s[$q].'">
                    </div>
                          <a style="clear:left;" href="javascript:void(0);" class="add_button" title="Add field">
                                  <i style="font-size:16px; " class="fa  fa-plus-square"></i>
                          </a>
                    </div>';
                        }
                           }
                    
                    ?>
               </div> 
                  
                  <div class="form-group row hidden ">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Doc Create of Date</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="datefrom" name="create_date" placeholder="" value="<?php echo $post_dates;?>">
                    </div>
                   
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Discription</label>
                    <div class="col-sm-11">
                      <textarea class="form-control tinymce_textarea" placeholder="Place some text here" name="descrip" id="event-content" 
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $descrip;?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Choose Image</label>
                    <div class="col-sm-6">
                      <!-- <input type="file" class="form-control" id="file" name="file[]" placeholder="" multiple="4"  > -->
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" id="file" name="file[]" multiple accept=".jpg,.jpeg,.png" placeholder="">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                     <label for="inputPassword3" class="col-sm-3 col-form-label"><b>Note: You can upload only 5</b></label>
                  </div>
                  <div class="form-group row hidden ">
                     <label for="inputPassword3" class="col-sm-3 col-form-label">Location Shop</label>
                    <div class="col-sm-9">
                      <input type="text"  id="image" class="form-control" name="img" placeholder="" value="">
                      <input type="" class="form-control" value="<?php echo $image ?>" name="">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <?php 
                  if(isset($_REQUEST['id'])){
                     echo '
                    <button type="submit" class="btn btn-danger " name="btnUpdate"><i class="fa fa-fw fa-edit"></i> Update</button>
                    <a href="index.php?page=documentadd" class="btn btn-danger float-right" name=""><i class="fa fa-fw fa-edit"></i>Add New</a>
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
<style>
 .remove_button { float:left;}
 .test { width:auto; border:solid #CCC 1px;}
#btnjv{ position:absolute; clear:left;}
</style>
<script type="text/javascript">
$(document).ready(function(){

    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
  var addButtons = $('.add_buttons'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
  var wrappers = $('.field_wrappers'); //Input field wrapper
    

    var fieldHTML='<div class="form-group row"><label for="item1" class="col-sm-3 col-form-label">Company</label><div class="col-sm-3"><select id="selItem" name="company[]" class="form-control" required><option value="">Choose...</option>  <option value="smart.png">Smart</option><option value="cellcard.png">Cellcard</option><option value="metfone.png">Metfone</option> <option value="seatel.png">Seatel</option>  </select></div><label for="spec" class="col-sm-2 col-form-label">Phone Number</label><div class="col-sm-3"><input type="text" class="form-control" id="spec" name="pnumber[]" placeholder=""></div><a href="javascript:void(0);" class="remove_button" title="Remove field"> <i style="font-size:16px; float:left;" class="fa fa-minus-square"></i></a></div></div>' ;//New input field html
     //Initial field counter is 1
    var x = 1;
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
       
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter

    });
  
  var xy = 1;
  
  $(addButtons).click(function(){
        //Check maximum number of input fields
        if(xy < maxField){ 
       
            xy++; //Increment field counter
            $(wrappers).append(fieldHTMLS); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrappers).on('click', '.remove_buttons', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        xy--; //Decrement field counter

    });
});

//upload image arry
$(document).ready(function (e) {
  $("#uploadForm").on('change',(function(e) {
    if ($("#file")[0].files.length > 5) {
        window.location = "index.php?page=documentadd&uploadfail=2";
    }
    else{
          e.preventDefault();
    $.ajax({
          url: "page/uploadimg.php?id=<?php echo $nameimg; ?>",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data){
      // $("#gallery").html(data);
       $("#image").val(data);
        },
        error: function(){
          alert('can not upload');
        }           
     });
    }

  }));
});




</script>

<script src="assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>          
<script src="assets/tinymce/custom.tinymce.js"></script>

<script type="text/javascript">
function tinyMCEEditor(id) {
    tinymce.init({
        selector: 'textarea#'+id,
        width:'100%',
        height: 350,
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons iconfonts',
        toolbar: 'undo redo code | bold italic underline strikethrough  | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link unlimk anchor codesample | ltr rtl iconfonts ',
    });
}
</script>
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

   <!--************Upload Fail**************** -->
  <div class="modal fade" id="uploadfail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Fail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <?php 
                     if (isset($_GET['uploadfail'])){
                     echo '<script> $(document).ready(function(){$("#uploadfail").modal("show");});</script>';  
                }
                ?> 
              <p>Image is more then 4.</p>
            </div>
        </div>
    </div>
  </div>




