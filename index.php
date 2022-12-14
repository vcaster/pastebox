<?php 
if(!empty($_SESSION['session_username'])){
header('Location: home.php');
}
else {
header('Location: login.php');
}
?>
