<?php

    // get_file_list
    function get_file_list($path) {
        $files = array();
        if (!is_dir($path)) { return $files; }

        $items = scandir($path);
        foreach ($items as $item) {
             $item_path = $path . DIRECTORY_SEPARATOR . $item;
             if (is_file($item_path)) {
                 $files[] = $item_path;
             }
        }
        return $files;
    }


    // get_dir_list
    function get_dir_list($path) {
        $files = array();
        if (!is_dir($path)) { return $files; }

        $items = scandir($path);
        foreach ($items as $item) {
             $item_path = $path . DIRECTORY_SEPARATOR . $item;
             if (is_dir($item_path)) {
                 $files[] = $item_path;
             }
        }
        return $files;
    }


    // render_list -- Create a bullet list in HTML
    function render_list($list) {
        $s = '<ul>';
        foreach($list as $i) {
            $s .= "<li>$i</li>";
        }
        $s .= '</ul>';
        return $s;
    }


    // Show the directories in "bacs350/demo"
    $path = '..';
    

    // Get the directories in the "bacs350/demo"
    $dirs = get_dir_list($path);


    // Create a list
    $list = render_list($dirs);
    
    
    // Create some text
    $text = '<h2>Directories in bacs350/demo</h2>
        <p>This demo shows how to list all of the demos.</p>
        <p>Directory Path = ' . $path;


    // Put the text and the directory list out
    echo $text . $list;

?>
