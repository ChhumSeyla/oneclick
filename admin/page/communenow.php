<?php
include "../../config.php";

$departid = $_POST['v'];   // commune id

//$departid ='01.002.007';

$sql = "SELECT VID,TITLE FROM tbl_village WHERE VID like '".$departid."%'";

//echo $sql;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['VID'];
    $name = $row['TITLE'];

    $users_arr[] = array("VID" => $userid, "TITLE" => $name);
}

// encoding array to json format
echo json_encode($users_arr);