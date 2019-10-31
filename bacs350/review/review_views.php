<?php

    require_once 'views.php';


    // add_review_form -- Create an HTML form to add record.
    // Fields: designer, url, report, score, date
    function add_review_form() {
        $title = '<h2>Add New Design Review</h2>';
        $add_form = add_review_form();
        $content = "$title $add_form";

        // Create main part of page content
        $settings = array(
            "site_title" => "UNC BACS 350",
            "page_title" => "Design Review App", 
            "logo"       => "Bear.png",
            "style"      => 'style.css',
            "content"    => $content);

        return render_page($settings);
    }


    // Create an HTML list on the output
    function render_reviews($reviews) {
        $html = '';
        foreach($reviews as $row) {
            $delete_href = "delete.php?id=$row[id]";
            $edit_href = "update.php?id=$row[id]";
            $title = "Review #$row[id]. $row[url]";
            $body = "
                <p>Date Completed: $row[date]</p>
                <p>Designer: $row[designer]</p>
                <p>Score: $row[score] of 10 requirements met</p>
                <p>Report Summary:</p>
                <pre>$row[report]</pre>
                <p>
                    <a class='button' href='$edit_href'>Edit</a>
                    <a class='button' href='$delete_href'>Delete</a>
                </p>";
            $html .= render_card($title, $body);
        }
        return $html;
    }
/*
    * id - int (primary key and autoincrement)
    * designer - string (100 chars)
    * url - string(200 chars)
    * report - text(no limit)
    * score - number(0-10)
    * date - date
*/

    // Show form for adding a record
    function edit_review_form($record) {
        $id = $record['id'];
        $designer = $record['designer'];
        $url = $record['url'];
        $report = $record['report'];
        $score = $record['score'];
        $date = $record['date'];

        $card_title = "Edit Note";
        $card_body = '
            <form action="update.php" method="get">
                <table class="table table-hover">
                    <tr>
                        <td style="width:200px"><label>Date:</label></td>
                        <td><input type="date" name="date" value="' . $date . '"></td>
                    </tr>
                    <tr>
                        <td><label>Designer:</label></td>
                        <td><input type="text" name="designer" value="' . $designer . '"></td>
                    </tr>
                    <tr>
                        <td><label>Page:</label></td>
                        <td><input type="text" name="url" value="' . $url . '"></td>
                    </tr>
                    <tr>
                        <td><label>Score:</label></td>
                        <td><input type="number" name="score" value="' . $score . '"></td>
                    </tr>
                    <tr>
                        <td><label>Report:</label></td>
                        <td><textarea name="report">' . $report . '</textarea></td>
                    </tr>
                    <tr>
                        <td><button class="button">Save Record</button></td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="' . $id . '">
            </form>
        ';
        
        return render_card($card_title, $card_body);
    }
    
?>
