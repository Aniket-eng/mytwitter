<?php

   session_start();
   require_once('dbconnect.php');

   if(isset($_SESSION['user'])) {
       header('Location: home.php');
       
   }
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        $result = $db->users->findOne(array('username'=>$username ,'password'=>$password));
        if(!$result)
        {
        
        
        }else{
            $_SESSION['user'] = $result->_id;
            header('Location: home.php');
        }
    }
   

?>


<html>
<head>
    <title> Twitter clone</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <form class="box" action="index.php" method="post">
               
                <img src="twr.png">
                <h1>Login</h1>
  		            <label for="username"> </label><input type="text" name="username"  placeholder="Username" autocomplete="off">
                    <label for="password"> </label><input type="password" name="password"  placeholder="Password">
                    <input type="submit" value="Login">  
                      <a href="register.php">No account? Register here.</a>  

        </form>
        
    </body>
    
</html>








