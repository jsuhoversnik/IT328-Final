<?php
/**
 * Created by PhpStorm.
 * User: Jake, Wu
 * Date: 1/11/2019
 * Time: 10:24 AM
 */

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload
require_once('vendor/autoload.php');

session_start();
//print_r($_SESSION);
//fat free framework

$f3 = Base::instance();

// turn on fet-free error reporting
$f3->set('DEBUG', 3);


$f3->route('GET|POST /', function ($f3) {
    if (isset($_POST['submit'])){
        if($_POST['plan']!=""){
            $f3->reroute('/Plan');
        }
        else{
            $f3->reroute('/CPU');
        }

    }

    $template = new Template();
    echo $template->render('views/home.html');
});

$f3->route('GET|POST /CPU', function ($f3) {
    if (isset($_POST['submit']))
        $f3->reroute('/GPU');
    $template = new Template();
    echo $template->render('views/CPU.html');
});

$f3->route('GET|POST /GPU', function ($f3) {
    if (isset($_POST['submit']))
        $f3->reroute('/Plan');
    $template = new Template();
    echo $template->render('views/GPU.html');
});

$f3->route('GET|POST /Plan', function ($f3) {
    if (isset($_POST['save']))
        $f3->reroute('/Save');
    $template = new Template();
    echo $template->render('views/Plan.html');
});

$f3->route('GET|POST /Save', function ($f3) {
    if (isset($_POST['return']))
        $f3->reroute('/Plan');
    $template = new Template();
    echo $template->render('views/Save.html');
});


//run fat free
$f3->run();