<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Teacher;

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader('../templates')
]);

$template = $mustache->loadTemplate('teachers-add');
echo $template->render();

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
        .container {
            margin-top: 100px;
            width: 700px;
            background-color: #E0E4FB;
            border-radius: 10px;
        }

        form {
            margin: 20px;
            padding: 30px;
        }

        .btn {
            background-color: #6159E6;
            color: white;
        }

        .navbar {
            background-color: #6159E6;
            font-weight: bold;
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active"><a href="../dashboard.php" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="../student/index.php" class="nav-link">Students</a></li>
                        <li class="nav-item"><a href="index.php" class="nav-link">Teachers</a></li>
                        <li class="nav-item"><a href="../course/index.php" class="nav-link">Courses</a></li>
                        <li class="nav-item"><a href="../roster/index.php" class="nav-link">Rosters</a></li>
                    </ul>
                </div>
            </div>
        </nav>
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
</html> -->

<?php 

// if (isset($_POST['submit_info'])) {

//     $teacher = new Teacher($_POST['name'], $_POST['phoneNumber'], $_POST['email'], $_POST['employee_id']);
//     $teacher->setConnection($connection);
//     $teacher->save(); 
//     header("Location: index.php");
//     exit();

// }


?>