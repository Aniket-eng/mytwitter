<?php
   session_start();
   require_once('dbconnect.php');

   if(!isset($_SESSION['user'])) {
       header('Location: index.php');  
   }

  
   $userdata = $db->users->findOne(array('_id'=> $_SESSION['user']));
   $name = array();
   $name= $db->users->find(array('first_name'=> $_SESSION['user']));

    function get_recent_tweets($db) {
        $result = $db->follow_list->find( array( 'isfollowing' => $_SESSION['user']));
        $result = iterator_to_array($result);
        $users_following = array();
        
        foreach ($result as $entry) {
            $users_following[] = $entry['followers'];
        }
        $result = $db ->tweets-> find(array('UID' => array('$in' => $users_following)));
        $recent_tweets = iterator_to_array($result);
        return $recent_tweets;
        }
    
?>
        

<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Twitter clone</title>
     <link rel="stylesheet" href="stylhome.css">
    </head>
    <body a link="white" vlink="white">
        <img src="twr.png" height="80"><br>
        
        <?php include('header.php'); ?>
        <?php include('userlist.php'); ?>
            <div class="containerhome">
                <form class="txt" method="post" action="create_tweet.php">
            
                    <label style="font-size= 20px;" for="tweet">Whats Happening? </label><br>
                    <textarea name="body" rows="4" cols="50"></textarea><br><br>
                    <input type="submit" value="Tweet">

                </form>
                <p><b>Tweets of Following Users</b></p>
                <?php 
                   
                    $recent_tweets = get_recent_tweets($db);
                   
                        foreach ($recent_tweets as $tweet) {
                    
                    echo '<p><a href="profile.php?id=' . $tweet['UID'] . '">@' . $tweet['authorName'] . '</a></p>';
                    echo '<p>' . $tweet['body'] . '</p>';
                    echo '<p>' . $tweet['created'] . '</p>';
                    echo '<hr>';
                    
            }
                ?>
            
            </div>
        
    </body>
    
</html>
