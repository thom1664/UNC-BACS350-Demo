<?php

    // Form the DB Connection string
    $port = '3306';
    $dbname = 'uncobacs_subscribers';
    $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
    $username = 'uncobacs_350';
    $password = 'BACS_350';

    echo "<h1>DB Connection</h1>" .
        "<p>Connect String:  $db_connect, $username, $password</p>";


    // Open the database or die
    try {
        $db = new PDO($db_connect, $username, $password);
        echo '<p><b>Successful Connection</b></p>';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
    }


    // Query for all subscribers
    $query = "SELECT * FROM subscribers";

    $statement = $db->prepare($query);
    $statement->execute();


    // Loop over all of the subscribers to make a bullet list
    $subscribers = $statement->fetchAll();
    echo '<ul>';
    foreach ($subscribers as $s) {
        echo '<li>' . $s['name'] . ', ' . $s['email'] . '</li>';
    }
    echo '</ul>';
?>
