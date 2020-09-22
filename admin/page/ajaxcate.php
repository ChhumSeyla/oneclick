<?php
include "../../config.php";
$users_arr = array();


$departid = $_POST['CID'];
   // department id

// $sql = "SELECT * FROM tbl_catbrand inner join tbl_brand on tbl_catbrand.brandID=tbl_brand.BID WHERE catID like '".$departid."'";
$st = "SELECT * FROM tbl_catbrand INNER JOIN tbl_brand ON tbl_catbrand.brandID=tbl_brand.ID WHERE catID = '".$departid."'";
                          $qr = $con->query($st);
                          while($row = $qr->fetch_assoc()){
                        
   $userid = $row['ID'];
    $name = $row['Bname'];

    $users_arr[] = array("BID" => $userid, "Bname" => $name);
}

// encoding array to json format
echo json_encode($users_arr);