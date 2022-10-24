<html>
    <title>Dashboard</title>
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
        .card {
            background-color: #E0E4FB;
            height: 400px;
            width: 270px;
            border-radius: 20px;
            transition: 0.1s;
            padding: 0px;
        }

        .card:hover{ 
            transform: scale(1.02);
            transition: 0.2s;
            background-color: #6159E6;
            color: white;
            box-shadow: 3px 5px 15px -7px #000000;
            
        }
        .card-title {
            padding: 30px 30px;
            color: #332D9D;
            font-weight: bold;
        }

        #parent:hover #child{
            color: white;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background-color: #6159E6;
            font-weight: bold;
        }

        .container-fluid {
            width: 1300px;
            justify: center;
        }

    </style>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="student/index.php" class="nav-link">Students</a></li>
                        <li class="nav-item"><a href="teacher/index.php" class="nav-link">Teachers</a></li>
                        <li class="nav-item"><a href="course/index.php" class="nav-link">Courses</a></li>
                        <li class="nav-item"><a href="roster/index.php" class="nav-link">Rosters</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid m-5">
            <h1><b>DASHBOARD</b></h1>
                <div class="row mt-4 g-0">
                    <div class="col-sm-3">
                        <a href="student/index.php">
                            <div class="card" id="parent">
                                    <h3 class="card-title" id="child">Students</h3>
                                    <img src="student.png" class="card-img-top" style="width:260; height:260px;">
                            </div> 
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="teacher/index.php">
                            <div class="card" id="parent">
                                    <h3 class="card-title" id="child">Teachers</h3>
                                    <img src="teacher.png" class="card-img-top" style="width:260; height:260px;">
                            </div> 
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="course/index.php">
                            <div class="card" id="parent">
                                    <h3 class="card-title" id="child">Courses</h3>
                                    <img src="course.png" class="card-img-top" style="width:260; height:260px;">
            
                            </div> 
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="roster/index.php">
                            <div class="card" id="parent">
                                    <h3 class="card-title" id="child">Rosters</h3>
                                    <img src="roster.png" class="card-img-top" style="width:260; height:260px;">
                        
                            </div> 
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>