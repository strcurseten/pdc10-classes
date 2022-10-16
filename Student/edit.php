<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Student;

$id = $_GET['id'];
$student = new Student('');
$student->setConnection($connection);
$studentInfo = $student->getById($id);

?>

<html>
    <title></title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body>
        <div class="container">
            <form method="POST">
                <div class="mb-3">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $studentInfo['name'] ?>">
                </div>
                    <label class="form-label">Student ID</label>
                    <input type="text" class="form-control" name="student_id" value="<?php echo $studentInfo['student_id'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="<?php echo $studentInfo['phone_number'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $studentInfo['email'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Program</label>
                    <input type="text" class="form-control" name="program" value="<?php echo $studentInfo['program'] ?>">
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

        $student->update($studentInfo['id'], $_POST['name'], $_POST['student_id'], $_POST['phone_number'], $_POST['email'], $_POST['program']); 
        header("Location: index.php");
        exit();

}

?>