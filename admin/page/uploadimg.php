<?php
// for($i=1;$i<count($_FILES["file"]["name"]);$i++)
// 	{}	
 $id=$_GET['id'];
if(is_array($_FILES)) {
foreach ($_FILES['file']['name'] as $name => $value){
if(is_uploaded_file($_FILES['file']['tmp_name'][$name])) {
$sourcePath = $_FILES['file']['tmp_name'][$name];
$file=$_FILES['file']['name'][$name];
$targetPath = "../../document/file/";
$dates=date("h");
if(move_uploaded_file($sourcePath,$targetPath.$id.$dates.$file)) {
?>
<?php echo $id.$dates.$file.'!'; ?>
<?php
}}}}
?>

