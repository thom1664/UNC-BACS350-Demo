<?php

    // Bring in key functions
    require 'views.php';
    require 'files.php';


    // ------------------------------------------
    // FILES

    // Show the directories in "bacs350/docman/docs"
    $path = 'docs';
    

    // Get the files in the "bacs350/docman/docs" and create HTML list
    $files = get_file_list($path);
    $file_list = render_links($files);
   

    // ------------------------------------------
    // PAGE

    // Page Intro
    $text = render_markdown('Docs.md');


    // Make Panel
    $panel = '<div class="panel">' . $text . $file_list . '</div>';


    // Display the HTML in the page
    echo render_page('Seaman Notes', "Document Manager", $panel);

?>
