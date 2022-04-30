<?php

include 'conponments/_dbconnect.php';

$alert = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `username` = '$user'";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    if($numrow == 1)
    {
        while($row = mysqli_fetch_array($result))
        {   
            if ($row['type'] == 0)
            {
                if (password_verify($password, $row['password']))
                {
                    $alert = " ";
                    session_start();
                    $_SESSION['loggedin'] = true; 
                    $_SESSION['username'] = $user;
                    header ("location: customer_user.php"); 
                }
                else
                {
                    $error = "Invalid password. Please check your password.";
                }
            }
            else
            {
                if (password_verify($password, $row['password']))
                {
                    $alert = " ";
                    session_start();
                    $_SESSION['loggedin'] = true; 
                    $_SESSION['username'] = $Username;
                    header ("location: /somnathsaree/index.php"); 
                }
                else
                {
                    $error = "Invalid password. Please check your password.";
                }
            }
        }
    }
    else
    {
        $error = "Invalid username. Please try again.";
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
    <title>Log in</title>
</head>

<body style="background-color: 	#cccccc">

    <!-- Main Content -->
    <div class="container-fluid ">
        <div class="row main-content bg-success text-center">
            <!-- <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <h2><span class="fa fa-android"></span></h2>
                </span>
                <h4 class="company_title">Your Company Logo</h4>
            </div> -->
            <div class="col-md-12 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="mt-3">Log In</h2>
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
                    <div>
                        <form action="/somnathsaree/Log_in.php" method="post">
                            <div>
                                <input type="text" name="username" id="username" class="form__input"
                                    placeholder="Username">
                            </div>
                            <div>
                                <input type="password" name="password" id="password" class="form__input"
                                    placeholder="Password">
                            </div>
                            <div class="row-fluid">
                                <input type="submit" value="Submit" class="btn">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p>Don't have an account? <br><a href="/somnathsaree/sign_up.php">Register Here</a></p>
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