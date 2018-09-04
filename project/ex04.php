<?php
    $path = getcwd();
    echo "Directory: ", $path;
    $items = scandir($path);
    echo "<p>Files of Path</p>";
    echo "<ul>";
    foreach ($items as $item ) {
        $filepath = $path . DIRECTORY_SEPARATOR . $item;
        if (is_file($filepath)) {
            echo '<li><a href="'. $item . '">' . $filepath . '</a></li>';
        }
    }
    echo "</ul>";
?>