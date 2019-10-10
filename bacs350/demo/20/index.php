<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'subscriber_views.php';
    require_once 'subscriber_db.php';


    // List subscriber records
    $list = render_subscribers(list_subscribers ($db));

    
    // Button to go to other views
//    $clear_button = '<a href="delete.php">Reset Subscribers</a>';
    $add_button = '<a href="insert.php">Add Subscriber</a>';

    
    // Display the HTML in the page
    $intro = 'No intro';
    $content = "$intro $list $add_button $clear_button";

    echo render_page('UNC BACS 350', "Demo 20 - Add Subscriber View", $content);
?>
