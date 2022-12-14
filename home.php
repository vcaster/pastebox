<?php
session_start(); 
if(!empty($_SESSION['session_username'])){
?>
<html>
<head>
 <title>Paste Box</title>
 <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<!-- Template from https://codepen.io/vtboren/pen/ngpzmV -->
<div class="container">
  <section id="content">
    <form method="post" action="home.php">
      <h1>Welcome <?php echo($_SESSION['session_username']); $username = $_SESSION['session_username']; ?></h1>
      <div>
      <?php 
      $conn = mysqli_connect("127.0.0.1", "root", "Password", "pastebox", 13306) or die("Database Errors" . mysqli_error($conn));
      $sql = "select * from `userlist` where username='$username'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      ?>
        <input type="text" placeholder="Username" id="username" name="username" value="<?php echo($row['username']); ?>"/>
      </div>
      <div>
        <input type="text" placeholder="Description" id="password" name="description" value="<?php echo($row['description']); ?>"/>
      </div>
      <div>
        <input type="text" placeholder="Secret"  id="password" name="secret" value="<?php echo($row['secret']); ?>"/>
      </div>
      <div>
        <input type="submit" value="Update" name="update"/>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
 <?php
          if(isset($_POST['update'])) {
             $conn = mysqli_connect("127.0.0.1", "root", "Password", "pastebox", 13306) or die("Database Errors" . mysqli_error($conn));
             $sess_id = $_SESSION['session_id'];
             $username = isset($_POST['username']) ? $_POST['username'] : "empty";
             $description =  isset($_POST['description']) ? $_POST['description'] : "empty";
             $secret =  isset($_POST['secret']) ? $_POST['secret'] : "empty";

                $sql = "update `userlist` set  username='$username', description='$description', secret='$secret' where id='$sess_id'";
                $result = mysqli_query($conn,$sql);


                if($result){
                      header('Location: home.php');
                }
                else{
                   echo "<center> Error updating record </center>";
                }
                mysqli_close($conn);
                  }
               ?>
</div><!-- container -->
</body>
</html>
<?php
}
else {
header('Location: login.php');
}
?>
