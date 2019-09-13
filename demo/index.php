<?php

    /*
        Create page content by rendering a template.
    */

    $site_title = 'UNC BACS 350';
    
    $page_title = "Mark's Brain";
    
    $content = '
        <p>
            <a href="..">Home</a>
        </p>
        <p> 
            This page is the beginning of an ongoing project in BACS 350.
        </p>
        <p> 
            It is a custom information manager.
        </p>
        <p> 
            Different rooms within this PHP app will contain different types of info.
        </p>
        
        <ul>
            <li>
                <a href="01">Lesson #1 - PHP App Hosting</a>
            </li>
            <li>
                <a href="02">Lesson #2 - Includes</a>
            </li>
            <li>
                <a href="03">Lesson #3 - Header/Footer</a>
            </li>
            <li>
                <a href="04">Lesson #4 - Page Template</a>
            </li>
            <li>
                <a href="05">Lesson #5 - Render Page</a>
            </li>
            <li>
                <a href="06">Lesson #6 - Setup Apache, MySQL, PHP</a>
            </li>
            <li>
                <a href="07">Lesson #7 - Card View</a>
            </li>
        </ul>
    ';

    include '../views.php';
    
    echo render_page($site_title, $page_title, $content);

?>
