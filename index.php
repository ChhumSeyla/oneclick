<?php
include ("config.php"); 
$home='...';
$stress='...';
$vn='...';
$cn='...';
$dn='...';
$pn='...';
$title='No Product';
$descrip='';
$brand_contact='';
$contact='';
$price='';
$view=0;
$No='';
$sid='';
$uname='No Shop';
$id='';
$cid='';
$pid='';
if(isset($_REQUEST['sid'])){
  $sid=$_REQUEST['sid'];
}
if(isset($_REQUEST['cid'])){
  $cid=$_REQUEST['cid'];
}
if(isset($_REQUEST['pid'])){
  $pid=$_REQUEST['pid'];
}
// if (isset($_GET['#'])) {
//   $lg='lnk()';
// }
// else if (isset($_GET['###'])) {
//   $lg='lnc()';
// }
// else{$lg='lne()';}
$now = date("Y-m-d", time());
$newImg = '&nbsp;<img style="margin-top:-14px;" src="images/newicon.gif" alt="new" />';
?>
<!doctype html>
<html lang="en">
  <head>
  <title>One Click</title>
    <link rel="stylesheet" href="fonts/icomoon/style.css">
   <!--  <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
 <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="icon" type="image/png" href="images/icons/imglogo_Jik_icon.ico"/>
   <!--  <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
   <!--Admin LTE -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
<!--   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker -->
 <!--  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <!--  <link rel="stylesheet" href="cssnew/nice-select.css" type="text/css">
    <link rel="stylesheet" href="cssnew/jquery-ui.min.css" type="text/css"> -->
    <link rel="stylesheet" href="cssnew/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="cssnew/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="cssnew/style.css" type="text/css">
  <script src="plugins/jquery/jquery.min.js"></script>
  <style type="text/css">
    @font-face { 
          font-family:brosla;
          font-style: normal;
          src:url(fonts/KhmerOScontent.ttf);
        }
         .product-image{width: 60%;height: 60%}
         .img-fluids{width: 400px;height: 200px}
         .fa-star,.fa-star-half{color: orange;}
         /*.categories__item{width: 80%;height: 80%}*/
   body{ font-family: brosla; }
  </style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" class="sidebar-collapse" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" style="height: auto;" onload="<?php echo $lg;?>" >
    <div class="wrapper" style="height: auto;background-color: white !important" >
 
<?php include "pagebrosla/menu.php"; ?>

  <div class="content-wrapp er">
    <!-- image slide show-->
   <!--  -->
    
    <section class="content-header">

    <?php  
       if (!isset($_GET['page']) || $_GET['page']=='home'){
          include "pagebrosla/body.php";
          include("pagebrosla/home.php");  
       }
       else if ($_GET['page']=='coperate'){
          include "pagebrosla/body.php";
          include("pagebrosla/coperate.php");
       }
      else if ($_GET['page']=='contact'){
                include "pagebrosla/body.php";
                include("pagebrosla/contact.php");
      }
      else if ($_GET['page']=='about'){
                include "pagebrosla/body.php";
                include("pagebrosla/about.php");
      }
      
      else if ($_GET['page']=='contactlist'){
                include "pagebrosla/body.php";
                include("pagebrosla/contactlist.php");
      }
      else if ($_GET['page']=='shop'){
                include "pagebrosla/profileshop.php";
                include("pagebrosla/shopdetail.php");
                include("pagebrosla/shop.php");
      }
      else if ($_GET['page']=='shopbr'){
                include "pagebrosla/profileshop.php";
                include("pagebrosla/shopbr.php");
      }
      else if ($_GET['page']=='shopdetail'){
                include "pagebrosla/profileshop.php";
                include("pagebrosla/shopdetail.php");
                include("pagebrosla/shop.php");
      }
      else if ($_GET['page']=='search'){
                include "pagebrosla/body.php";
                include("pagebrosla/search.php");  
      }
      
    ?>
     </section> 
  </div>
</div>
  <footer class="main-footer bg-danger">
    <strong>Copyright by Late squad of ML  &copy; 2020-<?php echo date("Y"); ?> , All Rights Reserved.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
   <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <div>
   
  </body>
  <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
<!--   <script src="js/bootstrap.min.js"></script> -->
    <script src="jsnew/jquery.nice-select.min.js"></script>
    <script src="jsnew/jquery-ui.min.js"></script>
    <script src="jsnew/jquery.slicknav.js"></script>
    <script src="jsnew/mixitup.min.js"></script>
    <script src="jsnew/owl.carousel.min.js"></script>
    <script src="jsnew/main.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<!-- <script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="js/lnjs.js"></script>
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
  function check1(){
        var ck1 = document.getElementById('saving');
      var curr = document.getElementById("sacurr").value;
      if (ck1.checked){
        document.getElementById('agree1').href="opa/register.php?ac=6000&curr="+curr;
      }
    else {
        alert('Please check Agree')
      }   
    }
    
     function check2(){
       var ck2 = document.getElementById('current');
       var curr = document.getElementById("cacurr").value;
       if (ck2.checked){
        document.getElementById('agree2').href="opa/register.php?ac=1001&curr="+curr;
       }
       else {
        alert('Please check Agree')
      }
       }
    function check3(){
         var ck3 = document.getElementById('elite');
          var curr = document.getElementById("eacurr").value;
         if (ck3.checked){
              document.getElementById('agree3').href="opa/register.php?ac=1007&curr="+curr;
         }
           else {
              alert('Please check Agree')
         }  
     }
     function check4(){
         var ck4 = document.getElementById('premium');
          var curr = document.getElementById("prcurr").value;
         if (ck4.checked){
              document.getElementById('agree6').href="opa/register.php?ac=1008-1008.01&curr="+curr;
         }
           else {
              alert('Please check Agree')
         }  
     }    
  // tab
     function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
           tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
      //tabcontent[i].style.display = "block";
          }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
             document.getElementById(cityName).style.display = "block";
             evt.currentTarget.className += " active";
        }
      
    //document.getElementById('Modal')
//    
//    
//        $('#modal1').on('show.bs.modal', function (e) {
//               document.getElementById('sa').className="tablinks ";
//         document.getElementById('csa').className="tablinks active";
//         document.getElementById('feature1').style.display="none";
//         document.getElementById('condition1').style.display="block"; 
//         document.getElementById('saving').checked="";
//            })
//      $('#modal2').on('show.bs.modal', function (e) {
//               document.getElementById('ca').className="tablinks";
//         document.getElementById('cca').className="tablinks active";
//         document.getElementById('feature2').style.display="none";
//         document.getElementById('condition2').style.display="block";
//         document.getElementById('current').checked="";
//            })
//      
//      $('#modal3').on('show.bs.modal', function (e) {
//         document.getElementById('ea').className="tablinks";
//         document.getElementById('cea').className="tablinks active";
//         document.getElementById('feature3').style.display="none";
//         document.getElementById('condition3').style.display="block";
//         document.getElementById('elite').checked="";
//            })
  
     $(document).ready(function(){
          // Add smooth scrolling to all links
          $(".sc").on('click', function(event) {
          if (this.hash !== "") {
                 event.preventDefault();
                 var hash = this.hash;
               $('html, body').animate({
                 scrollTop: $(hash).offset().top
                }, 800, function(){
                   window.location.hash = hash;
               });
            } // End if
          });
        });
     
     // ln
        var enl = document.getElementById('en');
    var khm = document.getElementById('kh');
        var cny = document.getElementById('cn'); 
     function lne(){
       enl.style.display="inline <br>";
       cny.style.display="inline <br>";
       khm.style.display="inline <br>";
       sessionStorage.removeItem("lang");
       sessionStorage.setItem("lang", "en");
     }
     function lnk(){
       enl.style.display="inline <br>";
       cny.style.display="inline <br>";
       khm.style.display="inline <br>";
       sessionStorage.removeItem("lang");
       sessionStorage.setItem("lang", "kh");
            // Retrieve
     }
     function lnc(){
       enl.style.display="inline <br>";
       cny.style.display="inline <br>";
       khm.style.display="inline <br>";
       sessionStorage.removeItem("lang");
       sessionStorage.setItem("lang", "cn");
     }
     // function onclick(){
     //   //sessionStorage.setItem("lang", "en");
     //   alert(sessionStorage.setItem("lang"));
     //   var lang = sessionStorage.getItem("lang");//$(this).attr('id'); // obtain language id
     //             // translate all translatable elements
     //              $('.tr').each(function(i){
     //                  $(this).text(aLangKeys[lang][ $(this).attr('key') ]);
     //               });
     //              if (lang=='kh') {
     //    khm.style.display="none";
     //    cny.style.display="none";//not display chines
     //  }else if (lang=='en'){
     //    enl.style.display="none";
     //    cny.style.display="none";//not display chines
     //  }else if (lang=='cn'){
     //      enl.style.display="none";
     //    cny.style.display="none";//not display chines
     //  }else {
     //    khm.style.display="inline";
     //    enl.style.display="none";
     //    cny.style.display="none";//not display chines
     //  }
      
       
       
     // }
    </script>
    <script type="text/javascript">
    //Confrim password

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
  </script>

</html>