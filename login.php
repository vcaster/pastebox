<?php session_start(); ?>
<html>
<head>
 <title>Paste Box</title>
 <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<!-- Template from https://codepen.io/vtboren/pen/ngpzmV -->
<div class="container">
  <section id="content">
    <form method="post" action="login.php">
      <h1>Login into Paste Box</h1>
      <div>
        <input type="text" placeholder="Username" id="username" name="username"/>
      </div>
      <div>
        <input type="password" placeholder="Password" id="password" name="password"/>
      </div>
      <div>
        <input type="submit" value="Log in" name="login"/>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
 <?php
          if(isset($_POST['login'])) {
             $conn = mysqli_connect("127.0.0.1", "root", "Password", "pastebox", 13306) or die("Database Errors" . mysqli_error($conn));
             $username = isset($_POST['username']) ? $_POST['username'] : "empty";
             $password =  isset($_POST['password']) ? $_POST['password'] : "empty";

     
                $hashed_password = sha1($_POST['password']);
                $sql = "select * from `userlist` where username='$username' and password='$hashed_password'";
                $result = mysqli_query($conn,$sql);

                $row = mysqli_fetch_array($result);
                
                  // echo("ss".$password);
                   //echo($row["password"]);

                if(mysqli_num_rows($result) > 0){
                      $_SESSION['session_id'] = $row["id"];
                      $_SESSION['session_username'] = $row["username"];
                      $_SESSION['session_description'] = $row["description"];
                      $_SESSION['session_secret'] = $row["secret"];
                      

                      header('Location: home.php');
                }
                else{
                   echo "<center> Wrong password </center>";
                }
                mysqli_close($conn);
                  }
               ?>
</div><!-- container -->
</body>
</html>
