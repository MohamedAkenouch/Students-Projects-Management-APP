<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'miniprojets');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<?php
if ($link->connect_error) {
    die('Error : ('. $link->connect_errno .') '. $link->connect_error);
}
$array = $_POST['arrayorder'];
 
if ($_POST['update'] == "update"){
  
 $count = 1;
 foreach ($array as $idval) {
     echo $idval;
  $sql = "UPDATE candidature SET priorité = ". $count . " WHERE idsujet = " . $idval;
  if ($link->query($sql) === TRUE) {
  echo "Record updated successfully".$idval;
 } else {
  echo "Error updating record: " . $link->error;
 }
  $count= $count+1;; 
 }






 echo 'All saved! refresh the page to see the changes';
}
?>