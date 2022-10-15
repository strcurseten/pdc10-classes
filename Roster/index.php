<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\ClassRoster;
use App\Course;
use App\Teacher;
use App\Student;

$classRoster = new ClassRoster('');
$classRoster->setConnection($connection);
$roster = $classRoster->getRoster();

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
        table {
            background-color: #E0E4FB;
            border-radius: 10px;
            margin: 10px;
        }

        .table-hover tbody tr:hover {
            background-color: #6159E6;
            color: white;
        }

        thead{
            background-color: #6159E6;
            color: white;
        }
        
    </style>
    <body>
        <div class="container-fluid m-5">
        <h1>STUDENTS</h1>
        <div class="container">
            <a href="add.php" class="btn btn-primary">Add Student</a>

        </div>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Teacher Name</th>
                        <th scope="col">Students Enrolled</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                <?php
                        foreach ($roster as $value){

                ?>
                    <tr>
                        <!-- <th scope="row"><?php //echo $value['id'] ?></th> -->
                        <td><?php echo $value['class_code'] ?></td>
                        <td><?php echo $value['class_name'] ?></td>
                        <td><?php echo $value['teacher_name'] ?></td>
                        <td><?php echo $value['students_enrolled'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $student['id']; ?>" class="btn btn-primary" name="edit">Update</a>
                            <a href="delete.php?id=<?php echo $student['id']; ?>" class="btn btn-primary" name="delete">Remove</a>
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