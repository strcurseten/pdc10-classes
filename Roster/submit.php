<?php 
require (dirname(dirname(__FILE__)) . '/init.php');
use App\ClassRoster;

if (isset($_POST['submit_info'])) {

    try{

        $roster = new ClassRoster($_POST['class_code'], $_POST['student_id']);
        $roster->setConnection($connection);
        $roster->save(); 
        //header("Location: " . "view.php?" . "id=". $_GET['id'] );
        header("Location: index.php" );
        exit();

    } catch (Exception $e) {
        error_log($e->getMessage());
    }

}

?>