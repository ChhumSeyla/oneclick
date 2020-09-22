<?php
include "../../config.php";

$departid = $_POST['pdob'];
   // department id

$sql = "SELECT DID,TITLE FROM tbl_district WHERE DID like '".$departid."%'";

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['DID'];
    $name = $row['TITLE'];

    $users_arr[] = array("DID" => $userid, "TITLE" => $name);
}

// encoding array to json format
echo json_encode($users_arr);