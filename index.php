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

require('classes/plan.php');

session_start();
//print_r($_SESSION);
//fat free framework

$f3 = Base::instance();

// turn on fet-free error reporting
$f3->set('DEBUG', 3);

require_once('model/validation-functions.php');
$f3->route('GET|POST /', function ($f3) {
    $_SESSION = array();

    if (isset($_POST['plan'])&&isset($_POST['submit'])) {
        $planNumber = $_POST['plan'];
        if (validPlan($planNumber)) {
            $_SESSION['planNumber'] = $planNumber;
//            $plan = new plan($planNumber);

            $_SESSION['CPU']=getCPU($planNumber);
        }
        else {
            $f3->set("error['plan']", "Plan doesn't exist.");
        }
    }


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

    if (($_POST['CPU']=="Yes")&&isset($_POST['submit'])) {
        $CPU = $_POST['CPU'];
        $_SESSION['CPU'] = $CPU;
    }



    if (isset($_POST['submit']))
        $f3->reroute('/GPU');
    $template = new Template();
    echo $template->render('views/CPU.html');
});

$f3->route('GET|POST /GPU', function ($f3) {

    if (($_POST['GPU']=="Yes")&&isset($_POST['submit'])) {
        $GPU = $_POST['GPU'];
        $_SESSION['GPU'] = $GPU;
    }


    if (isset($_POST['submit']))
        $f3->reroute('/Plan');
    $template = new Template();
    echo $template->render('views/GPU.html');
});

$f3->route('GET|POST /Plan', function ($f3) {

    echo $_SESSION['CPU'];
    echo $_SESSION['CPUchoice'];



    if (isset($_POST['save'])) {

        $_SESSION['CPU'] = $_POST['CPU'];
        $_SESSION['GPU'] = $_POST['GPU'];
        $_SESSION['Motherboard'] = $_POST['Motherboard'];
        $_SESSION['RAM'] = $_POST['RAM'];
        $_SESSION['SSD'] = $_POST['SSD'];
        $_SESSION['HD'] = $_POST['HD'];

        $f3->reroute('/Save');
    }
    $template = new Template();
    echo $template->render('views/Plan.html');
});

$f3->route('GET|POST /Save', function ($f3) {
    if (isset($_POST['return']))
        $f3->reroute('/Plan');
    $template = new Template();
    echo $template->render('views/Save.html');
});

$f3->route('GET /hardware', function($f3)
{
    global $dbh;

    $dbh = new Database();

    $hardware = $dbh->getAllHardware();
    $f3->set('hardware', $hardware);

    $template = new Template();
    echo $template->render('views/hardwareList.html');
});

$f3->route('GET /cpuList', function($f3)
{
    global $dbh;

    $dbh = new Database();

    $CPUchoice = $_POST['CPUchoice'];
    $_SESSION['CPUchoice'] = $CPUchoice;


    $hardware = $dbh->getHardware("cpu");
    $f3->set('hardware', $hardware);

    $template = new Template();
    echo $template->render('views/allCPU.php');
});

$f3->route('GET /gpuList', function($f3)
{
    global $dbh;

    $dbh = new Database();

    $hardware = $dbh->getHardware("gpu");
    $f3->set('hardware', $hardware);

    $template = new Template();
    echo $template->render('views/allGPU.php');
});

//run fat free
$f3->run();