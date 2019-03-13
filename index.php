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
//fat free framework

$f3 = Base::instance();

// turn on fet-free error reporting
$f3->set('DEBUG', 3);

require_once('model/validation-functions.php');
$f3->route('GET|POST /', function ($f3) {
    $_SESSION = array();
    global $userbase;
    $userbase = new userbase();


    if (isset($_POST['plan'])&&isset($_POST['submit'])) {
        $planNumber = $_POST['plan'];
        //if (validPlan($planNumber)) {
            $_SESSION['planNumber'] = $planNumber;
//            $plan = new plan($planNumber);
            $_SESSION['CPU'] = "Yes";
            $_SESSION['CPUchoices'] = $userbase->getPart($planNumber,"cpu");

            $_SESSION['GPU'] = "Yes";
            $_SESSION['GPUchoices'] = $userbase->getPart($planNumber,"gpu");

        $_SESSION['Motherboard'] = "Yes";
        $_SESSION['Motherboardchoices'] = $userbase->getPart($planNumber,"motherboard");

        $_SESSION['RAM'] = "Yes";
        $_SESSION['RAMchoices'] = $userbase->getPart($planNumber,"ram");

        $_SESSION['SSD'] = "Yes";
        $_SESSION['SSDchoices'] = $userbase->getPart($planNumber,"ssd");

        $_SESSION['HD'] = "Yes";
        $_SESSION['HDchoices'] = $userbase->getPart($planNumber,"hdd");

        $_SESSION['Power'] = "Yes";
        $_SESSION['Powercost'] = $userbase->getPart($planNumber,"power");

        $_SESSION['Monitor'] = "Yes";
        $_SESSION['Monitorcost'] = $userbase->getPart($planNumber,"monitor");

        $_SESSION['Case'] = "Yes";
        $_SESSION['Casecost'] = $userbase->getPart($planNumber,"computerCase");

        $_SESSION['Other'] = "Yes";
        $_SESSION['Othercost'] = $userbase->getPart($planNumber,"other");

            $_SESSION['CPUchoice']=$_SESSION['CPUchoices'][0];
            $_SESSION['GPUchoice']=$_SESSION['GPUchoices'][0];
        $_SESSION['Motherboardchoice']=$_SESSION['Motherboardchoices'][0];
        $_SESSION['RAMchoice']=$_SESSION['RAMchoices'][0];
        $_SESSION['SSDchoice']=$_SESSION['SSDchoices'][0];
        $_SESSION['HDchoice']=$_SESSION['HDchoices'][0];
            //print_r($_SESSION['CPUchoice']);
       // }
        //else {
        //    $f3->set("error['plan']", "Plan doesn't exist.");
        //}
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
        //$CPU = $_POST['CPU'];
        //$_SESSION['CPU'] = $CPU;

        $CPUchoice = $_POST['CPUchoice'];
        $_SESSION['CPUchoice'] = $CPUchoice;
    }else if(($_POST['CPU']=="No")&&isset($_POST['submit']))
    {
        $_SESSION['CPU'] = "No";
    }

    $_SESSION['Motherboard'] = "No";
    $_SESSION['RAM'] = "No";
    $_SESSION['SSD'] = "No";
    $_SESSION['HD'] = "No";
    $_SESSION['Power'] = "No";
    $_SESSION['Monitor'] = "No";
    $_SESSION['Case'] = "No";
    $_SESSION['Other'] = "No";

    if (isset($_POST['submit']))
        $f3->reroute('/GPU');
    $template = new Template();
    echo $template->render('views/CPU.html');
});

$f3->route('GET|POST /GPU', function ($f3) {

    //print_r($_SESSION);
    if (($_POST['GPU']=="Yes")&&isset($_POST['submit'])) {
        //$GPU = $_POST['GPU'];
       // $_SESSION['GPU'] = $GPU;

        $GPUchoice = $_POST['GPUchoice'];
        $_SESSION['GPUchoice'] = $GPUchoice;
    }else if(($_POST['GPU']=="No")&&isset($_POST['submit']))
    {
        $_SESSION['GPU'] = "No";
    }


    if (isset($_POST['submit']))
        $f3->reroute('/Plan');
    $template = new Template();
    echo $template->render('views/GPU.html');
});

$f3->route('GET|POST /Plan', function ($f3)
{
    global $userbase;
    $userbase = new userbase();

    if(isset( $_SESSION['CPUchoice']))
    {
        $_SESSION['CPUprice'] = $userbase->getPrice($_SESSION['CPUchoice']);
    }
    if(isset( $_SESSION['Motherboardchoice']))
    {
        $_SESSION['Motherboardcost'] = $userbase->getPrice($_SESSION['Motherboardchoice']);
    }
    if(isset( $_SESSION['GPUchoice']))
    {
        $_SESSION['GPUcost'] = $userbase->getPrice($_SESSION['GPUchoice']);
    }
    if(isset( $_SESSION['RAMchoice']))
    {
        $_SESSION['RAMcost'] = $userbase->getPrice($_SESSION['RAMchoice']);
    }
    if(isset( $_SESSION['SSDchoice']))
    {
        $_SESSION['SSDcost'] = $userbase->getPrice($_SESSION['SSDchoice']);
    }
    if(isset( $_SESSION['HDchoice']))
    {
        $_SESSION['HDcost'] = $userbase->getPrice($_SESSION['HDchoice']);
    }


    $_SESSION['total']=$_SESSION['CPUprice'][0]+ $_SESSION['Motherboardcost'][0]+$_SESSION['GPUcost'][0]
                                    +$_SESSION['RAMcost'][0]+$_SESSION['SSDcost'][0]+$_SESSION['HDcost'][0]
        +$_SESSION['Powercost'][0]+$_SESSION['Monitorcost'][0]+$_SESSION['Casecost'][0]+$_SESSION['Othercost'][0];

    if (isset($_POST['Save'])) {

        $_SESSION['CPU'] = $_POST['CPU'];
        $_SESSION['GPU'] = $_POST['GPU'];
        $_SESSION['Motherboard'] = $_POST['Motherboard'];
        $_SESSION['RAM'] = $_POST['RAM'];
        $_SESSION['SSD'] = $_POST['SSD'];
        $_SESSION['HD'] = $_POST['HD'];
        $_SESSION['Power'] = $_POST['Power'];
        $_SESSION['Monitor'] = $_POST['Monitor'];
        $_SESSION['Case'] = $_POST['Case'];
        $_SESSION['Other'] = $_POST['Other'];

        $userbase->insertPlan($_SESSION['CPU'], $_SESSION['Motherboard'], $_SESSION['GPU'],
            $_SESSION['RAM'], $_SESSION['SSD'], $_SESSION['HD'], $_SESSION['Power'],
            $_SESSION['Monitor'], $_SESSION['Case'], $_SESSION['Other']);

        $_SESSION['planNumbers'] = $userbase->getPlanNumber();
        $_SESSION['planNumber']=$_SESSION['planNumbers'][0];
        $f3->reroute('/Save');
    }
    $template = new Template();
    echo $template->render('views/Plan.html');
});

$f3->route('GET|POST /Save', function ($f3) {
    print_r($_SESSION);
    if (isset($_POST['return']))
        $f3->reroute('/');
    $template = new Template();
    echo $template->render('views/Save.html');
});

//run fat free
$f3->run();