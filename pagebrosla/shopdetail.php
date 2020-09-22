<?php 
  if(isset($_REQUEST['pid'])){
  $sql_doc = "SELECT * FROM tbl_product where No='".$_GET['pid']."' ";
             $doc = mysqli_query($con,$sql_doc);
             while($row = mysqli_fetch_assoc($doc) ){
              $No=$row['No'];
              $i=explode("!",$row['file']);
              $title=$row['title'];
              $descrip=$row['detail'];
              $brand_contact=$row['brand_contact'];
              $contact=$row['contact'];
              $price=$row['price'];
              $view=$row['view'];
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
             }}
             $upview=$view+1;
  if(isset($_REQUEST['pid'])){
      $sql_doc = "UPDATE tbl_product SET view='$upview'  where No = ".$_REQUEST['pid'];
      $doc = mysqli_query($con,$sql_doc);
}
?>
    <!-- Main content -->
<?php
if ($No!='') {
  
echo' <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-12">
                <img src="document/file/'.$i[0].'" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">';
                
                 if(!empty($i[0])){
                 echo'<div class="product-image-thumb active"><img src="document/file/'.$i[0].'" alt="Product Image"></div>';
                 }
                  if(!empty($i[1])){
                 echo'<div class="product-image-thumb active"><img src="document/file/'.$i[1].'" alt="Product Image"></div>';
                 }
                  if(!empty($i[2])){
                 echo'<div class="product-image-thumb active"><img src="document/file/'.$i[2].'" alt="Product Image"></div>';
                 }
                  if(!empty($i[3])){
                 echo'<div class="product-image-thumb active"><img src="document/file/'.$i[3].'" alt="Product Image"></div>';
                 }
                 if(!empty($i[4])){
                 echo'<div class="product-image-thumb active"><img src="document/file/'.$i[4].'" alt="Product Image"></div>';
                 }
                 
                
            echo'  </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">'. $title.'</h3>
              <hr>
              <h4 class="tr" key="Description">Description</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
               '.$descrip.'
              </div>

              <h4 class="mt-3 tr" key="Contact Number">Contact Number</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <div class="" style="font-size: 22px;color: #028dcf">
                  <div class="row">';
                
                $bc=explode("!",$brand_contact);
                      $c=explode("!",$contact);
                      $it=count($bc);
                        for ($q=0;$q<$it;$q++){
                          echo'<div class="col-sm-12">';
                          echo' <img src="images/'.$bc[$q].'" alt="Product Image" style="width: 40px;height: 40px">  '.$c[$q].'';
                          echo'</div>';
                        }
              
                
                    
                echo'  </div>
                </div>

              </div>
              <h4 class="mt-3 tr" key="LocationShop" >Location Shop : </h4>
              <p class="mt-3 tr" key="" >Home :'.$home.' Stress :'.$stress.' Village :'.$vn.' Commune :'.$cn.' District :'.$dn.' City/Province :'.$pn.'</p>
              <h5>Viewer : '.$view.'</h5>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  '. $price.' $
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>';
  }
  
    ?>  
