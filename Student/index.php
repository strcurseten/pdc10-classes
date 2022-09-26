<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Student;
$student = new Student('');
$student->setConnection($connection);
$students = $student->getAll();

?>

<html>
    <title></title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body>
        <h1>STUDENTS</h1>
        <div class="container">
            <a href="add.php" class="btn btn-primary">Add Student</a>

        </div>
        <div class="container">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Program</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                        foreach ($students as $student){

                ?>
                    <tr>
                        <th scope="row"><?php echo $student['id'] ?></th>
                        <td><?php echo $student['name'] ?></td>
                        <td><?php echo $student['studentID'] ?></td>
                        <td><?php echo $student['phoneNumber'] ?></td>
                        <td><?php echo $student['email'] ?></td>
                        <td><?php echo $student['program'] ?></td>
                        <td><a href="edit.php?id=<?php echo $student['id']; ?>" class="btn btn-primary" name="edit">Update</a></td>
                        <td><a href="delete.php?id=<?php echo $student['id']; ?>" class="btn btn-primary" name="delete">Remove</a></td>
                    </tr>
                <?php 
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>