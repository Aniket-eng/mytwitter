<?php
   session_start();
   require_once('dbconnect.php');

   if(isset($_SESSION['user'])) {
       header('Location: home.php');
       
   }
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['Email'];
        $result = $db->users->insertOne(array('username'=>$username, 'password'=>$password, 'first_name'=>$fname, 'last_name'=>$lname, 'Email'=>$email));
        header('Location: index.php');
        }
   
?>




<html>
<head>
    <title> Twitter clone</title>
    <link rel="stylesheet" href="styreg.css">
    </head>
    <body>
    <form class="box" action="register.php" method="post">
        <img src="twr.png" >
        <h1>Create Account</h1>
        <label for="first_name"> </label><input type="text" name="first_name" required placeholder="First Name" autocomplete="off">
        <label for="last_name"> </label><input type="text" name="last_name" required placeholder="Last Name" autocomplete="off">
        <label for="username"> </label><input type="text" name="username" required placeholder="Username" autocomplete="off">
        <label for="password"> </label><input type="password" name="password" required placeholder="Password">
        <label for="Email"> </label><input type="email" name="Email" required placeholder="E-mail" autocomplete="off">
        <input type="submit" value="Register">
    
    </form>
    </body>
    
</html>
