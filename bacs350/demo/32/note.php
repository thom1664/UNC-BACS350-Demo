<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';
    require_once 'views.php';


    /* ---------------------------
             M O D E L
     --------------------------- */

    // Add a new record
    function add_note($db, $title, $body, $date) {
        // Pick out the inputs
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $date = filter_input(INPUT_POST, 'date');

        if (!empty($title) && !empty($body) && !empty($date)) {

            try {
                $query = "INSERT INTO notes (title, body, date) VALUES (:title, :body, :date);";
                $statement = $db->prepare($query);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':body', $body);
                $statement->bindValue(':date', $date);
                $statement->execute();
                $statement->closeCursor();

                log_event('Note CREATE');
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Lookup Record using ID
    function get_note($db, $id) {
        try {
            $query = "SELECT * FROM notes WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $record = $statement->fetch();
            $statement->closeCursor();

            log_event('Note READ');                       // READ
            return $record;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Query for all notes
    function list_notes ($db) {
       try {
            $query = "SELECT * FROM notes";
            $statement = $db->prepare($query);
            $statement->execute();

            log_event('Note READ');                       // READ
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }


    // Delete Database Record
    function delete_note($db) {
        $id = filter_input(INPUT_GET, 'id');
        if (!empty($id)) {
            try {
                $query = "DELETE from notes WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();

                log_event('Note DELETE');                     // DELETE
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Update the database
    function update_note ($db) {

        // Pick out the inputs
        $id = filter_input(INPUT_POST, 'id');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $date = filter_input(INPUT_POST, 'date');

        if (!empty($id) && !empty($title) && !empty($body) && !empty($date)) {

            try {
                // Modify database row
                $query = "UPDATE notes SET title=:title, body=:body, date=:date WHERE id = :id";
                $statement = $db->prepare($query);

                $statement->bindValue(':id', $id);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':body', $body);
                $statement->bindValue(':date', $date);

                $statement->execute();
                $statement->closeCursor();

                log_event('Note UPDATE');                     // UPDATE
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    /* ---------------------------
                V I E W
     --------------------------- */

    // Create an HTML list on the output
    function note_list_view($notes) {
        $html = '';
        foreach($notes as $row) {

//            $title = $row['title'];
//
//            $delete_href = "index.php?id=$row[id]&action=delete";
//            $delete_button = render_button('Delete', $delete_href)
//
//            $edit_href = "index.php?id=$row[id]&action=edit";
//            $edit_button = render_button('Edit', $edit_href)
//
//            $body = "
//                <p>Note #$row[id]. $title</p>
//                <p>$row[body]</p>
//                <p>$edit_button $delete_button</p>";
//            $html .= render_card($title, $body);

            $html .= render_template('note.html', $row);
        }
        return $html;
    }


    // add_note_form -- Create an HTML form to add record.
    function add_note_view() {
        log_event('Note Add View');                   // Add View
        return render_template('add.html', array());

//        $title = 'Add Note';
//        $body = '
//            <form action="index.php" method="post">
//                <table class="table table-hover">
//                    <tr>
//                        <td><label>Date:</label></td>
//                        <td><input type="date" name="date"></td>
//                    </tr>
//                    <tr>
//                        <td><label>Title:</label></td>
//                        <td><input type="text" name="title"></td>
//                    </tr>
//                    <tr>
//                        <td><label>Body:</label></td>
//                        <td><textarea name="body" placeholder="Type text here"></textarea></td>
//                    </tr>
//                    <tr>
//                        <td><button class="button">Save Record</button></td>
//                    </tr>
//                </table>
//                <input type="hidden" name="action" value="create">
//
//            </form>
//            ';
//        return render_card($title, $body);
    }


    // Show form for adding a record
    function edit_note_view($record) {
        log_event('Note Edit View');                  // Edit View
        return render_template('edit.html', $record);


//        $id = $record['id'];
// $date = $record['date'];
// $title = $record['title'];
// $body = $record['body'];
// $card_title = "Edit Note";
// $card_body = '
// <form action="index.php" method="post">
    // <table class="table table-hover">
        // <tr>
            // <td><label>Date:</label></td>
            // <td><input type="date" name="date" value="' . $date . '"></td>
            // </tr>
        // <tr>
            // <td><label>Title:</label></td>
            // <td><input type="text" name="title" value="' . $title . '"></td>
            // </tr>
        // <tr>
            // <td><label>Body:</label></td>
            // <td><textarea name="body">' . $body . '</textarea></td>
            // </tr>
        // <tr>
            // <td><button class="button">Save Record</button></td>
            // </tr>
        // </table>
    // <input type="hidden" name="id" value="' . $id . '">
    // <input type="hidden" name="action" value="update">
    //
    // </form>
// ';
// return render_card($card_title, $card_body);
    }



    /* ---------------------------
         C O N T R O L L E R
     --------------------------- */

    // Handle all action verbs
    function handle_actions() {
        $id = filter_input(INPUT_GET, 'id');
        global $db;

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {
            if (add_note($db)) {
                header('Location: index.php');
            }
        }
        if ($action == 'update') {
            if (update_note($db)) {
                header('Location: index.php');
            }
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {
            $list = list_notes($db);
            return note_list_view($list);
        }
        if ($action == 'delete') {
            delete_note($db);
            header('Location: index.php');
        }
        if ($action == 'add') {
            return add_note_view();
        }
        if ($action == 'edit' and ! empty($id)) {
            $record = get_note($db, $id);
            return edit_note_view($record);
        }
    }


?>
