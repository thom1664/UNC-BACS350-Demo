<?php

    require_once 'db.php';
    require_once 'log.php';
    require_once 'note.php';
    require_once 'views.php';


    // Log the page load
    log_page($db);


    // Display the page content
    $content .= render_button('Other Demos', '..');
    $content .= render_button('Show Log', 'pagelog.php');
    $content .= render_button('Add Note', 'index.php?action=add');
    $content .= handle_actions();


    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350 Demo",
        "page_title" => "Demo 32 - MVC Design Pattern",
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
