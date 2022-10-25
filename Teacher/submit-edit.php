<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Teacher;

if (isset($_POST['submit_info'])) {

    $teacher = new Teacher('');
    $teacher->setConnection($connection);
    $teacher->update($_POST['id'], $_POST['name'], $_POST['phone_number'], $_POST['email'], $_POST['employee_id']); 
    header("Location: index.php");
    exit();

}

?>