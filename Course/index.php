<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Course;
$course = new Course('');
$course->setConnection($connection);
$courses = $course->getAll();

?>

<html>
    <title></title>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }

        h1 {
            font-weight: bold;
        }
        a {
            margin-right: 5px;
        }
    </style>
    <body>
        <div class="container-fluid m-5">
        <h1>CLASSES</h1>
        <div class="container">
            <a href="add.php" class="btn btn-primary">Add Class</a>
        </div>
        <div class="container">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Class Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Teacher ID</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                        foreach ($courses as $course){

                ?>
                    <tr>
                        <th scope="row"><?php echo $course['id'] ?></th>
                        <td><?php echo $course['classCode'] ?></td>
                        <td><?php echo $course['name'] ?></td>
                        <td><?php echo $course['description'] ?></td>
                        <td><?php echo $course['teacherID'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $course['id']; ?>" class="btn btn-primary" name="edit">Update</a>
                            <a href="delete.php?id=<?php echo $course['id']; ?>" class="btn btn-primary" name="delete">Remove</a>
                        </td>

                    </tr>
                <?php 
                }
                ?>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>