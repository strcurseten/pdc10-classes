<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Teacher;

?>

<html>
    <title></title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body>
        <div class="container">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="text" class="form-control" name="employee_id">
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phoneNumber">
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

    $teacher = new Teacher($_POST['name'], $_POST['phoneNumber'], $_POST['email'], $_POST['employee_id']);
    $teacher->setConnection($connection);
    $teacher->save(); 
    header("Location: index.php");
    exit();

}


?>