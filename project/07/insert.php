<?php

    // Connect to the database
    require_once 'db.php';


    // Add new record
    $name = 'Mark Seaman Gmail';
    $email = 'Mark.B.Seaman@gmail.com';


    // Add database row
    $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);

    $statement->execute();
    $statement->closeCursor();

?>
