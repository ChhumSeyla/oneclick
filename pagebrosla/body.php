<div class="row ">
   <section class="content-header col-sm-2" >
      
       <!--  <div class="card-body" style="margin-top: 50px" >
                                   
              </div> -->
    </section>
    <section class="content-header col-sm-8" >
        <div class="card-body" style="margin-top: 50px" >
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner"  >
                    <div class="carousel-item active" >
                      <img class="d-block w-100" src="images/slide2.jpg" alt="First slide" >
                    </div>
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
                              
                              if(($imgFileType == 'jpg') || ($imgFileType == 'png'))
                              {
                            echo '<div class="carousel-item " >
                                    <img class="d-block w-100" src="document/video/'.$image.'" alt="First slide" >
                                  </div>';
                               
                              }
                              }
                            
                              closedir($opendirectory);
                           
                          }
                          ?>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
    </section> 
    <!-- video show-->
     <section class="content-header col-sm-2" >
      
       <!--  <div class="card-body" style="margin-top: 50px" >
                                   
              </div> -->
    </section>  
    </div>