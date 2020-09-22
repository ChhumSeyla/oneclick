<?php 
  include('../../config.php');
  $id=$_GET['id'];
  $path='../profile/';
  $arr_file_types = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
   if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
      echo "false";
	  return;
   }
   if (!file_exists($path)) {
    mkdir($path, 0777);
   }
    $selectSql = "select img_profile from pro_cache_user where id='".$id."'";
    $rsSelect = mysqli_query($con,$selectSql);
    $getRow = mysqli_fetch_assoc($rsSelect);
    $getIamgeName = $getRow['img_profile'];
    $createDeletePath = "../profile/".$getIamgeName;
    
   if (move_uploaded_file($_FILES['file']['tmp_name'], $path .$id.'_'. $_FILES['file']['name'])){
       if ($getIamgeName!='') {
         unlink($createDeletePath);
       }
        
		    $file_name=$id.'_'. $_FILES['file']['name'];
		    $sql="UPDATE `pro_cache_user` SET `img_profile`='".$file_name."' WHERE `id`='".$id."'";
			$result = $con->query($sql);
		    echo "success";
		 die();
		}       
   else {echo 'false';}  

   
?>