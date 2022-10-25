<?php

require (dirname(dirname(__FILE__)) . '/init.php');
use App\Teacher;

if (isset($_POST['submit_info'])) {

    $teacher = new Teacher($_POST['name'], $_POST['phoneNumber'], $_POST['email'], $_POST['employee_id']);
    $teacher->setConnection($connection);
    $teacher->save(); 
    header("Location: index.php");
    exit();

}

?>