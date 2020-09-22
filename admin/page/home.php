<!-- Content Header (Page header) -->
<?php 
$result=$con->query("SELECT count(*) as total FROM pro_cache_user  ");
                       $data=$result->fetch_assoc();
                       $alluser = $data['total'];

$tdept=$con->query("SELECT count(*) as total FROM tbl_category  ");
                       $data=$tdept->fetch_assoc();
                       $ttdept = $data['total'];

$tdoc=$con->query("SELECT count(*) as total FROM tbl_product  ");
                       $data=$tdoc->fetch_assoc();
                       $ttdoc = $data['total'];

 $staffid=$_SESSION['uid'];


$tdpdoc=$con->query("SELECT count(*) as total FROM tbl_product where staffid='".$staffid."'  ");
                       $data=$tdpdoc->fetch_assoc();
                       $totaldoc = $data['total'];
?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $alluser; ?></h3>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $ttdept;?></h3>

                <p>Total Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $ttdoc;?></h3>

                <p>Total Post</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totaldoc;?></h3> 

                <p>Total Your post</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row">
          <section class="col-lg-7 connectedSortable">
             <!-- Calendar -->
            <div class="card bg-gradient-danger">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                
               
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
                <input type="hidden"id="sparkline-1" name="" class="">
                <input type="hidden" id="sparkline-2" name="" class="">
                <input type="hidden" id="sparkline-3" name="" class="">
              </div>
              <!-- /.card-body -->
            </div>


          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
