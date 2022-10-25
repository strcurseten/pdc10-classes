<?php 

require (dirname(dirname(__FILE__)) . '/init.php');
use App\Course;

if (isset($_POST['submit_info'])) {

    try{

        $course = new Course($_POST['name'], $_POST['code'], $_POST['description'], $_POST['teacher_id']);
        $course->setConnection($connection);
        $course->save(); 
        header("Location: index.php");
        exit();

    } catch (Exception $e) {
        error_log($e->getMessage());
    }

}

?>