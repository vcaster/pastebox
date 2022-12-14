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
    <form method="post" action="safe_login.php">
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
             $conn = new mysqli("127.0.0.1", "root", "Password", "pastebox", 13306) ;
             if ($conn->connect_errno) {
		    throw new RuntimeException('mysqli connection error: ' . $mysqli->connect_error);
		}
             $input_username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : "empty";
             $input_password =  isset($_POST['password']) ? $conn->real_escape_string($_POST['password']) : "empty";

     
                $hashed_password = sha1($_POST['password']);
                $sql = $conn->prepare("select id, username, password, description, secret from userlist where username=? and password=?");
                $sql->bind_param(ss,$input_username,$hashed_password);
                $sql->execute();
                $sql->bind_result($id,$username,$password,$description,$secret);
                $sql->fetch();
                $sql->close();
                
                   //echo($hashed_password.$id.$input_username);
                   //echo($row["password"]);

                if($id){
                      $_SESSION['session_id'] = $id;
                      $_SESSION['session_username'] = $username;
                      $_SESSION['session_description'] = $description;
                      $_SESSION['session_secret'] = $secret;
                      

                      header('Location: home.php');
                }
                else{
                   echo "<center> Wrong password </center>";
                }
                  }
               ?>
</div><!-- container -->
</body>
</html>
