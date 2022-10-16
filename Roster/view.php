<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\ClassRoster;
use App\Course;

$id = $_GET['id'];
$getRosters = new ClassRoster('');
$getRosters->setConnection($connection);
$rosters = $getRosters->getByClassId($id);

$getCourse = new Course('');
$getCourse->setConnection($connection);
$course = $getCourse->getById($id);

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
        <h1><?php echo $course['name'] ?></h1>
        <div class="container">
                <a href="add.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary">Enroll Student</a>
        </div>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Enrolled Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                <?php

                        foreach ($rosters as $data){
                            $student_id = $data['student_id'];
                            $viewStudents = new ClassRoster('');
                            $viewStudents->setConnection($connection);
                            $students = $viewStudents->getStudentInfo($student_id);

                ?>
                    <tr>
                        <th scope="row"><?php echo $students['student_id'] ?></th>
                        <td><?php echo $students['student_name'] ?></td>
                        <td><?php echo $students['enrolled_date'] ?></td>
                        <td>
                            <a onclick="confirmation()" class="btn btn-primary" name="delete">Remove</a>
                        </td>
                    </tr>

                    <script>
                        function confirmation(){
                            var del=confirm("Are you sure you want to delete this record?");
                            if (del==true){
                                window.location.href="delete.php?id=<?php echo $data['id'] ?>&course=<?php echo $_GET['id'] ?>";
                            }
                            return del;
                        }
                    </script>
                <?php 
                }
                ?>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>