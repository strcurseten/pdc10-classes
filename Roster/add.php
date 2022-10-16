<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\ClassRoster;
use App\Course;
use App\Student;

$id = $_GET['id'];
$courses = new Course('');
$courses->setConnection($connection);
$course = $courses->getAll();

$students = new Student('');
$students->setConnection($connection);
$student = $students->getAll();


?>

<html>
    <title></title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body>
        <div class="container">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <select class="form-select" aria-label="Default select example" name="class_code">
                        <option selected>Select Course</option>
                        <?php foreach($course as $data){ ?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <select class="form-select" aria-label="Default select example" name="student_id">
                        <option selected>Select Student</option>
                        <?php foreach($student as $data){ ?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                        <?php } ?>
                    </select>
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

        $roster = new ClassRoster($_POST['class_code'], $_POST['student_id']);
        $roster->setConnection($connection);
        $roster->save(); 
        header("Location: " . "view.php?" . "id=". $_GET['id'] );
        exit();

    } catch (Exception $e) {
        error_log($e->getMessage());
    }

}

?>