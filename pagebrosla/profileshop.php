<?php
$like='<button type="submit" name="like" class="btn btn-sm bg-teal ">
                                      <i class="fas fa-thumbs-up"></i>
                                    </button>';
if (isset($_GET['sid'])) {
  $sql_doc = "SELECT * FROM pro_cache_user where id='".$_GET['sid']."' ";

             $doc = mysqli_query($con,$sql_doc);
             while($row = mysqli_fetch_assoc($doc) ){
              $id=$row['id'];
              $value=$row['value'];
              $uname=$row['name'];
              $pnumber=$row['staff_id'];
             $img=$row['img_profile'];

             }}
$values=$value+1;
if(isset($_REQUEST['like'])){
      $sql_doc = "UPDATE pro_cache_user SET value='$values'  where id='".$_GET['sid']."' ";
      if ($con->query($sql_doc) === TRUE) {
        $like='';
      }
}             
    if ($value>=50000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    }
   else if ($value>=45000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
    }
    else if ($value>=40000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    }
    else if ($value>=35000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
    }
    else if ($value>=30000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    }
    else if ($value>=25000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
    }
    else if ($value>=20000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star"></i>';
    }
    else if ($value>=15000) {
      $star='<i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
    }
    else if ($value>=10000) {
      $star='<i class="fa fa-star"></i>';
    }
    else  {
      $star='<i class="fa fa-star-half"></i>';
    }
    // else{
    //   $star='<i class="fa fa-star"></i>';
    // }
?>
<div class="row" >
  <?php 
  if ($id!='') {
     echo' <section class="content-header col-sm-6 active-primary" >
     <form method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="card-body" style="margin-top: 40px" >
                 <div class="row">
                      <div class="card card-solid">
                        <div class="card-body pb-0">
                          <div class="row d-flex align-items-stretch">
                            <div class="col-12  d-flex align-items-stretch" data-aos="fade-up">
                              <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                  Digital Strategist
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div class="col-7">
                                      <h2 class="lead"><b>'.$uname.'</b></h2>
                                      <p class="text-muted text-sm"><b>About: </b> Web Developer <br>Tank of Mobile legend</p>
                                      <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="big">'.$star.'</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                      </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                      <img src="admin/profile/'.$img.'" alt="" class="img-circle img-fluid" style="width: 100%;height: 100%">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer ">
                                  <div class="text-right ">
                                    <a href="#" class="btn btn-sm bg-teal">
                                      <i class="fas fa-comments"></i>
                                    </a>
                                    '.$like.'
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
            </div>
              </div>
              </form>
    </section> ';
  }
  else{
    echo' <section class="content-header col-sm-6" >
        <div class="card-body" style="margin-top: 40px" >
                 <div class="row">
                      <div class="card card-solid">
                        <div class="card-body pb-0">
                          <div class="row d-flex align-items-stretch">
                            <div class="col-12  d-flex align-items-stretch" data-aos="fade-up">
                              <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                  Digital Strategist
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div class="col-7">
                                      <h2 class="lead"><b>No Shop</b></h2>
                                      
                                    </div>
                                    <div class="col-5 text-center">
                                      <img src="admin/profile/Background.png" alt="" class="img-circle img-fluid" style="width: 100%;height: 100%">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                      <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                      <i class="fas fa-user"></i> View Profile
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
            </div>
              </div>
    </section> ';
  }
  
    ?>
    <!-- video show-->
    <section class="content-header col-sm-6" >
        <div class="card-body" style="margin-top: 40px" >
          <div class="row">
                      <div class="card card-solid">
                        <div class="card-body pb-0">
                          <div class="row d-flex align-items-stretch">
                            <div class="col-12  d-flex align-items-stretch" data-aos="fade-up">
                              <div class="card bg-light">
                       <?php
                      $directory='document/video/'; // Add your Directory here
                      $path    = './'.$directory.'/';
                      $allFiles = scandir($path,1);

                      $files = array_diff($allFiles, array('.', '..'));

                      // print_r($files)
                      ?>

                      <?php
                      $imagesDirectory = "document/video/";
                       $data=array();
                      if(is_dir($imagesDirectory))
                      {
                        $opendirectory = opendir($imagesDirectory);
                        
                          while (($image = readdir($opendirectory)) !== false)
                        {
                          if(($image == '.') || ($image == '..'))
                          {
                            continue;
                          }
                          
                          $imgFileType = pathinfo($image,PATHINFO_EXTENSION);
                          
                          if(($imgFileType == 'mp4') || ($imgFileType == 'mp4'))
                          {
                          $img=$image;
                           array_push($data,array($img));
                          }
                          }
                        
                          closedir($opendirectory);
                       
                      }
                      
                      ?> 

                      <div class="main">  
                          <video autoplay src="<?php echo 'document/video/'.$files[1];?>" id="myvideo" width="92%" height="95%" controls muted preload="auto"  poster="gambar\logo.png">
                      </video>
                      <script type='text/javascript'>
                        var directory = '<?php echo $directory;?>';
                          var myvids = <?php echo json_encode($data); ?>;
                          index=0;
                          document.getElementById('myvideo').addEventListener('ended',myHandler,false);
                          function myHandler(e) {
                           index++;
                             // For Repeating all video files 
                             if(index>=myvids.length)
                              index=0;

                           var vid = document.getElementById("myvideo");
                             vid.src = directory+'/'+myvids[index];
                             
                          }
                          

                      </script>
                      </div>  
 
                    </div>
                  </div>
                  </div>
              </div>
            </div>
          </div> 
        </div>
    </section> 
  </div>