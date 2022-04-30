<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header('Location: Log_in.php');
  exit;
}   

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Somnath Saree</title>
</head>

<body>
    <?php include 'conponments/_dbconnect.php'?>
    <div class="container" style="min-height: 573px;">
        <?php
    include 'conponments/_dbconnect.php';

    $m_id = $_GET['m_id'];
    
    $sql = "DELETE FROM `customerlist` WHERE `customer_merchant_id`= $m_id";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo '
                <div class="container text-center">
                <a class="text-center">
                <img src="img/1.png" hight=250px width=250px class="mt-3">
                </a>
                <h4 class="text-success mt-3" ><b>All customer records are removed successfully.</b></h4>
                <a href="/somnathsaree/customerlist.php?m_id='.$m_id.'" class="btn btn-outline-info mt-3" style="width: 6rem;">Ok</a>
                </div>
                ';
    }
    else{
        echo '
            <div class="container text-center">
            <a class="text-center">
            <img src="img/2.png" hight=250px width=250px class="mt-3">
            </a>
            <h4 class="text-danger mt-3" ><b>All customer records are removed unsuccessfully.</b></h4>
            <a href="/somnathsaree/customerlist.php?m_id='.$m_id.'" class="btn btn-outline-danger mt-3" style="width: 8rem;">Try again</a>
            </div>
            ';
    }
?>
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