<?php

    // Setup a page title variable
    $page_title = "Project #7 - To Do List";

    // Include the page start
    include '/bacs_350/header.php';

    // Include the main page content
    echo 
        '<h1>BACS 350 - Project #7</h1>
        <h2>Project Description</h2>
        <p>Build an application that manages a list of subscribers.</p>
        <p>User Views:</p>
        <ul>
            <li>subscribers - shows a list with add button</li>
            <li>add - shows a form with name and email fields</li>
        </ul>
        ';

    echo 
        '<h2>Project Features - Done</h2>
        
        <pre></pre>';


    echo 
        '<h2>Project Features - To Build</h2>

        <pre>

        Local repository
        * Use Github Desktop to clone your BACS_350 repo
        * File, Clone repository...

        Pull fresh code
        * Using the Github website pull from Mark-Seaman BACS 350 repo
        * Confirm code on Github
        * Use Github Desktop to pull code to local computer
        * Confirm you have project/08 on your local computer

        Setup Workflow
        * Github Desktop (connect to BACS 350)
        * FileZilla (connect to Bluehost)
        * Windows Explorer (desktop shortcut)
        * Chrome (local and remote bookmarks)
        * Brackets (source code)

        Simple page
        * Use the simple.php page template to create project/08/index.php
        * Deploy and test
        * Add stylesheet, and images last (see what happens)

        Stylish page
        * User the header and footer templates to create a better page
        * Deploy and test

        Validate HTML
        * Use the HTML validator to make sure that we have good HTML

        Connect to Database
        * Use db.php template to create a database connection
        * Place code directly into index.php
        * Deploy & test & validate

        Refactor Connection
        * Move DB connection into db.php
        * Deploy & test & validate

        Show subscribers
        * Use select.php template to list the subscribers
        * Deploy & test & validate
        * Refactor into select.php
        * Deploy & test & validate

        Create add view
        * Use insert.php template to create add.php
        * Add link to add.php on index.php
        * Deploy & test & validate

        Build form for input
        * Use add_form.php template to create add_form.php
        * Set action to add.php
        * Link to add_form.php from index.php
        * Deploy & test & validate

        Extract data from POST
        * Modify add.php to use input from POST operation
        * Deploy & test & validate

        Automatically show subscribers
        * When add is successful go the index.php page
        * Deploy & test & validate

        Commit all changes
        * Use Github Desktop to commit your changes
        * Push to your remote repo

        Submit your URL in Canvas
        * Post project/08/index.php

    </pre>';

    // Include the page end
    include '/bacs_350/footer.php';

 ?>
