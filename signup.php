<?php

    $success=0;
    $user=0;

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        include 'connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        // $sql = "insert into `registration`(username,password) values('$username','$password')";

        // $result=mysqli_query($con,$sql);

        // if($result)
        // {
        //     echo "Data inserted successfully";
        // }
        // else
        // {
        //     die(mysqli_error($con));
        // }

        $sql = "select * from `registration` where username='$username'";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            $num=mysqli_num_rows($result);
            if($num>0)
            {
                // echo "User already exits";
                $user=1;
            }
            else
            {
                $sql = "insert into `registration`(username,password) values('$username','$password')";

                $result=mysqli_query($con,$sql);

                if($result)
                {
                    // echo "Signup successfully";
                    $success=1;
                    header('location:login.php');
                }
                else
                {
                    die(mysqli_error($con));
                }
            }
        }

    }
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <?php
    if($user)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry!!</strong> User Already Exits 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>


<?php
    if($success)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats!!</strong> Signup Successfull. You Are Ready To Go......
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>



    <div class="container mt-5">
    <form action="signup.php" method="post">
        <h1 class="text-center">Signup Page</h1>
  <div class="mb-3" >
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name" name="username" title="Enter your username">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password" title="Enter your password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Signup</button>
</form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>