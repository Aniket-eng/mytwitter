<?php
   
   require_once('dbconnect.php');

 $userdata = $db->users->findOne(array('_id'=> $_SESSION['user']));

   if(!isset($_SESSION['user'])) {
       header('Location: index.php');  
   }
   
    function get_user_list($db){
        $result = $db->users->find();
        $users = iterator_to_array($result);
        return $users;
    }
?>



<html>
<head>
    <title> Twitter clone</title>
    <link rel="stylesheet" href="stylhome.css">
    </head>
    <body a link="white" vlink="white">
        <div class="box1">
            <p>People You May Follow</p>
            <?php 
                
               $user_list = get_user_list($db);
                foreach ($user_list as $user) {
                    if ($user['_id']==$_SESSION['user']){
                        
                        continue;
                        
                    }
                    $usern=$user['username'];
                    echo '<a href="profile.php?id=' . $user['_id'] . '">'.$usern.'</a>';
                    echo '&nbsp;[<a href="follow.php?id=' . $user['_id'] .'">Follow</a> ]';
                    echo '<hr>';
            }
                ?>
            
        </div>

    </body>
    
</html>