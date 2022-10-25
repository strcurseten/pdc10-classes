<?php
include (dirname(dirname(__FILE__)) . '/vendor/autoload.php');
require (dirname(dirname(__FILE__)) . '/init.php');
use App\ClassRoster;

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader('../templates')
]);


$classRoster = new ClassRoster('');
$classRoster->setConnection($connection);
$roster = $classRoster->getRoster();

$template = $mustache->loadTemplate('rosters-index');
echo $template->render(compact('roster'));

?>

<!-- <html>
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

        .navbar {
            background-color: #6159E6;
            font-weight: bold;
        }

        .container {
            margin-top: 50px;
            width: 1100px;
        }

        #table-buttons {
            text-align: center;
        } 

        .btn {
            background-color: #6159E6;
            color: white;
            font-weight: bold;
        }
        
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active"><a href="../dashboard.php" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="../student/index.php" class="nav-link">Students</a></li>
                        <li class="nav-item"><a href="../teacher/index.php" class="nav-link">Teachers</a></li>
                        <li class="nav-item"><a href="../course/index.php" class="nav-link">Courses</a></li>
                        <li class="nav-item"><a href="index.php" class="nav-link">Rosters</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h1>Class Roster</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
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

                        //foreach ($roster as $value){
                            // $id = $value['id'];
                            // $getClassRoster = new ClassRoster('');
                            // $getClassRoster->setConnection($connection);
                            // $rosterValue = $getClassRoster->getRoster($id);

                ?>
                    <tr>
                        <td><?php //echo $value['class_code'] ?></td>
                        <td><?php //echo $value['class_name'] ?></td>
                        <td><?php //echo $value['teacher_name'] ?></td>
                        <td><?php //echo $value['students_enrolled'] ?></td>
                        <td id="table-buttons">
                            <a href="view.php?id=<?php //echo $value['class_id']; ?>" class="btn btn-primary" name="edit">View Students</a>

                        </td>
                    </tr>
                <?php 
                //}
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html> -->