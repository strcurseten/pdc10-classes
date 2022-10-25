<?php 
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Course;

if (isset($_POST['submit_info'])) {

        $course = new Course('');
        $course->setConnection($connection);
        $course->update($_POST['id'], $_POST['name'], $_POST['code'], $_POST['description'], $_POST['teacher_id']); 
        header("Location: index.php");
        exit();

}

?>