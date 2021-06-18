<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/developer.css">
</head>
<body class="main">
     <?php include 'header.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>SEARCH CUSTOMER AND VIEW DETAIL</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","bank");

                                    if(isset($_GET['name']))
                                    {
                                        $customer = $_GET['name'];

                                        $query = "SELECT * FROM user_master WHERE Name='$customer' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <div class="form-group mb-3">
                                                    <label for="">Id</label>
                                                    <input type="text" value="<?= $row['Id']; ?>" class="form-control">
                                                <div class="form-group mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" value="<?= $row['Name']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Email</label>
                                                    <input type="text" value="<?= $row['Email']; ?>" class="form-control">
                                                </div>
                                                 <div class="form-group mb-3">
                                                    <label for="">Balance</label>
                                                    <input type="text" value="<?= $row['Balance']; ?>" class="form-control">
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>