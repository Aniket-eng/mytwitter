<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
    .head{
        color: white;
        font-family: sans-serif;
        font-size: 30px;
        width: 200px;
         } 
        .h1{
            color: 1DA1F2;
            font-family: sans-serif;
            font-size: 40px;
        }
       a{
            text-decoration: none;
            font-size: 25px;
        }
      a:hover{
            color: 1DA1F2;
        }
        body{
            margin: auto;
            height: 100vh;
        }
</style>
</head>
<body a link="white" vlink="white">
   
    <span class="h1">Welcome, <?php echo $userdata['username'];  ?></span><br>
     <div class="head">
    <a href="home.php">Home</a><br>
    <a href="profile.php?id=<?php echo $_SESSION['user']; ?>">View Profile</a><br>
    <a href='logout.php'>Log out</a><br>

</div>

</body>
</html>
