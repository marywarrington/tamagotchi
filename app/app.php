<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Job.php";

    session_start();
    if (empty($_SESSION['list_of_jobs'])) {
        $_SESSION['list_of_jobs'] = array();
    }

    $app = new Silex\Applicatoin();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    //routes

    $app->get("/", function() {
        return "Home";
    });

    return $app;
?>
