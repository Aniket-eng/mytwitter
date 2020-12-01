<?php 
session_start();
require_once('dbconnect.php');

if(!isset($_GET['id'])) {
    exit;
}

$user_id = $_GET['id'];
$follower_id = $_SESSION['user'];

$db->follow_list->insertOne( array(
                'followers' => new MongoDB\BSON\ObjectID("$user_id"),
                'isfollowing' => new MongoDB\BSON\ObjectID("$follower_id")

));

header("Location: userlist.php");
?>