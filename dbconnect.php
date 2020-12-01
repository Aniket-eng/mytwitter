<?php

    require 'vendor/autoload.php';
    
    
$client = new MongoDB\Client(
    'mongodb+srv://Admin:<mytwitterdb>@cluster0.736zt.mongodb.net/<mytwitterdb>?retryWrites=true&w=majority');

$db = $client->mytwitterdb;


?>