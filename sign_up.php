<?php

include 'conponments/_dbconnect.php';

$error = false;
$alert = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
        $name = $_POST['name']; 
        $user = $_POST['user'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        

        $sql = "SELECT * FROM `user` WHERE `username` = '$user'";
        $result = mysqli_query($conn, $sql);
        $numrow = mysqli_num_rows($result);
        if ($numrow > 0)
        {
           $error = "Username already taken by another user. Please try again."; 
        }
        else
        {
            if ($password == $cpassword)
            {
                $hase = password_hash($password ,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user` (`name`, `username`, `password`, `date`) VALUES ('$name', '$user', '$hase', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if ($result)
                {
                    $alert = "Your account has been created successfully and you can login now.";
                }
            }
            else 
            {
                $error = "Password does not match";
            }
        }
   }     
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sign_in1.css">
    <title>Sign Up</title>
</head>

<body style="background-color: #cccccc">

    <!-- Main Content -->
    <div class="container-fluid ">
        <div class="row main-content bg-success text-center">
            <div class="col-md-12 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid p-3">
                    <div class="row">
                        <h2 class="mt-3">Sign Up</h2>
                    </div>
                    <div class="mt-3">
                        <?php
                            if ($alert)
                            {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> '.$alert.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }   
                            if ($error)
                            {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> Error!</strong> '.$error.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }   
                        ?>
                    </div>
                    <div class="row">

                        <form action="/somnathsaree/sign_up.php" method="post">
                            <div>
                                <input type="text" class="form__input" id="name" name="name" placeholder="Full Name"
                                    required>
                            </div>
                            <div>
                                <input type="text" class="form__input" id="user" name="user"
                                    placeholder="Username" required>
                            </div>
                            <div>
                                <input type="password" class="form__input" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div>
                                <input type="password" class="form__input" id="cpassword" name="cpassword"
                                    placeholder="Conform Password" required>
                            </div>
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </form>
                        <div class="row">
                            <p>Already have an account? <br><a href="/somnathsaree/log_in.php">Log in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>