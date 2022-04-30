<?php


session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header('Location: Log_in.php');
  exit;
}

include 'conponments/_dbconnect.php';

$username = $_SESSION['username'];



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/user_customer.css">
    <title>Welcome to Somnath Saree</title>
</head>

<body style="background-color: #e2e7e7;">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-size:30px;">Somnath Saree</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex">
                    <p id="div2-p">
                        <img src="img/user.png" id="img"> <?php echo $username; ?>
                    </p>
                    <a class="btn btn-outline-success" href="log_out.php">Log&nbsp;Out</a>
                </form>
            </div>
        </div>
    </nav>

    <!-- slider -->
    <div class="text-center" style="background-color:#fff; margin: 12px; border-radius: 11px; padding: 10px; ">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/s3.jpeg" class="d-block w-100" alt="..." id="slider-img">
                </div>
                <div class="carousel-item">
                    <img src="img/s2.jpg" class="d-block w-100" alt="..." id="slider-img">
                </div>
                <div class="carousel-item">
                    <img src="img/s4.jpg" class="d-block w-100" alt="..." id="slider-img">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="text-center" style="background-color:#fff; margin: 12px; border-radius: 11px; padding: 20px; ">

        <h2 class="text-center">Account Summary</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Merchant</th>
                    <th scope="col">Total Saree</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT * FROM `customerlist` WHERE `customer_name` = '$username'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $sub_total = 0;

                if($num > 0)
                {

                    while($row = mysqli_fetch_array($result))
                    {
                        $maltipal =($row['total_saree'])*($row['price']);
                        $sub_total += $maltipal;
                        echo '<tr>
                        <td scope="row">'.date("d-m-y", strtotime($row['date'])).'</td>
                        <td>'.$row['customer_merchant_name'].'</td>
                        <td>'.$row['total_saree'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$maltipal.'</td>
                        </tr>';
                    }
                }
                else{
                    echo '<tr>
                            <th scope="row">--</th>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                                <h4 class="text-center mt-4" style="color: red">No data found</h4>
                            </tr>'; 
                }
                ?>
            </tbody>
            <?php
                    echo '<tr class="table-light">
                        <th></th>
                        <th></td>
                        <th></td>
                        <th>Total</th>
                        <th>'.$sub_total.'</th>
                    </tr>';
                ?>
        </table>
    </div>


    <!-- footer -->
    <?php include 'conponments/_footer.php'; ?>
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