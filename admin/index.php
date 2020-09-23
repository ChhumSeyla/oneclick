<?php
include ("../config.php");
// include('param.php');  

if(empty($_SESSION)){ // if the session not yet started 
        session_start();
        }
    if(!isset($_SESSION['name'])) { //if not yet logged in
        header("Location:login.php");// send to login page
       exit;
    }  
  //-----------------get image profile --------------------------------
    function getimg($sid){
                 $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                 $sql="select * from user where Phone='".$sid."'";
               $result = $conn->query($sql);
           if ($result->num_rows > 0){
                     while($row = $result->fetch_assoc()) {
                         if ($row['img_profile']!=''){
                   $img=$row['img_profile'];
                 }
                 else {
                   $img='blank.png';
                 } 
               }
           }
           else {    
                   $img='blank.png';
             }
         return $img;
     }
     $now = date("Y-m-d", time());
     $usid=$_SESSION['uid'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>One Click | Admin</title>
  <link rel="icon" type="image/png" href="../images/icons/imglogo_Jik_icon.ico"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../old/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../old/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/Adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="../old/scripts/style.css" />
  <script src="../plugins/jquery/jquery.min.js"></script>
<script src="../old/scripts/jquery.form.js"></script>
<!-- <script type="text/javascript" src="../old/scripts/jquery_upload.js"></script> -->
<style type="text/css">
  
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-fw fa-navicon"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
         <i class="fa fa-fw fa-gears"></i>
        </a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="index.php?page=home" class="brand-link navbar-danger">
      <img src="../images/imglogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>One Click</b></span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="profile/<?php echo getimg($_SESSION['staffID']); ?>"  class=" elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php?page=profile" class="d-block"><span class="hidden-xs"><?php echo $_SESSION["staffID"] ?></span></a>

        </div>

      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview ">
           
              <p>
                <a href="index.php?page=profile" class="d-block"><span class="hidden-xs"><?php echo $_SESSION["name"] ?></span></a>
              
              </p>
           
          </li>
          
          <li class="nav-item">
            <a href="index.php?page=product_guid" class="nav-link">
              <i class="fa fa-fw fa-folder"></i>
              <p>Product List<span class="right badge badge-danger">New</span></p>
            </a>
          </li>
          
           <?php
                       $sql="select * from pro_cache_user where id='".$_SESSION['uid']."'";
                       $result = $con->query($sql);
                       while($row = $result->fetch_assoc()) {
                             if ($row['Type']==1) {
                               echo '<li class="nav-item">
                                      <a href="index.php?page=videolist" class="nav-link">
                                        <i class="fa fa-fw fa-file-image-o"></i>
                                        <p>Upload Video<span class="right badge badge-danger">New</span></p>
                                      </a>
                                    </li>
                                     <li class="nav-item">
                                      <a href="index.php?page=allowuser&ac=0&upid=0" class="nav-link ">
                                        <i class="fa fa-fw fa-users"></i>
                                        <p>Controll User</p>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a href="index.php?page=brandlist" class="nav-link ">
                                        <i class="fa fa-fw fa-users"></i>
                                        <p>Brand List</p>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a href="index.php?page=addcategory" class="nav-link ">
                                        <i class="fa fa-fw fa-users"></i>
                                        <p>Add Category</p>
                                      </a>
                                    </li>
                                     <li class="nav-item">
                                      <a href="index.php?page=Categorylist" class="nav-link">
                                        <i class="ion ion-bag"></i>
                                        <p>Category List<span class="right badge badge-danger">New</span></p>
                                      </a>
                                      <ul class="nav nav-treeview">
                               ';
                               $sqls="select * from tbl_category";
                       $result = $con->query($sqls);
                       while($row = $result->fetch_assoc()) {
                        echo '
                                <li class="nav-item">
                                  <a href="index.php?page=Categorylist&cid='.$row['CID'].'" class="nav-link">
                                    <p>'.$row['Cname'].'</p>
                                  </a>
                                </li>
                             ';
                       }
                       echo' </ul>
                            </li>';
                     }
                 }
             ?>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fa fa-fw fa-sign-out"></i>
              <p>Sign Out</p>
            </a>
          </li>

         
        </ul>
      </nav>
    </div>
  </aside>

<!-- *********************End Menu**************************-->
  <div class="content-wrapper">
    <?php  
       if (!isset($_GET['page']) || $_GET['page']=='home'){
          include("page/home.php");  
       }
       else if ($_GET['page']=='Categorylist'){
          include("page/Categorylist.php");
       }
       else if ($_GET['page']=='promotionadd'){
          include("page/promotionadd.php");
       }
      else if ($_GET['page']=='documentlist'){
                include("page/documentlist.php");
      }
       else if ($_GET['page']=='documentadd'){
                include("page/documentadd.php");
      }
      else if ($_GET['page']=='profile'){
                include("page/profile.php");
      }
      else if ($_GET['page']=='image'){
                include("page/image.php");
      }
      else if ($_GET['page']=='videolist'){
                include("page/videolist.php");
      }
      else if ($_GET['page']=='brandlist'){
                include("page/brandlist.php");
      }
      else if ($_GET['page']=='allowuser'){
                include("page/allowuser.php");
      }
      else if ($_GET['page']=='adduser'){
                include("page/adduser.php");
      }
      else if ($_GET['page']=='addcategory'){
                include("page/addcategory.php");
      }
      else if ($_GET['page']=='product_guid'){
                include("page/product_guid.php");
      }
      ?>
    
  </div>

     



  <footer class="main-footer bg-danger">
    <strong>Copyright &copy; 2020 Last Squad of ML.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(function () {
      $('#datefrom').datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true 
      })
      $('#dateto').datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true
      })  
  });
</script>
<script type="text/javascript">
  $("#vsFadeOffUpdate").fadeTo(2000, 500).slideUp(500, function(){
      $("#vsFadeOffUpdate").slideUp(500);
  });
  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });

   $(document).ready(function(){

            $("#category").change(function(){
                var pid = $(this).val();
                $.ajax({
                    url: 'page/ajaxcate.php',
                    type: 'post',
                    data: {CID:pid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#brand").empty();
                        $("#brand").append("<option></option>");
                        for( var i = 0; i<len; i++){
                            var DID = response[i]['BID'];
                            var name = response[i]['Bname'];

                            $("#brand").append("<option value='"+DID+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });

    $(document).ready(function(){

            $("#province").change(function(){
                var pid = $(this).val();

                $.ajax({
                    url: 'page/provincenow.php',
                    type: 'post',
                    data: {p:pid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#District").empty();
                        $("#District").append("<option></option>");
                        for( var i = 0; i<len; i++){
                            var DID = response[i]['DID'];
                            var name = response[i]['TITLE'];

                            $("#District").append("<option value='"+DID+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });

  $(document).ready(function(){

            $("#District").change(function(){
                var did = $(this).val();

                $.ajax({
                    url: 'page/districtnow.php',
                    type: 'post',
                    data: {d:did},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#commune").empty();
                        $("#commune").append("<option ></option>");
                        for( var i = 0; i<len; i++){
                            var CID = response[i]['CID'];
                            var name = response[i]['TITLE'];

                            $("#commune").append("<option value='"+CID+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });


   $(document).ready(function(){

                $("#commune").change(function(){
                var cid = $(this).val();


                $.ajax({
                    url: 'page/communenow.php',
                    type: 'post',
                    data: {v:cid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#village").empty();

                            $("#village").append("<option></option>");
                        for( var i = 0; i<len; i++){
                            var CID = response[i]['VID'];
                            var name = response[i]['TITLE'];

                            $("#village").append("<option value='"+CID+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });

   function isNumberKey(evt){  <!--Function to accept only numeric values-->
  var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
  && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }

</script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
    function validateFileType(){
        var fileName = document.getElementById("file").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    }
</script>

</body>
</html>
