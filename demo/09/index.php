<h1>Format as HTML</h1>

include "ReadMe.txt";


<h1>Read File Contents </h1>
<?php
    $text = file_get_contents ("ReadMe.txt");
?>


<h1>Read File Contents </h1>
<?php
    $text = file_get_contents ("ReadMe.txt");
    echo $text;
?>


<h1>Show PHP Source Code</h1>

<?php
    $text = file_get_contents("ReadMe.php");
    htmlspecialchars($text);
?>


<h1>Show PHP Source Code</h1>

<?php
    $text = "<h2>Bad Things Happen</h2><ul><li>Item 1</li><li>Item 2</li></ul>";
    htmlspecialchars($text);
?>