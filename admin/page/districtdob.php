<?php
include "../../config.php";

$departid = $_POST['ddob'];  // district id
$sql = "SELECT CID,TITLE FROM tbl_commune WHERE CID like '".$departid."%'";
$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['CID'];
    $name = $row['TITLE'];

    $users_arr[] = array("CID" => $userid, "TITLE" => $name);
}

// encoding array to json format
echo json_encode($users_arr);