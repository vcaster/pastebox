<?php 
if(!empty($_SESSION['session_username'])){
header('Location: homepage.php');
}
else {
header('Location: login.php');
}
?>
