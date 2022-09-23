<?php

include "vendor/autoload.php";
include "config/database.php";

use App\Connection;
use App\Classes;
use App\Teacher;
use App\Student;
use App\ClassRoster;

$connObj = new Connection($host, $database, $user, $password);
$connection = $connObj->connect();