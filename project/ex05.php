<?php
$text = file_get_contents('README.txt');
$text = htmlspecialchars($text);
echo '<h1>Display Text File</h1>';
echo '<p>' . $text . '</p>';
 ?>