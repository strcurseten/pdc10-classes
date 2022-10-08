<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Course;

?>

<html>
    <title></title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body>
        <div class="container">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Class Code</label>
                    <input type="text" class="form-control" name="classCode">
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teacher ID</label>
                    <input type="text" class="form-control" name="teacherID">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit_info">
                </div>
            </form>
        </div>
    </body>
</html>

<?php 

if (isset($_POST['submit_info'])) {

    try{

        $course = new Course($_POST['name'], $_POST['classCode'], $_POST['description'], $_POST['teacherID']);
        $course->setConnection($connection);
        $course->save(); 
        header("Location: index.php");
        exit();

    } catch (Exception $e) {
        error_log($e->getMessage());
    }

}

?>