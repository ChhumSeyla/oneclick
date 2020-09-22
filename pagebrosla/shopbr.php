<?php 
  
            if (isset($_GET['bid']) && $sid!='') {
              $sql_doc = "SELECT * FROM tbl_product where category='".$cid."' and brand='".$_GET['bid']."' and staffid='".$sid."' and status=1 ORDER BY No desc ";
            }
            else{
              $sql_doc = "SELECT * FROM tbl_product where category='".$cid."' and staffid='".$sid."' and status=1 ORDER BY No desc ";
            }
             $doc = mysqli_query($con,$sql_doc);
              $data1=array();
             while($row = mysqli_fetch_assoc($doc) ){
              $i=explode("!",$row['file']);
              
              $i=explode("!",$row['file']);
                       array_push($data1,array("no"=>$row['No'],"proname"=>$row['title'],"cid"=>$row['category'],"uid"=>$row['staffid'],"img"=>$i[0],"price"=>$row['price'],"fdate"=>$row['future_date'],"today"=>$now));
                     }
                    // echo json_encode($data1);
            ?>
<div class="page " >
  <div class="row">
    <div class="form-group col-sm-12 page-body">
     <div class="row">
        <div class="col-md-12">
          <div class="card  card-danger">
            <div class="card-header">
              <h3 class="card-title tr" key="Find Product by Brand" style="color: white" >Find Product by Brand</h3><br>
              </div>
               <div class="card-body pad">
                <div class="form-group row accent-orange">
                   <?php 
                   if (isset($_GET['cid'])) {
                     $sql_doc = "SELECT * FROM tbl_brand  inner join tbl_product on tbl_brand.ID=tbl_product.brand where category='".$_GET['cid']."' and tbl_product.staffid='".$_GET['sid']."'   GROUP BY ID order by ID asc  ";
                     $doc = mysqli_query($con,$sql_doc);
                     while($row = mysqli_fetch_assoc($doc) ){
                      echo ' <div class="col-md-2" data-aos="fade-up">
                      <a href="index.php?page=shopbr&cid='.$row['category'].'&bid='.$row['brand'].'&sid='.$_GET['sid'].'" >
                    <div class="card card-primary ">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class=" img-fluid " src="images/brand/'.$row['image'].'" alt="User profile picture">
                        </div>
                        <!-- <h3 class="profile-username text-center">Nina Mcintire</h3> -->
                          </div>
                         </div>
                        </a>
                      </div>';
                    }
                   }
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
 <section class="content">
      <!-- Default box -->
      <div class="card card-solid col-md-12" >
        <div class="card-body pb-0">
          <div class="row  " id="listingTable">
           
          </div>
        </div>
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item" id="btn_prev"><a class="page-link" href="javascript:prevPage()" >Priviues</a></li>
              <li class="page-item" id="btn_next"><a class="page-link" href="javascript:nextPage()" >Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </section>
    <div class="container">
  </div>
</div>
<script type="text/javascript">
var current_page = 1;
var records_per_page = 32;

var objJson = <?php echo json_encode($data1); ?>; // Can be obtained from another source, such as your objJson variable

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
        listing_table.innerHTML +='<div class="col-lg-3 col-md-6 col-sm-6 d-flex align-items-stretch" data-aos="fade-up"><div class="card "><div class="card-header text-muted border-bottom-0"><h2 class="lead text-danger"><b>'+objJson[i].proname+img+'</b></h2><a href="index.php?page=shop&pid='+objJson[i].no+'&sid='+objJson[i].uid+'"> <p class=" tr" key="Go To Shop">Go To Shop</p> </a><p class="text-danger" style="color:font-size: 22px;font-weight: bold; " >'+objJson[i].price+' $</p></div><div class="card-body pt-0"><a href="index.php?page=shopdetail&cid='+objJson[i].cid+'&pid='+objJson[i].no+'&sid='+objJson[i].uid+'" ><div class="row"><div class="col-12 text-center"><img src="document/file/'+objJson[i].img+'" alt="" class="img-fluids img-fluid" ></div><div class="col-12"><br><div class="row"><div class="col-md-12"></div><div class="col-md-6 text-left"> </div></div></a></div></div></div></div></div>' ;
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