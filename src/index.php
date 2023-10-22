<?php

include('RateInterface.php');
include('Rate.php');
include('BasicRate.php');
include('HourlyRate.php');
include('StudentRate.php');

$sum = 0;
switch ($_POST['rate'])
{
    case 'basic':
        $rate = new \src\BasicRate((int) $_POST['distance'], (int) $_POST['time'], $_POST['gps'], $_POST['driver']);
        break;
    case 'hourly':
        $rate = new \src\HourlyRate((int) $_POST['distance'], (int) $_POST['time'], $_POST['gps'], $_POST['driver']);
        break;
    case 'student':
        $rate = new \src\StudentRate((int) $_POST['distance'], (int) $_POST['time'], $_POST['gps'], $_POST['driver']);
        break;
}

header('Content-type: application-json');
echo json_encode($rate->calcCost());
exit(0);