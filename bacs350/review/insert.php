<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'review_views.php';
    require_once 'review_db.php';


    // Pick out the inputs fields: designer, url, report, score, date
    $designer = filter_input(INPUT_GET, 'designer');
    $url = filter_input(INPUT_GET, 'url');
    $report = filter_input(INPUT_GET, 'report');
    $score = filter_input(INPUT_GET, 'score');
    $date = filter_input(INPUT_GET, 'date');


    // Show form when vars not set
    if ($designer == '' || $url == '' || $report == '' || $score == '' || $date == '') {
        
        // Form view to add notes
        $title = '<h2>Add New Design Review</h2>';
        $add_form = add_review_form();

        // Set page content
        $content = "$title $add_form";

        // Create main part of page content
        $settings = array(
            "site_title" => "UNC BACS 350",
            "page_title" => "Design Review App", 
            "logo"       => "Bear.png",
            "style"      => 'style.css',
            "content"    => $content);

        echo render_page($settings);

    }
    else {
        
        // Add record and return to list
        if (add_review ($db, $designer, $url, $report, $score, $date))
        {
            header("Location: index.php");
        };
    }
 
?>
