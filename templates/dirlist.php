<?php

    // Setup a page title variable
    $page_title = "Template Index Listing";

    // Page Start
    include 'header.php';

    // Define directory listing
    include 'files.php';

    // Get the files in the current directory
    $path = '.';
    $files = get_file_list($path);

    echo '<h2>Files in Templates Directory</h2>';

    // List the files as links
    if (count($files) == 0) :
        echo '<p>No images uploaded.</p>';
    else:
        echo '<ul>';

        foreach($files as $filename) :
            $file_url = $path . '/' . urlencode($filename);
            echo '<li><a href="' . $file_url . '">' . $filename . '</a></li>';
        endforeach;

        echo '</ul>';
    endif;

    // Page End
    include 'footer.php';

?>
