
<?php

    // Setup a page title variable
    $page_title = "Project Listing";

    // Include the page start
    include '../header.php';

    // Define directory listing
    include '../files.php';

    // Get the files in the current directory
    $path = '.';
    $files = get_file_list($path);
?>

<h2>Directory Listing</h2>

<?php if (count($files) == 0) : ?>
    <p>No images uploaded.</p>
<?php else: ?>
    <ul>
        <?php foreach($files as $filename) :
            $file_url = $path . '/' . urlencode($filename);
        ?>
        <li>
            <a href="<?php echo $file_url; ?>"><?php echo $filename; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>



<?php include '../footer.php' ?>
