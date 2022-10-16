<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Teacher;

$id = $_GET['id'];
$getClasses = new Teacher('');
$getClasses->setConnection($connection);
$classes = $getClasses->viewClasses($id);

$teacherName = new Teacher('');
$teacherName->setConnection($connection);
$teacher = $teacherName->getById($id);

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
        <h1><?php echo $teacher['name'] ?> Class List</h1>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                        foreach ($classes as $data){
                            // $student_id = $data['student_id'];
                            // $viewStudents = new ClassRoster('');
                            // $viewStudents->setConnection($connection);
                            // $students = $viewStudents->getStudentInfo($student_id);

                ?>
                    <tr>
                        <th scope="row"><?php echo $data['id'] ?></th>
                        <td><?php echo $data['code'] ?></td>
                        <td><?php echo $data['name'] ?></td>
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