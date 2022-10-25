<?php 

require (dirname(dirname(__FILE__)) . '/init.php');
use App\Student;

if (isset($_POST['submit_info'])) {

    $student = new Student($_POST['name'], $_POST['student_id'], $_POST['phone_number'], $_POST['email'], $_POST['program']);
    $student->setConnection($connection);
    $student->save(); 
    header("Location: index.php");
    exit();

}

?>