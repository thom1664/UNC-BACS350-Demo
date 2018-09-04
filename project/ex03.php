<?php
    $path = getcwd();
    echo "Directory: ", $path;
    $items = scandir($path);
    echo "<p>Contents of Path</p>";
    echo "<ul>";
    foreach ($items as $item ) {
        echo '<li>'.$item.'</li>';
    }
    echo "</ul>";
?>