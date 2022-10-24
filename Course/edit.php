<?php
require (dirname(dirname(__FILE__)) . '/init.php');
use App\Course;
use App\Teacher;

$id = $_GET['id'];
$course = new Course('');
$course->setConnection($connection);
$courseInfo = $course->getById($id);

$teachers = new Teacher('');
$teachers->setConnection($connection);
$teacher = $teachers->getAll();

?>

<html>
    <title>Edit Course</title>
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
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active"><a href="../dashboard.php" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="../student/index.php" class="nav-link">Students</a></li>
                        <li class="nav-item"><a href="../teacher/index.php" class="nav-link">Teachers</a></li>
                        <li class="nav-item"><a href="index.php" class="nav-link">Courses</a></li>
                        <li class="nav-item"><a href="../roster/index.php" class="nav-link">Rosters</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Class Code</label>
                    <input type="text" class="form-control" name="code" value="<?php echo $courseInfo['code'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $courseInfo['name'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $courseInfo['description'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teacher</label>
                    <select class="form-select" aria-label="Default select example" name="teacher_id">
                        <option selected>Select Teacher</option>
                        <?php foreach($teacher as $data){ ?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                        <?php } ?>
                    </select>
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

        $course->update($courseInfo['id'], $_POST['name'], $_POST['code'], $_POST['description'], $_POST['teacher_id']); 
        header("Location: index.php");
        exit();

}

?>