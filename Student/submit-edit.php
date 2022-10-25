<?php 
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Student;

if (isset($_POST['submit_info'])) {

        $student = new Student('');
        $student->setConnection($connection);
        $student->update($_POST['id'], $_POST['name'], $_POST['student_id'], $_POST['phone_number'], $_POST['email'], $_POST['program']); 
        header("Location: index.php");
        exit();

}

?>