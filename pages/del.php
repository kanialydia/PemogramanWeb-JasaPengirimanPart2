<?php
// Author by jhacko
include('db.php');
if($_POST['userID']){
$id=$_POST['userID'];
$delete = "DELETE FROM `pengguna` WHERE userID='".$id."'";
mysql_query( $delete);
}
?>