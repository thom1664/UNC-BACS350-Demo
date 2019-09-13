<?php

    /*
        Superhero Project Workshop
    */

    // Get the render_page and render_card functions
    include 'views.php';


    // Set custom settings
    $site_title = 'UNC BACS 350';
    $page_title = 'Superhero Gallery';

    $card1 = render_card("Captain America", "Classic America hero archtype");
    $card2 = render_card("Iron Man", "Billionaire Entrpreneur");

    $content =  '
        <div class="container-fluid">
            <div class="row">
                ' . $card1 . $card2 . '
            </div>
        </div>
    ';


    // Create HTML and output the page
    echo render_page($site_title, $page_title, $content);

?>
