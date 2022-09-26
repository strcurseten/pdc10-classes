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
            height: 450px;
            width: 320px;
        }
        .card:hover{
            transform: scale(1.02);
            background-color: #6159E6;
            color: white;
        }
        .card-title {
            padding: 30px 30px;
            color: #332D9D;
        }

        img {

        }
        a {
            text-decoration: none;
        }

    </style>

    <body>
        <div class="container-fluid m-5">
            <h1><b>DASHBOARD</b></h1>
                <div class="row mt-4">
                    
                    <div class="col-md-3">
                        <a href="student/index.php">
                            <div class="card">
                                    <h2 class="card-title">Students</h2>
                                    <img src="student.png" class="card-img-top" style="width:auto; height:300px;">
                            </div> 
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="teacher/index.php">
                            <div class="card">
                                    <h2 class="card-title">Teachers</h2>
                                    <img src="teacher.png" class="card-img-top" style="width:auto; height:300px;">
                            </div> 
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="course/index.php">
                            <div class="card">
                                    <h2 class="card-title">Courses</h2>
                                    <img src="course.png" class="card-img-top" style="width:auto; height:300px;">
            
                            </div> 
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="">
                            <div class="card">
                                    <h2 class="card-title">Rosters</h2>
                                    <img src="roster.png" class="card-img-top" style="width:auto; height:300px;">
                        
                            </div> 
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>