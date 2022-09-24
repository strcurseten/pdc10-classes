<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Teacher;
$teacher = new Teacher('');
$teacher->setConnection($connection);
$allTeachers = $teacher->getAll();

?>

<html>
    <title></title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body>
        <h1>TEACHERS</h1>
        <div class="container">
            <a href="add.php" class="btn btn-primary">Add Teacher</a>
            <a href="" class="btn btn-primary">View Classes</a>
            <a href="edit.php" class="btn btn-primary">Update</a>
            <a href="delete.php" class="btn btn-primary">Remove</a>
        </div>
        <div class="container">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                        foreach ($allTeachers as $teacher){

                ?>
                    <tr>
                        <th scope="row"><?php echo $teacher['id'] ?></th>
                        <td><?php echo $teacher['employeeID'] ?></td>
                        <td><?php echo $teacher['name'] ?></td>
                        <td><?php echo $teacher['email'] ?></td>
                        <td><?php echo $teacher['phoneNumber'] ?></td>
                    </tr>
                <?php 
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>