<?php
    require_once ("vendor/autoload.php");

    $f3 = Base::instance();

    //set debug level
    //0 = no error reporting, 3 = report all errors
    $f3->set('DEBUG', 3);

    $f3->route('GET /', function (){
        echo '<h1>Routing Demo</h1>';
    });

    $f3->route('GET /page1', function (){
        echo '<h1>This is page1</h1>';
    });

    $f3->route('GET /page1/subpage-a', function (){
        echo '<h1>This is page1, subapage-a</h1>';
    });

    $f3->run();
?>