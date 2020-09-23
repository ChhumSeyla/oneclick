
<?php 
             $sql_doc = "SELECT * FROM tbl_product where status=1 ORDER BY No desc LIMIT 90";
             $doc = mysqli_query($con,$sql_doc);
             $data=array();
             while($row = mysqli_fetch_assoc($doc) ){
              $i=explode("!",$row['file']);
                       array_push($data,array("no"=>$row['No'],"proname"=>$row['title'],"cid"=>$row['category'],"uid"=>$row['staffid'],"img"=>$i[0],"price"=>$row['price'],"fdate"=>$row['future_date'],"today"=>$now));

                     }
                     //echo json_encode($data);
  ?>
  <div class="page " >
  <div class="row">
          <div class="form-group col-sm-12 page-body">
          <div class="row">
          <div class="col-md-12">
           <div class="card  card-danger">
            <div class="card-header">
              <h3 class="tr card-title" key="Find Product by Category" style="color: white" >Find Product by Category</h3><br>
              </div>
               <div class="card-body pad">
                
                <div class="form-group row accent-orange">
          <?php 
            $sql_doc = "SELECT * FROM tbl_category inner join tbl_product on tbl_category.CID=tbl_product.category  group by CID order by CID asc ";
             $doc = mysqli_query($con,$sql_doc);
             while($row = mysqli_fetch_assoc($doc) ){
                 if ($row['Cname']=='Phone') {
                   $Cname='Phone';
                 }
                 else{
                  $Cname=$row['Cname'];
                 }
              
                echo ' <div class="col-md-2 text-center" data-aos="fade-up">
              <a href="index.php?page=coperate&cid='.$row['CID'].'" >
            <div class="card card-primary ">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img src="images/menu/'.$row['img'].'" class="img-circle img-fluid"  style="width: 30%;height: 30%">
                </div>
                 <p class="tr" key="'.$Cname.'"><a href="index.php?page=coperate&cid='.$row['CID'].'" >'.$row['Cname'].'</a></p>
                  </div>
                 </div>
                </a>
              </div>';
                 }
            ?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>     
  </div>
    <!--Popular Ads-->
    <section class="categories" >
        <div class="container">
          <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Popular Ads</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="row">
                <div class="categories__slider owl-carousel accent-danger">
                  <?php
                    $sql_doc = "SELECT * FROM tbl_product where status=1 ORDER BY view desc LIMIT 90";
                     $doc = mysqli_query($con,$sql_doc);
                     while($row = mysqli_fetch_assoc($doc) ){
                      $i=explode("!",$row['file']);
                      echo'<div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="document/file/'.$i[0].'">
                            <ul class="featured__item__pic__hover">
                                <li><a href="index.php?page=shop&pid='.$row['No'].'&sid='.$row['staffid'].'"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h5 ><a href="index.php?page=contactlist&cid='.$row['category'].'&pid='.$row['No'].'">'.$row['title'].' $</a></h5>
                            <h5 >'.$row['price'].' $</h5>
                        </div>
                    </div>
                </div>';}
                   ?>

                    
                </div>
            </div>

              </div>
              <!-- /.card-body -->
            </div>
            
        </div>
    </section>
<!-- Feature Ads -->
    <section class="categories" >
        <div class="container">
          <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Feature Ads</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="row">
                <div class="categories__slider owl-carousel accent-danger">
                  <?php
                    $sql_doc = "SELECT * FROM tbl_product where status=1 ORDER BY create_date desc LIMIT 90";
                     $doc = mysqli_query($con,$sql_doc);
                     while($row = mysqli_fetch_assoc($doc) ){
                      $i=explode("!",$row['file']);
                      echo'<div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="document/file/'.$i[0].'">
                            <ul class="featured__item__pic__hover">
                                <li><a href="index.php?page=shop&pid='.$row['No'].'&sid='.$row['staffid'].'"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h5 ><a href="index.php?page=contactlist&cid='.$row['category'].'&pid='.$row['No'].'">'.$row['title'].' $</a></h5>
                            <h5 >'.$row['price'].' $</h5>
                        </div>
                    </div>
                </div>';}
                   ?>

                    
                </div>
            </div>

              </div>
              <!-- /.card-body -->
            </div>
            
        </div>
    </section>

<!-- Latest Ads -->
<section class="categories page" style="margin-top: 20px">
<div class="container">
  <div class="form-group col-sm-12 page-body">
    <div class="row">
      <div class="col-md-12">
      <div class="card card-outline card-danger" >
        <div class="card-header">
                <h3 class="card-title">Latest Ads</h3>
              </div>
        <div class="card-body pb-0" >
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

      <!-- /.card -->
<!--page: <span id="page"></span>-->
<script type="text/javascript">
var current_page = 1;
var records_per_page = 100;

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
          var img='&nbsp;<img style="margin-top:-14px;" src="images/newicon.gif" alt="new" />';
        }
        listing_table.innerHTML +='<div class="col-lg-3 col-md-6 col-sm-6 d-flex align-items-stretch" data-aos="fade-up"><div class="card bg-light"><div class="card-header text-muted border-bottom-0"><h2 class="lead text-danger"><b>'+objJson[i].proname+img+'</b></h2><a href="index.php?page=shop&pid='+objJson[i].no+'&sid='+objJson[i].uid+'"> <p class=" tr" key="Go To Shop">Go To Shop</p> </a><p class="text-danger" style="font-size: 22px;font-weight: bold; " >'+objJson[i].price+' $</p></div><div class="card-body pt-0"><a href="index.php?page=contactlist&cid='+objJson[i].cid+'&pid='+objJson[i].no+'" ><div class="row"><div class="col-12 text-center"><img src="document/file/'+objJson[i].img+'" alt="" class=" img-fluid img-fluids" ></div><div class="col-12"><br><div class="row"><div class="col-md-12"></div><div class="col-md-6 text-left"> </div></div></a></div></div></div></div></div>' ;
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


