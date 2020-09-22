<?php 
include ("../../config.php");
date_default_timezone_set("Asia/Bangkok");
$date = date('Ymdhi');
   $upload_images = array();
   $upload_dir = "../../document/video/";
   foreach($_FILES['images_upload']['name'] as $key=>$val){       
        $file_path = $upload_dir.$date.$_FILES['images_upload']['name'][$key];
		$filename = $_FILES['images_upload']['name'][$key];
		if(is_uploaded_file($_FILES['images_upload']['tmp_name'][$key])) {			
			if(move_uploaded_file($_FILES['images_upload']['tmp_name'][$key],$file_path)){
				$upload_images[] = $file_path;
				$insert_sql = "INSERT INTO video( file_name, upload_time) 
					VALUES( '".$date.$filename."', '$date')";
				mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($conn));
			} 
		}
    }
?>
<div class="row">
	<div class="gallery">
		<?php
		if(!empty($upload_images)){ 
			foreach($upload_images as $image){ ?>
			<ul>
				<li >
					<video controls loop style="width: 30%;height: 30%">
						  <source src="page/<?php echo $image; ?>" type="video/mp4">
						  Your browser does not support the video tag.
					</video>
				</li>
			</ul>
		<?php }	}?>
	</div>
</div>





