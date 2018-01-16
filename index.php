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

    $f3->route('GET /hello/@name', function ($f3, $params){
        $name = $params['name'];
        echo "<h1>Hello, $name</h1>";
    });

    $f3->route('GET /language/@lang', function ($f3, $params){
        switch ($params['lang']){
            case 'swahili':
                echo 'Jumbo!'; break;
            case 'spanish':
                echo 'Hola!'; break;
            case 'russian':
                echo 'Privet!'; break;
            case 'farsi':
                echo 'Salam!'; break;
            //reroute to another page
            case 'french':
                $f3->reroute('/');//home page
            default:
                $f3->error(404);//throw error
        }
    });

    $f3->route('GET /jewelry/rings/toe-rings', function (){
        $template = new Template();
        echo $template->render('views/toe-rings.html');
    });

    $f3->run();
?>